<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Forum\Sections;
use App\Model\Forum\Topics;
use App\Model\Forum\Replies;
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
	function createTopicGet(){
		return view('forum.section.create');
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

		$lastId = Topics::all()->count() + 1;
		$topic = Topics::create([
			'subject'			=>	$request->subject,
			'slug'				=>	str_slug($lastId.' '.$request->subject),
			'users_id'			=>	Auth::user()->id,
			'sections_id'		=>	Sections::where('slug', $section)->first()->id,
			'last_users_id'		=>	Auth::user()->id
		]);

		$reply = Replies::create([
			'content'			=>	$request->content,
			'topics_id'			=>	$topic->id,
			'users_id'			=>	Auth::user()->id
		]);
		//Mets à jour la table topic (dernier message envoyé)
		$change = Topics::find($topic->id);
		$change->last_replies_id = $reply->id;
		$change->save();
		return redirect(URL::route('forum.section.show', $section));
	}

	/**
	* Affiche le topic
	*/
	function showTopic($topic){
		$this->topic = Topics::where('slug', $topic)->first();
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
		//$idTopic->last_replies_id = $reply->id;
		//$idTopic->last_users_id = Auth::user()->id
		//$idTopic->save();
		return back();
	}
}