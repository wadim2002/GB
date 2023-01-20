@extends('layouts.app')
@section('news')
<?php list($day, $month, $year) = explode("-", $news['create_at']);?>
        <div class="content-box-post">
		        <div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">{{$day}}</div>
						<div class="content-box-post-datablock-mount">{{$month}}</div>
					</div>
					<div class="content-box-post-titul-text">{{$news['title']}}</div>
					<div class="content-box-post-titul-meta"><u>Опубликовано</u>  {{$news['create_at']}} <u>Категории:</u> {{implode(',' , $news['category'])}}</div>
				</div>
				<div class="content-box-post-text">
                    {{$news['description']}}
					<hr>
                    <a href="<?=route('news.Show', ['id' => $news['id']])?>" class="content-box-post-link">Читать далее ...</a>
                </div>
        </div>
@endsection