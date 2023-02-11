@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap alifn-items-center pb-2 mb-3 border-bottom">    
<h1 class="h2">Перечень пользователей</h1>
</div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Имя пользователя</th>
              <th scope="col">Email</th>
              <th scope="col">Роль</th>
              <th scope="col">Редактировать</th>
            </tr>
          </thead>
          <tbody>
        <?php foreach($users as $user):?>
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>@if ($user->is_admin == '0') Пользователь @else Администратор @endif</td>
              <td>@if ($user->is_admin == '0') <a href="{{route('user.changeRoleInAdmin', ['id' => $user->id])}}">Сделать админом</a> @endif</td>
            </tr>
        <?php endforeach ?>
          </tbody>
        </table>
      </div>
@endsection