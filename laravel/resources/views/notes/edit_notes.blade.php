@extends('main')


@section('header')
	@parent
@endsection


@section('navbar')
	@parent
@endsection
@section('content')
	@parent
    <!-- Редактирование записи -->
	<!-- (isset($_SESSION['login']) && isset($_SESSION['password']))  
		if (isset($_GET['red_id'])): 
	-->
	<?php 
		echo "Редактирование записи №" . $update_note; 
	?>
	<?php foreach ($notes as $row): ?>
		<form method="POST" action="{{ route('post_update_note', ['update_note' => $update_note]) }}">		{{ csrf_field() }} 
			<p><h2><?php echo $row->id; ?></h2></p>
			<p><h2><?php echo $row->note_date; ?></h2></p>
			Введите название заметки: 
			<input type="text" name="note_title" size="50" maxlength="52" value="<?php echo $row->note_title; ?>"><br>
			Введите текст: <br>
			<textarea name="note_text" rows="10" cols="60" maxlength="5000"><?php echo $row->note_text; ?></textarea><br>
			<input type="submit" name="go_edit" value="Отправить"><br>
		</form>
	<?php endforeach; ?>

	<a href="<?php echo route('show_notes'); ?>">Перейти на главную страницу</a>;
@endsection


@section('footer')
	@parent
@endsection
