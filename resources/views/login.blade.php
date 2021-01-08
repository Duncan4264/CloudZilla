@extends('layouts.cloudmaster')
@section('title', 'Login Page')

@section('content')
<form action = "dologin" method="POST">
<input type="hidden" name = "_token" value = "<?php echo csrf_token()?>" />
<h2>Please Login</h2>
<table>
<tr>
<td>User Name: </td>
<td><input type = "text" name = "username" />{{$errors->first('username')}}</td>
</tr>
<tr>
<td>Password: </td>
<td><input type = "password" name = "password" />{{$errors->first('password')}}</td>
</tr>
<tr>
<td colspan = "2" align = "center">
<input type = "submit" value = "Login" />
@if($errors->count() != 0)
<h1>List of Errors</h1>
@foreach($errors->all() as $message)
	{{ $message }} <br/>
@endforeach
@endif	
</td>
</tr>
</table>
</form>
@endsection
