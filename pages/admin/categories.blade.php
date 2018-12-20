@extends('admin.main')

  @section('title')
    Добавление категории
  @endsection
    
    @section('content')


@if($error)
<h3>{{$error}}Не добавлено. Категория уже существует</h3>
@endif
@if($success)
<h3>Добавлено</h3>
@endif
<form action='' method='post' enctype='multipart/form-data' style="width:70%;margin:15%">
		<p><label>Наименование категории: </label> <input type='text' name='title' id='add'></p>
		
		<p><input type='submit' class='btn waves-effect waves-light'  value='Добавить'></p>

 </form>

    @endsection
