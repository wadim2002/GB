@extends('layouts.app')
@section('news')
<?php foreach($news as $m): $dataArray = date_parse($m->created_at) ?>

        <div class="content-box-post">
		        <div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">{{$dataArray['day']}}</div>
						<div class="content-box-post-datablock-mount">{{$dataArray['month']}}</div>
					</div>
					<div class="content-box-post-titul-text">{{$m->title}}</div>
					<div class="content-box-post-titul-meta"><u>Опубликовано</u> {{$dataArray['year']}}-{{$dataArray['month']}}-{{$dataArray['day']}} <u>Категории:</u> category</div>
				</div>
				<div class="content-box-post-text">
                    {{$m->description}}
					<hr>
					<a href="<?=route('news.Show', ['id' => $m->id])?>" class="content-box-post-link">Читать далее ...</a>
                </div>
        </div>
<?php endforeach ?>
@endsection