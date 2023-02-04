@extends('layouts.app')
@section('news')
<?php foreach($news as $m): $dataArray = date_parse($m->created_at); 

$_monthsList = array("1" => "янв", "2" => "февр", 
"3" => "март", "4" => "апр", "5" => "май", "6" => "июн", 
"7" => "июл", "8" => "авг", "9" => "снт",
"10" => "окт", "11" => "ноя", "12" => "дек");

?>

        <div class="content-box-post">
		        <div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">{{$dataArray['day']}}</div>
						<div class="content-box-post-datablock-mount">{{$_monthsList[$dataArray['month']]}}</div>
					</div>
					<div class="content-box-post-titul-text">{{$m->title}}</div>
					<div class="content-box-post-titul-meta"><u>Опубликовано</u> {{$dataArray['year']}}-{{$dataArray['month']}}-{{$dataArray['day']}} <u>Категории:</u> {{$m->categories->map(fn($item) => $item->title)->implode(', ')}}</div>
				</div>
				<div class="content-box-post-text">
                    {{substr($m->description, 0, 80)}} ...
					<hr>
					<a href="<?=route('news.Show', ['id' => $m->id])?>" class="content-box-post-link">Читать далее ...</a>
                </div>
        </div>
<?php endforeach ?>
{{$news->links()}}
@endsection
