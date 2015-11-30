@extends('layouts.sources')
{{ Form::open(array('url' => 'login')) }}
<h1>Login</h1>
<p>
    {{ $errors->first('username') }}
    {{ $errors->first('password') }}
</p>
<!-- if there are login errors, show them here -->
<p>
    {{ $errors->first('username') }}
    {{ $errors->first('password') }}
</p>

<div class="form-group">
    {{ Form::label('username', 'Gebruikersnaam') }}
    {{ Form::text('username', Input::old('username'), array( 'class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
<div>

<div class="form-submit">
    {{ Form::submit('Submit!', array('class' => 'btn btn-default')) }}
</div>
    {{ Form::close() }}