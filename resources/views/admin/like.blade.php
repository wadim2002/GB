@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Оставте отзыв о проекте</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
</div>
<div>
    <form method="post" action="{{ route('history')}}">
        @csrf
        <div class="form-group">
            <label for="title">Отзыв о проекте</label>
            <textarea id="like" name="like" class="form-control" required></textarea>
        </div>
        <br>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection