@extends('admin.main')

  @section('title')
    Личный кабинет
  @endsection
    
    @section('content')
        


@if(count($data)>0)
                <h3 class="center-align">Перечень книг</h3>
                <div class="custom-responsive">
                  
                  <table class="striped hover centered">

                    <thead><tr>
                      <th>Название</th>
                      <th>Автор</th>
                      <th>Категория</th>
                      <th>Обложка</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $value)
                    <tr>
                      <td>{{$value["title"]}}</td>
                      <td>{{ $value["author_name"] }}</td>
                      <td>{{ $value["category_name"] }}</td>
                      <td><img src='{{ $value["url"] }}' style="width:100px"></td>
                      <td>
                  <div class="btn-toolbar">
                    <a href="#">
                      <button class="btn green" type="submit" value="Accept">
                      <i class="material-icons">done</i>
                      </button>
                    </a>
                    <a href="#">
                      <button class="btn red" type="submit" value="Reject">
                      <i class="material-icons">remove</i>
                      </button>
                    </a>
                  </div>
                </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>

            @include('pagination');
@else
<h3 class="center-align">Нет книг</h3>
@endif
           @endsection
        

       