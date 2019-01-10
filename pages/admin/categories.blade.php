@extends('admin.main')

  @section('title')
    Добавление категории
  @endsection
    
    @section('content')


@if(!empty($title))
<h3>{{$mes}}</h3>
@endif
<form action='' method='post' enctype='multipart/form-data' style="width:70%;margin:15%">
		<p><label>Наименование категории: </label> <input type='text' name='title' id='add'></p>
		
		<p><input type='submit' class='btn waves-effect waves-light'  value='Добавить'></p>

 </form>

    @endsection
