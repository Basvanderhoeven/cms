@extends('layouts.sources')
<div class="login_background"></div>
<div class="container">    
        <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <?php if(isset($data)){
                var_dump($data);
            } ?>
            <div class="loginbox_container shadow">
                {!! Form::open(array('action' => 'LoginController@doLogin')) !!}
                <h1>Beheer login</h1>
                <p style='color:red;'>
                    {!! $errors->first('gebruikersnaam') !!}
                    <br>
                    {!! $errors->first('wachtwoord') !!}
                    <br>
                    {!! $errors->first('captcha') !!}
                </p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    {!! Form::text('gebruikersnaam', Input::old('gebruikersnaam'), array( 'class' => 'form-control', 'placeholder' => 'Gebruikersnaam')) !!}
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    {!! Form::password('wachtwoord', array('class' => 'form-control', 'placeholder' => 'Wachtwoord')) !!}
                </div>
                    {!! app('captcha')->display(); !!}
                <div class="form-submit">
                    {!! Form::submit('Submit!', array('class' => 'btn btn-default')) !!}
                </div>
                    {!! Form::close() !!}
                    
                
              </div>
         </div> 

    </div>
