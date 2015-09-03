<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Model\Articles;
use Validator;
use App\Model\ArticlesComments;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Articles::orderBy('created_at', 'desc')->get();
        return view('articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     =>  'required',
            'content'   =>  'required'
        ]);
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $lastId = Articles::all()->count() + 1;
        Articles::create([
            'title' =>  $request->title,
            'slug'  =>  str_slug($lastId.' '.$request->title),
            'content'   =>  $request->content,
            'users_id'  =>  Auth::user()->id
        ]);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Articles::where('slug', $id)->first();        
        return view('articles.show')
            ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function postComment(Request $request, $id){
        $article = Articles::where('slug', $id)->first();
        ArticlesComments::create([
            'comment'   =>  $request->comment,
            'users_id'  =>  Auth::user()->id,
            'articles_id'   =>  $article->id
        ]);
        return back();
    }
}
