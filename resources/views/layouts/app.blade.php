<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<title>myBLOG</title>
</head>
<body>
	<div class="content">
		<div class="header">
			<img src="./img/ico.png" class="header-ico">			
			<div class="header-label">
				Самый лучший способ чему-то научиться - учить других.
			</div>
			<div class="header-nav">
				<div class="header-nav-item-active">
					<a>Главная</a>
				</div>
				<div class="header-nav-item">
					<a>О проекте</a>
				</div>
				<div class="header-nav-item">
					<a>Контакты</a>
				</div>		
				<div class="header-nav-item">
					<a>Для любопытных</a>
				</div>						
			</div>
		</div>
		<div class="content-box">
			@yield ('news')
		</div>
		<div class="content-nav">
			<div class="content-nav-about">
				<div class="content-nav-about-title">
					<a>Обо мне</a>
				</div>
				<hr>
				<div class="content-nav-about-photo">
					<img src="./img/ava.jpg">
					<p>Заглушка для текста обо мне
				</div>
				<hr>	
			</div>
		</div>
	</div>
</body>
</html>