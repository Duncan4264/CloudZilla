<?php
?>
@extends('layouts.cloudmaster')
@section('title', 'Time Clock')

@section('content')


<h3>Time Card Page.</h3>


<form action = "doclockin" method="POST">
<input type="hidden" name = "_token" value = "<?php echo csrf_token()?>" />
<input type = "submit"  formaction="doclockin" value = "Clock In" /><form action = "doclockout" method="POST">
<input type="hidden" name = "_token" value = "<?php echo csrf_token()?>" /><button type="submit" formaction="doclockout">Clock Out</button>
@if($errors->count() != 0)
<h1>List of Errors</h1>
@foreach($errors->all() as $message)
	{{ $message }} <br/>
@endforeach
@endif	
</form>
</form>





@endsection
