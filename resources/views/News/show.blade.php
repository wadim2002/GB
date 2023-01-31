@extends('layouts.app')
@section('news')
<?php $dataArray = date_parse($news->created_at);?>
        <div class="content-box-post">
		        <div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">{{$dataArray['day']}}</div>
						<div class="content-box-post-datablock-mount">{{$dataArray['month']}}</div>
					</div>
					<div class="content-box-post-titul-text">{{$news->title}}</div>
					<div class="content-box-post-titul-meta"><u>Опубликовано</u>  {{$dataArray['year']}}-{{$dataArray['month']}}-{{$dataArray['day']}} <u>Категории:</u> category</div>
				</div>
				<div class="content-box-post-text">
					{{$news->description}}
					<hr>
                </div>
        </div>
@endsection