<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use Validator;
use DB;

use App\Model\pm\PrivateMessage;
use App\Model\pm\PMReplies;
use Auth;

class PMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('messages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('messages.create');
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
            'name'      =>  'required',
            'subject'   =>  'required',
            'content'   =>  'required'
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $user = User::where('name', $request->name)->get();
        $id = PrivateMessage::all()->count() + 1;
        $pm = PrivateMessage::create([
            'subject'   =>  $request->subject,
            'slug'      =>  str_slug($id . ' ' . $request->subject),
            'users_id'  =>  Auth::user()->id
        ]);

        PMReplies::create([
            'content'   =>  $request->content,
            'pm_id'     =>  $pm->id,
            'users_id'  =>  Auth::user()->id
        ]);

        DB::table('pm_destination')->insert([
            'pm_id'     =>  $pm->id,
            'users_id'  =>  Auth::user()->id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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

    public function getUsers(){
        return User::all();
    }
}
