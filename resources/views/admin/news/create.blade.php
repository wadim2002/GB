@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Добавить новость</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
</div>
<div>
    <form method="post" action="{{route('news.store')}}">
        @csrf
        <div class="form-group">
            <label for="category_ids">Категория</label>
            <select class="form-control" name="category_ids[]" id="category_ids" multiple>
            <option value="0">--Выбрать--</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{$category->title}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control" class="@error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">Значение поля не может быть менее 5-ти символов</div>
                @enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control" class="@error('author') is-invalid @enderror" value="{{ old('author') }}">
                @error('author')
                    <div class="alert alert-danger">Значение поля не может быть менее 5-ти символов</div>
                @enderror

        </div>
        
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
            <option value="0">--Выбрать--</option>
            @foreach($statuses as $status)
                <option>{{$status}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="sours">Источник информации</label>
            <input type="sours" id="sours" name="sours" class="form-control" class="@error('sours') is-invalid @enderror" value="{{ old('sours') }}">
                @error('sours')
                    <div class="alert alert-danger">Значение поля не может быть пустым</div>
                @enderror
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control" class="@error('description') is-invalid @enderror"></textarea>
                @error('description')
                    <div class="alert alert-danger">Значение поля не может быть пустым</div>
                @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection