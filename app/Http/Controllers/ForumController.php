<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Model\Forum\Sections;
use App\Model\Forum\Topics;
use App\Model\Forum\Replies;
use App\Model\Forum\Views;
use App\Model\Forum\UserRead;
use Auth;
use URL;
use Validator;

class ForumController extends Controller
{
	/**
	* Page d'index du forum
	*/
	function index(){
		$sections = Sections::whereNull('sections_id')->get();
		return view('forum.index')
			->with('forums', $sections);
	}    

	/**
	* Affiche le contenu d'une section
	*/
	function showSection($section){
		$this->section = Sections::where('slug', $section)->first();

		//Crée le breadcrumb
		$copy = $this->section;
		$breadcrumbs = array();
		while(!is_null($copy->up)){
			$copy = $copy->up;
			array_unshift($breadcrumbs, $copy);
		} 

		return view('forum.section.show')
			->with('breadcrumbs', $breadcrumbs)
			->with('forum', $this->section);
	}

	/**
	* Crée un nouveau topic(get)
	*/
	function createTopicGet($section){
		return view('forum.topics.create')
			->with('section', $section);
	}

	/**
	* Crée un nouveau topic(post)
	*/
	function createTopicPost($section, Request $request){
		//Vérification de la form
		$validator = Validator::make($request->all(),[
			'subject'	=>	'required',
			'content'	=>	'required'
		]);

		//Retour en cas d'erreur
		if($validator->fails()){
			return back()
				->withErrors($validator)
				->withInput();
		}

		//Ajoute le topic et le post à la base de données 
		$lastId = Topics::all()->count() + 1;
		$topic = Topics::create([
			'subject'			=>	$request->subject,
			'slug'				=>	str_slug($lastId.' '.$request->subject),
			'users_id'			=>	Auth::user()->id,
			'sections_id'		=>	Sections::where('slug', $section)->first()->id,
			'last_user'			=>	Auth::user()->name
		]);

		$reply = Replies::create([
			'content'			=>	$request->content,
			'topics_id'			=>	$topic->id,
			'users_id'			=>	Auth::user()->id
		]);

		//Affiche le nombre de vue
		Views::create([
			'topics_id'	=>	$topic->id,
			'views'		=>	1
		]);

		//Mets à jour UserRead
		UserRead::create([
			'users_id'	=>	Auth::user()->id,
			'topics_id'	=>	$topic->id
		]);

		//Mets à jour la table topic (dernier message envoyé)
		$change = Topics::find($topic->id);
		$change->last_reply_id = $reply->id;
		$change->save();
		return redirect()->route('forum.section.show', $section);
	}

	/**
	* Affiche le topic
	*/
	function showTopic($topic){
		//Récupère le topic
		$this->topic = Topics::where('slug', $topic)->first();

		//Mets à jour le nombre de vues
		$view = Views::where('topics_id', $this->topic->id)->first();
		$view->views++;
		$view->save();

		if(Auth::check()){
			//Mets à jour UserRead
			$read = UserRead::firstOrCreate([
				'users_id'	=>	Auth::user()->id,
				'topics_id'	=>	$this->topic->id]);
			$read->updated_at = Carbon::now();
			$read->save();
		}
		
		//Crée le breadcrumb
		$copy = $this->topic->section;
		$breadcrumbs = array();
		array_unshift($breadcrumbs, $copy);
		while(!is_null($copy->up)){
			$copy = $copy->up;
			array_unshift($breadcrumbs, $copy);
		} 
		
		return view('forum.topics.show')
			->with('topic', $this->topic)
			->with('breadcrumbs', $breadcrumbs);
	}

	/**
	* Répond à un topic
	*/
	function reply($topic, Request $request){
		$idTopic = Topics::where('slug', $topic)->first();
		$reply = Replies::create([
			'content'	=>	$request->content,
			'topics_id'	=>	$idTopic->id,
			'users_id'	=>	Auth::user()->id
		]);

		//Mets à jour le dernier message envoyé
		$idTopic->last_reply_id = $reply->id;
		$idTopic->last_user = Auth::user()->name;
		$idTopic->save();
		return back();
	}

	/**
	* Permet d'éditer un message (get)
	*/
	function getEdit($topic, $reply){
		$reply = Replies::find($reply);
		return view('forum.topics.edit')
			->with('topic', $topic)
			->with('reply', $reply);
	}

	function postEdit($topic, $reply, Request $request){
		$reply = Replies::find($reply);
		$reply->content = $request->content;
		$reply->save();
		return redirect()->route('forum.topic.show', $topic);
	}

	/**
	* Efface un message
	*/
	function destroy($reply){
		$reply = Replies::find($reply)->delete();
		return back();
	}

	/**
	* Crée une nouvelle section
	*/
	function createSectionGet(){
		return Sections::with('subForums')->whereNull('sections_id')->get();
		return view('forum.section.create');
	}

	function createSectionPost(){
		return "Crée";
	}
}