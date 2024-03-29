@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Ввод данных пользователя</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
</div>
<div>
    <form method="post" action="{{ route('lk')}}">
        @csrf
        <div class="form-group">
            <label for="title">Имя пользователя</label>
            <input type="text" id="user-name" name="user-name" class="form-control" required>{{ old('user-name')}}</input>
        </div>
        <div class="form-group">
            <label for="title">Пароль</label>
            <textarea id="password" name="password" class="form-control" required></textarea>
        </div>
        <br>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection