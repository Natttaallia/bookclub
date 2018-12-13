
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
	<link rel='stylesheet' type='text/css' href='/pages/style.css'>
</head>
<body>
<nav>	
	<a href='..\register' class='subbtn'>Зарегистрироваться</a>
	<a href='..\login' class='subbtn'>Войти</a>
</nav>
<div class='container'>

{{-- @isset($data){{ var_dump($data) }}
@endisset --}}
@foreach ($data as $value) 

<div class='z-depth-3 book'>
	<div class='picture'>	
<img src='{{ $value["url"] }}'>
	</div>
<h5>Автор</h5>
<p>{{ $value["author_name"] }}</p>	
<h5>Название</h5>	
<p>{{ $value["title"] }}</p>	
<h5>Категория</h5>
<p>{{ $value["category_name"] }}</p>	
</div>
 
@endforeach
 

</div>

@include('pagination');



<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
</body>
</html>