@extends('layouts.app')
@section('content')
<div class=" col-8 offset-2">    
    <h2> Привет {{ Auth::user()->name }} </h2>
    @if(Auth::user()->is_admin === true)
        <a href={{ route('admin.index') }}>В админку</a>
    @endif
</div>
@endsection