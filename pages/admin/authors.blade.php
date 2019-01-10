@extends('admin.main')

  @section('title')
    Добавление автора
  @endsection
    
    @section('content')



<h3>{{$mes}}</h3>
<form action='' method='post' enctype='multipart/form-data' style="width:70%;margin:15%">
		<p><label>Автор: </label> <input type='text' name='title' id='add'></p>
		
		<p><input type='submit' class='btn waves-effect waves-light'  value='Добавить'></p>

 </form>

    @endsection
