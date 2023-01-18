@extends('layouts.app')
@section('news')
<?php foreach($news as $n): list($day, $month, $year) = explode("-", $n['create_at']);?>
        <div class="content-box-post">
		        <div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">{{$day}}</div>
						<div class="content-box-post-datablock-mount">{{$month}}</div>
					</div>
					<div class="content-box-post-titul-text">{{$n['title']}}</div>
					<div class="content-box-post-titul-meta"><u>Опубликовано</u>  {{$n['create_at']}} <u>Категории:</u> {{implode(',' , $n['category'])}}</div>
				</div>
				<div class="content-box-post-text">
                    {{$n['description']}}
					<hr>
                    <a href="<?=route('news.Show', ['id' => $n['id']])?>" class="content-box-post-link">Читать далее ...</a>
                </div>
        </div>
<?php endforeach ?>
@endsection