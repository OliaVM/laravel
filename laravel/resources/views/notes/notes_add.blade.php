@extends('main')


@section('header')
	@parent
@endsection


@section('navbar')
	@parent
@endsection
@section('content')
	<!-- Show errors -->
	@if (count($errors) > 0)
	  <div class="alert alert-danger">
	    <ul>
	      @foreach ($errors->all() as $error)
	        <li>{{ $error }}</li>
	      @endforeach
	    </ul>
	  </div>
	@endif	

	<!-- note add FORM-->
    <form method="POST" accept-charset="UTF-8" action="<?php echo route('add_note'); ?>"> 
    	  {{ csrf_field() }} 
		  Введите тему сообщения:
		  <input type="text" name="note_title" size="100" maxlength="102" value=""> 
		  <br>
		  Введите полный текст сообщения (объемом до 5000 знаков):  <br>
		  <textarea name="note_text" rows="10" cols="60" maxlength="5000" value=""></textarea><br>
		  <input type="submit" name="go" value="Отправить"> <br>
	</form>
@endsection


@section('footer')
	@parent
@endsection
