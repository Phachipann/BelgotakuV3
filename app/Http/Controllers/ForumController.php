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
		return view('forum.section')
			->with('breadcrumbs', $breadcrumbs)
			->with('forum', $this->section)
			->with('topics', $this->section->topics);
	}

	/**
	* Affiche la liste de topic dans une catégorie
	*/
	/*
	function showCategory($category){
		$this->category = Categories::where('slug', $category)->first();
		return view('forum.category')
			->with('forum', $this->category)
			->with('topics', $this->category->topics);
	}*/

	/**
	* Crée un nouveau topic(get)
	*/
	function newTopicGet(){
		return view('forum.create');
	}

	/**
	* Crée un nouveau topic(post)
	*/
	/*
	function newTopicPost($section, $category, Request $request){
		$user = Auth::user();
		$lastId = Topics::all()->last()->id + 1;
		$this->category = Categories::where('slug', $category)->first();
		$id = Topics::create([
			'subject'			=>	$request->subject,
			'slug'				=>	str_slug($lastId.' '.$request->subject, "-"),
			'users_id'			=>	$user->id,
			'categories_id'		=>	$this->category->id
		]);
		Replies::create([
			'content'			=>	$request->content,
			'topics_id'			=>	$id->id,
			'users_id'			=>	$user->id
		]);
		return redirect(URL::previous());
	}*/

	function showId(){
		return Topics::all()->last();
	}
}
