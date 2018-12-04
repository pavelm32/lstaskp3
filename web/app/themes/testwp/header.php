<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Главная страница</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head();?>
    <!--link rel="stylesheet" href="css/libs.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css"-->
</head>
<body>
<div class="wrapper">
    <header class="main-header">
        <div class="top-header">
            <div class="top-header__wrap">
                <div class="logotype-block">
                    <div class="logo-wrap"><a href="/"><img src="<?=get_template_directory_uri() . '/img/logo.svg'?>" alt="Логотип" class="logo-wrap__logo-img"></a></div>
                </div>
                <nav class="main-navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'main', 'menu_class' => 'nav-list' ) ); ?>
                </nav>
            </div>
        </div>
        <div class="bottom-header">
            <div class="search-form-wrap">
                <form action="<?php bloginfo( 'url' ); ?>" method="get" class="search-form">
                    <input type="text" placeholder="Поиск..." name="s" class="search-form__input" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
                    <button type="submit" class="search-form__btn-search"><i class="icon icon-search"></i></button>
                </form>
            </div>
        </div>
    </header>
    <!-- header_end-->