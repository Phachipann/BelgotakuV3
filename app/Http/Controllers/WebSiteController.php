<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Model\User;
use Auth;

class WebSiteController extends Controller
{
    /**
    * Page index
    */
    function index(){
    	return view('website.index');
    }

    /**
    * Page d'inscription
    */
    function register(){
    	return view('website.register');
    }

    /**
    * Inscription à un nouvel utilisateur
    */
    function create(Request $request){
    	$validator = Validator::make($request->all(), [
    		'name'		=>	'required|max:255|unique:users',
    		'email'		=>	'required|max:255|unique:users|email',
    		'password'	=>	'required|max:60|confirmed']);

    	if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
        	'name'		=>	$request['name'],
        	'email'		=>	$request['email'],
        	'password'	=>	bcrypt($request['password'])
        ]);
        return redirect('/');
    }

    /**
    * Page de connexion
    */
    function getLogin(){
    	return view('website.login');
    }

    /**
    * Connexion de l'utilisateur
    */
    function postLogin(Request $request){
    	if(Auth::attempt(['name' => $request['name'], 'password' => $request['password']], $request['remember'])){
    		return redirect('/');
    	}
        return back()
            ->withInput()
            ->withErrors("Nom d'utilisateur ou mot de passe incorrect");
    }

    /**
    * Déconnexion de l'utilisateur
    */
    function logout(){
        Auth::logout();
        return redirect('/');
    }

    /**
    * About page
    */
    function about(){
        return "About page";
    }

    /**
    * Contact page
    */
    function contact(){
        return "Contact page";
    }
}
