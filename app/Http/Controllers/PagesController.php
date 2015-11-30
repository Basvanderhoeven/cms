<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use App\User;

class PagesController extends Controller
{
    
    //
    public function index(){
        return  view('index');
    }
    public function test(){
        $users = User::all();
        return view('test')->with('users', $users);
    }
    public function dashboard(){
        if(session('login')){
        return view('dashboard');    
        } else{
        return view('index');
        }
    }
}
