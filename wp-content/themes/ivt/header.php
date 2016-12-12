<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]><html id="ie6" <?php language_attributes(); ?>><![endif]--><!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]--><!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]--><!--[if !(IE 6) & !(IE 7) & !(IE 8)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
	<title><?php 
        if( is_404() ) echo 'Страница «404» | '.get_bloginfo();
        else if (is_search() ) echo 'Результаты поиска | '.get_bloginfo();
        else wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>/animate.min.css" />
	<!--link rel="stylesheet" type="text/css" media="all" href="<!--?php bloginfo( 'stylesheet_url' ); ?>" /-->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<!--[if lt IE 9]>	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
    <!-- Уведомление поисковых систем о другой версии сайта -->
    <?php if (is_single()) { $post_id = get_the_ID(); ?>
    <link rel="alternate" hreflang="en" href="<php bloginfo('url');?>/en/<?php echo get_post_meta($post_id, 'enurl', true);?>">
    <?php } elseif (is_front_page()) { ?>
    <link rel="alternate" hreflang="en" href="/en">
    <?php } elseif (in_category('7')) { ?> 
    <link rel="alternate" hreflang="en" href="<?php bloginfo('url'); ?>/en/category/helios">
    <?php } elseif (in_category('8')) { ?> 
    <link rel="alternate" hreflang="en" href="en/category/synergy-center"> 
    <?php } elseif (in_category('9')) { ?> 
    <link rel="alternate" hreflang="en" href="en/category/mtp04">
    <?php } elseif (in_category('10')) { ?> 
    <link rel="alternate" hreflang="en" href="en/category/company">
    <?php } else { ?>
        <link rel="alternate" hreflang="en" href="<?php bloginfo('url');?>/en/<?php if(isset($args[3]) && !(isset($args[3]))) echo $args[3]; else echo $dd; ?>">    
    <?php } ?>
    <script type="text/javascript">
        $("document").ready(function($){
            var nav = $('#main-header');
            $(window).scroll(function () {
                 if ($(this).scrollTop() > 50){  
                    nav.addClass("f-nav");
                } else {
                    nav.removeClass("f-nav");
                }
            });
        });
    </script>
    <script>
    $(document).ready(function(){   
        $(window).scroll(function () {
            if ($(this).scrollTop() > 0) {
                $('#scroller').fadeIn();
            } else {
                $('#scroller').fadeOut();
            }
        });
        $('#scroller').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() { 
        $('.getcall').click( function(event){ 
            $('body').addClass('modal-lock'); // Добавляем класс при открытии модалки
            event.preventDefault(); 
            $('#overlay').fadeIn(400, 
                function(){ // после выполнения предъидущей анимации
                    $('#modal_form') 
                        .css('display', 'block') // убираем у модального окна display: none;
                        .animate({opacity: 1, top: '10%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
                     var nav = $('#main-header');
                     nav.css('z-index', '-1'); 
            });
        });
        /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
        $('#modal_close, #overlay').click( function(){ // ловим клик по крестику или подложке
            $('body').removeClass('modal-lock'); // Удаляем класс при закрытии
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                    function(){ // после анимации
                        $(this).css('display', 'none'); // делаем ему display: none;
                        $('#overlay').fadeOut(400); // скрываем подложку
                        var nav = $('#main-header');
                        nav.css('z-index', '1'); 
                    }
                );
        });
    });

    </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="modal_form">
    <span id="modal_close"></span> 
        <?php  
            echo do_shortcode("[contact-form-7 id='316' title='Feedback']"); 
        ?>
</div> 
<div id="overlay"></div>

<div id="page" class="hfeed resp">
    <?php do_action( 'before' ); ?>
    <header id="main-header" class="responsive-menu" role="banner">
        <div class="header-container">
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"></a>    
            </div>

             <div class="select-lang-wrapper">
                <ul>
                    <?php 
                    $currenturl = get_permalink();
                    $args = explode("/", $currenturl);
                    if (isset($args[3]) && isset($args[4])) {
                        $dd = $args[3]."/".$args[4];
                    }
                    if (is_single()) { $post_id = get_the_ID();?> 
                    <li class="active"><a href="<?php echo get_post_meta($post_id, 'enurl', true);?>">EN</a></li>
                    <?php } elseif (is_front_page()) { ?>
                    <li class="active"><a href="/en">EN</a></li>
                    <?php } elseif (in_category('7')) { ?> 
                    <li class="active"><a href="<?php bloginfo('url'); ?>/en/category/helios">EN</a></li>
                    <?php } elseif (in_category('8')) { ?> 
                    <li class="active"> <a href="en/category/synergy-center">EN</a></li> 
                    <?php } elseif (in_category('9')) { ?> 
                    <li class="active"><a href="en/category/mtp04">EN</a></li> 
                    <?php } elseif (in_category('10')) { ?> 
                    <li class="active"><a href="en/category/company">EN</a></li> 
                    <?php } else { ?>
                        <li class="active"><a href="<?php bloginfo('url');?>/en/<?php if(isset($args[3]) && !(isset($args[3]))) echo $args[3]; else echo $dd; ?>">EN</a></li>        
                    <?php } ?>
                    <li>RU</li>
                </ul>            
            </div>  
      			
            <div class="search-wrapper">
                <form name="search" action="<?php echo home_url( '/' ) ?>" method="get" >
                    <input type="text" value="<?php echo get_search_query() ?>" name="s" >
                    <button type="submit" class="button"></button>
                </form>
            </div>

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle"></button>
                <?php wp_nav_menu(array( 'sort_column' => 'menu_order', 'container_class' => 'menu-main-menu-container','theme_location'  => 'primary','depth' => '3') ); ?>
            </nav><!-- #site-navigation -->   
            
        </div>

    </header><!-- #main-header -->

