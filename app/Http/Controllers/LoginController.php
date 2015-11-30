<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\Http\Requests;
use App\User;
use DB;
use PDO;
use View;
use Input;
use Auth;
use Redirect;
use Session;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits;
use App\Traits\CaptchaTrait;
 
class LoginController extends Controller
{
    public function logout(){
        Session::put('login', false);
        Auth::logout(); // log the user out of our application
        return Redirect::to('login');
    }
   public function showLogin()
        {
            // show the form
            if(session('login')){
                return Redirect::to('dashboard');
            }
            return View::make('index');
        }
        public function doLogin()
        {
            $rules = array(
                'gebruikersnaam' => 'required',
                'wachtwoord' => 'required',
                'g-recaptcha-response' => 'required|captcha'
            );
            $msg = array(
                'required' => 'Vul uw :attribute in.',
                'captcha' => 'Captcha mislukt, probeer opnieuw'
            );
            
            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules, $msg); 

            // if the validator fails, redirect back to the form
            if ($validator->fails()) { 
                return Redirect::to('login')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {
                // create our user data for the authentication
                $userdata = array(
                    'username'  => Input::get('gebruikersnaam'),
                    'password'  => Input::get('wachtwoord')
                );
                // attempt to do the login
                if (Auth::attempt($userdata)) {

                    // validation successful!
                    // redirect them to the secure section or whatever
                    // return Redirect::to('secure');
                    // for now we'll just echo success (even though echoing in a controller is bad)
                    Session::put('login', true);
                    Session::put('logged_user', Input::get('gebruikersnaam'));
                    return Redirect::to('dashboard');
                    
                } else {        

                    // validation not successful, send back to form 
                    return Redirect::to('login')
                            ->with('data', array(['error' => 'De ingevulde gegevens zijn onjuist']))
                            ->withInput(Input::except('password'));

                }
     
            }
            
            } 
            
        }
