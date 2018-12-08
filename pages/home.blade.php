
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

<div style='display:flex;justify-content: center;' >	
 <ul class='pagination'>
    

    @if($page==0) <li class='disabled'>
    @else <li class='waves-effect'>
    @endif

    <a 
    @if($page!=0) href='/$page'
    @endif 
    ><i class='material-icons'>chevron_left</i></a></li>
 	


 	 @for ($i=1; $i <= $page_count; $i++)


 	 @if ($i==1 || $i==$page_count || (($i<=$page+1) && ($i>=$page-5)) || (($i>=$page+1) && ($i<=$page+6)))	
   <li 
      @if ($page+1==$i) class='active'
      @else class='waves-effect'
      @endif
   ><a href='/{{ $i }}'>{{ $i }}</a></li>
 
		
		@elseif($i<$page && $flag_left)
		
			<li class='waves-effect'><a>...</a></li>
		{{ $flag_left=!$flag_left }}
		@elseif($i>$page && $flag_right)
		
			<li class='waves-effect'><a>...</a></li>
    {{ $flag_right=!$flag_right }}
		
    @endif


	 @endfor
    
    <li 
    @if($page+1==$page_count) class='disabled'
    @else class='waves-effect'
    @endif
    ><a 
    @if($page+1!=$page_count) 
     href='/{{ $page+2}}'
     @endif
     ><i class='material-icons'>chevron_right</i></a></li>
  </ul>
</div>



<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
</body>
</html>