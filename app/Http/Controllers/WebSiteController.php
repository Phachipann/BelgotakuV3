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
    	return view('index');
    }

    /**
    * Page d'inscription
    */
    function register(){
    	return view('register');
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
            return redirect('register')
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
    	return view('login');
    }

    /**
    * Connexion de l'utilisateur
    */
    function postLogin(Request $request){
    	if(Auth::attempt(['name' => $request['name'], 'password' => $request['password']], $request['remember'])){
    		return redirect('/')
                ->with('name', $request['name']);
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
        return back();
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

    /**
    * Page de profil de l'utilisateur connectés
    */
    function profil(){
        return User::find(Auth::user()->id);
    }
}
