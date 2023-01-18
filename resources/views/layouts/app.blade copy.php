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
					<a>Главная
				</div>
				<div class="header-nav-item">
					<a>О проекте
				</div>
				<div class="header-nav-item">
					<a>Контакты
				</div>		
				<div class="header-nav-item">
					<a>Для любопытных
				</div>						
			</div>
		</div>
		<div class="content-box">
			<div class="content-box-post">
				<div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">13</div>
						<div class="content-box-post-datablock-mount">jan</div>
					</div>
					<div class="content-box-post-titul-text">Это заголовок новости</div>
					<div class="content-box-post-titul-meta">Опубликовано 13 янваяря 2022 года</div>
				</div>
				<div class="content-box-post-text">
					@yield ('post-text')
					<div class="content-box-post-link">Читать далее ...</div>
					<hr>
				</div>	
			</div>

			<div class="content-box-post">
				<div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">13</div>
						<div class="content-box-post-datablock-mount">jan</div>
					</div>
					<div class="content-box-post-titul-text">Это заголовок новости</div>
					<div class="content-box-post-titul-meta">Опубликовано 13 янваяря 2022 года</div>
				</div>
				<div class="content-box-post-text">
					@yield ('post-text')
					<div class="content-box-post-link">Читать далее ...</div>
					<hr>
				</div>	
			</div>
			
			<div class="content-box-post">
				<div class="content-box-post-titul">
					<div class="content-box-post-datablock">
						<div class="content-box-post-datablock-number">13</div>
						<div class="content-box-post-datablock-mount">jan</div>
					</div>
					<div class="content-box-post-titul-text">Это заголовок новости</div>
					<div class="content-box-post-titul-meta">Опубликовано 13 янваяря 2022 года</div>
				</div>
				<div class="content-box-post-text">
					@yield ('post-text')
					<div class="content-box-post-link"><a href="#" class="content-box-post-link-a">Читать далее ...</div>
					<hr>
				</div>	
			</div>
		</div>

		<div class="content-nav">
			<div class="content-nav-about">
				<div class="content-nav-about-title">
					<a>Обо мне	
					
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