<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Forum\Sections;
use App\Model\Forum\Categories;

class ForumController extends Controller
{
	function index(){
		$sections = Sections::all();
		return view('forum.index')
			->with('sections', $sections);
	}    

	function showSection($section){
		$this->section = Sections::where('slug', $section)->first();
		return view('forum.section')
			->with('section', $this->section);
	}

	function showCategory($section, $category){
		$this->category = Categories::where('slug', $category)->first();
		return view('forum.category')
			->with('category', $this->category);
	}
}
