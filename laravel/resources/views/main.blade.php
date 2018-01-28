<!DOCTYPE html>
<html lang="ru">
	<head>
	  <meta charset="UTF-8">
		<!-- CSS Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!-- theme Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- js Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
		<!-- CSS -->
		<link href="/style/messenger_style.css" rel="stylesheet" type="text/css"/>
    	<meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
<body>
	@section('header')
	<div class="container" >	
		<div class="row">
			<img src="{{asset('/images/main.jpg')}}" class="img-responsive"> <!-- url/.../ -->
		</div>
		<div class="row text-center" id="header" style="background-color: #abcdef" >
			<h1>Messenger</h1>
		</div>
	@show 

		@section('navbar')
		<div class="row bg-info">
			<div class="col-xs-6 col-sm-4" id="menu">
				<ul>
					<li><a href="{{ url('/home') }}">Главная</a></li>
                    <li><a href="{{ url('/login') }}">Авторизоваться</a></li>
                    <li><a href="{{ url('/register') }}">Зарегистрироваться</a></li>
					<li><a href="{{ route('logout') }}">Выход</a></li>
					<li><a href="<?php echo route('show_notes'); ?>">Посмотреть все записи</a></li>
                    <li><a href="<?php echo route('add_note'); ?>">Добавить запись</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-8" id="page">
		@show

			@section('content')
			
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit. Nam enim, laboriosam vero fugit, soluta provident aperiam amet labore saepe magnam reprehenderit voluptate praesentium consequuntur laborum sunt quidem repellendus consequatur quod numquam quos animi omnis sit. Tempora delectus sunt reiciendis, culpa nisi odio consectetur alias amet, asperiores labore error non fugit iusto architecto, unde voluptatem, distinctio totam adipisci. Optio fuga reprehenderit, ipsum iste corrupti in aliquam provident quasi dolore voluptates magnam, amet! Sed possimus omnis, aliquid vero debitis commodi neque numquam! Libero praesentium molestiae quis, amet animi nesciunt quaerat, fugiat sapiente inventore rerum, debitis doloremque natus qui aliquid sint reiciendis, cumque culpa cupiditate neque minus iste! Velit alias, atque accusamus commodi debitis pariatur ea eos cupiditate magnam, consequuntur nobis excepturi incidunt nam adipisci perspiciatis voluptatum vitae, eius nihil obcaecati! Modi laboriosam unde debitis voluptas, natus veritatis! Accusamus<br><br> 
		@show

		@section('footer')
			</div>
		</div>
		<div class="row text-center" id="footer" style="background-color: #a6caf0">
			<h1>2017</h1>
			<img src="{{asset('/images/footer.jpg')}}" class="img-responsive">
		</div>
		@show
	</div>
</body>
</html>