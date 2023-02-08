@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap alifn-items-center pb-2 mb-3 border-bottom">    
<h1 class="h2">Реестр новостей</h1>
    <div class="btn-toolbar md-2 mb-md-0">
        <a href="{{route('news.create')}}">Добавить новость</a>
    </div>
</div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Название</th>
              <th scope="col">Категории</th>
              <th scope="col">Автор</th>
              <th scope="col">Статус</th>
              <th scope="col">Описание</th>
              <th scope="col">Редактировать</th>
            </tr>
          </thead>
          <tbody>
        <?php foreach($news as $m):?>
            <tr>
              <td>{{$m->id}}</td>
              <td>{{$m->title}}</td>
              <td>{{$m->categories->map(fn($item) => $item->title)->implode(', ')}}</td>
              <td>{{$m->author}}</td>
              <td>{{$m->status}}</td>
              <td>{{$m->description}}</td>
              <td><a href="{{route('news.edit', ['news' => $m])}}">Изменить</a></td>
            </tr>
        <?php endforeach ?>
          </tbody>
        </table>
        {{$news->links()}}
      </div>
@endsection