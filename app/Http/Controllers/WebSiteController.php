<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\User;
use Auth;

class WebSiteController extends Controller
{
    function index(){
    	return view('index');
    }

    function register(){
    	return view('register');
    }

    function create(Request $request){
    	$validator = Validator::make($request->all(), [
    		'name'		=>	'required|max:255|unique:users',
    		'email'		=>	'required|max:255|unique:users|email',
    		'password'	=>	'required|max:60|confirmed']);

    	if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        User::create([
        	'name'		=>	$request['name'],
        	'email'		=>	$request['email'],
        	'password'	=>	bcrypt($request['password'])
        ]);
        return 'Bravo, vous êtes inscrit à Belgotaku';
    }

    function getLogin(){
    	return view('login');
    }

    function postLogin(Request $request){
    	if(Auth::attempt(['name' => $request['name'], 'password' => $request['password']], $request['remember'])){
    		return redirect('/')
                ->with('name', $request['name']);
    	}
        return back()
            ->withInput()
            ->withErrors("Nom d'utilisateur ou mot de passe incorrect");
    }

    function logout(){
        Auth::logout();
        return back();
    }

    function about(){
        return "About page";
    }

    function contact(){
        return "Contact page";
    }

    function profil(){
        return User::find(Auth::user()->id);
    }
}
