@extends('main')


@section('header')
	@parent
@endsection


@section('navbar')
	@parent
@endsection
@section('content')
	@parent

	<!-- Вывод записей на экран -->
	<?php foreach ($notes as $row): ?>
		<strong>Автор:</strong>
		<?php //if (isset($row['name'])): ?>
			<?php echo $row->name; ?>
		<?php //endif; ?>
		<p><h2><?php echo "Запись №" . $row->id; ?></h2></p
		<p><h2><?php echo $row->note_date; ?></h2></p>
		<p><h2><?php echo $row->note_title; ?></h2></p>
		<p><?php echo $row->note_text; ?></p>

		<?php //if (isset($_SESSION['login']) && isset($_SESSION['password'])): ?>
		<!-- Deleting note VIEW POST--> 
		<form method="post" action="<?php echo route('delete_note_with_post'); ?>">
			{{ csrf_field() }} 
			<input type='hidden' name="note_del_id" value="<?php echo $row->id; ?>">
			<input type='hidden' name="author_id" value="<?php echo $row->user_id; ?>">
			<input name="button_del" value="Удалить сообщение методом post" type="submit">
		</form>

			<!-- Deleting note VIEW GET-->
		<form method="post">
			{{ csrf_field() }} 
			<a href="<?php echo route('delete_note', ['delete_note' => $row->id, 'author_id' => $row->user_id]); ?>">Удалить сообщение методом get</a><br>

			<!-- Editor VIEW -->
			<a href="<?php echo route('get_update_note', ['update_note' => $row->id]); ?>">Отредактировать сообщение</a> 
		</form>
		<br>
	<?php endforeach; ?>

    <form method="POST" accept-charset="UTF-8">
    	  {{ csrf_field() }} 
    	  <a href="<?php  echo route('add_note'); ?>">Добавить сообщение</a>
    </form>
@endsection


@section('footer')
	@parent
@endsection
