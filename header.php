<!DOCTYPE HTML>
<html <?php language_attributes(); //загрузка языковых атрибутов(язык, направление чтения) ?> > 
<head>
<meta charset="<?php bloginfo( 'charset' ); //кодировка сайта  ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" > <!--Для мобильных устройств -->

<title>
   <?php
	global $page, $paged; // определение переменных для отображения разных заголовков
	$options = get_option( 'az_theme_options' ); //инициализация настроек темы
	if ( !$options[color] ) $options[color]='default'; 
	wp_title( '|', true, 'right' ); // Добавление названия сайта
	
	bloginfo( 'name' );

	// Добавление описания к заголовку страницы
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Добавление номера страницы, если не главная
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s'), max( $paged, $page ) );

   ?>
</title>

<link href='http://fonts.googleapis.com/css?family=PT+Sans+Caption&amp;subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'> 
<!--шрифт -->

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/color_theme/<?php echo $options[color]; ?>.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* Подключение JavaScript к страницам комментариев, если используется поддержка комментариев. */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Подключение функции поддержки плагинов,скриптов, метатэгов */
	wp_head();
?>

</head>

<body <?php body_class(); ?>>

<div id="az-wrap">

<div id="az-sidebar">
		<header id="az-header">
			<a href="<?php  echo home_url(); ?>" title="<?php bloginfo('name'); ?>">   
			
				<?php if (az_has_header_image() ) : ?> <!-- проверка, установлен ли заголовок -->
						
					<img 
					  src="<?php header_image(); ?>" 
					  height="<?php echo get_custom_header()->height; ?>" 
					  width="<?php echo get_custom_header()->width; ?>" 
					  alt=""
					  class="az-logo" 
					/>
					
				<?php endif; ?>
			
			</a>
			
			<h1 class="az-title">
				<a href="<?php  echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
			</h1>
			
			<div class="az-right">
				<address>
					<?php echo $options[address]; ?>
				</address>				
				
				<div class="tel">
					<a class="tel" href="tel:<?php echo $options[tel]; ?>"><?php echo $options[tel]; ?></a>
				</div>				
			</div>	
				<h2 class="az-description"><?php bloginfo( 'description' ); ?></h2>	
						
			
		</header>	
		
			<?php  dynamic_sidebar( 'sidebar' ); ?> 	
			
	</div> 

    

