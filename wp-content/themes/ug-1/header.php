<?php
/*
Theme Name: Ug-1
Theme URI: http://ug-1.com.ua/
Description: Тема для сайта ug-1.com.ua
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->

<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo ug_wp_title('','', true, 'right'); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/fonts.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/about.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/news.css">
	  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/contacts.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/our-objects-list.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/our-objects.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/construction-process-panoramnij.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/404.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/repairs.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/flat.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/layouts.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-1.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-2.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-3.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-4.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-5.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-5.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-6.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-7.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/panoramnij-8.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/plan.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.9.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- OWL-CAROUSEL -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.theme.css">

    <!-- FANCYBOX -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	  <!--SWEETALERT-->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/sweetalert/dist/sweetalert.css">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/sweetalert/dist/sweetalert.min.js"></script>
	  <?php wp_head(); ?>
</head>

<body>
    <!-- start header -->
    <header>
        <!-- address line -->
        <div class="container-fluid info-line-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<!--<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="">-->
							<img
                              src="<?php header_image(); ?>"
                              height="<?php echo get_custom_header()->height; ?>"
                              width="<?php echo get_custom_header()->width; ?>"
                              alt="logotype"
                            />
						            </a>

                        <div class="header-phone">
                            <!-- <p><i class="fa fa-phone" aria-hidden="true"></i> <?php getMeta('phone_a_builder_main_page'); ?></p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> <?php getMeta('phone_b_builder_main_page'); ?></p> -->

                            <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php getMeta('phone_a_builder_main_page'); ?>"><?php getMeta('phone_a_builder_main_page'); ?></a></p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php getMeta('phone_b_builder_main_page'); ?>"><?php getMeta('phone_b_builder_main_page'); ?></a></p>



                        </div>

                        <div class="header-sk-vib">
                            <!--<p><?php getMeta('viber_builder_main_page'); ?></p>-->
                            <p><i class="fa fa-skype" aria-hidden="true"></i><?php getMeta('skype_builder_main_page'); ?></p>
                        </div>

                        <div class="header-address">
                            <p><?php getMeta('adress_builder_main_page'); ?></p>
                            <p><?php getMeta('slogan_builder_main_page'); ?><span><?php getMeta('trademark_builder_main_page'); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- menu line -->
        <div class="container-fluid header header-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-default">
                            <a class="choice-apartments" href="http://юг-1.рф/panoramnyj-blok-1/"><img src="http://xn---1-glc1i.xn--p1ai/wp-content/themes/ug-1/images/ug-kv.gif" alt="">выбор<br>квартир</a><a class="shares" href="/actions/">акции</a>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse content-container" id="bs-example-navbar-collapse-1">
                                <!--<ul class="nav navbar-nav navbar-right">
                                    <li><a href="about.html" title="About us">О компании</a></li>
                                    <li><a href="our-objects-list.html" title="Constructed">Построено</a></li>
                                    <li><a href="our-objects-list.html" title="our objects">Наши объекты</a></li>
                                    <li><a href="contacts.html" title="contacts">Контакты</a></li>
                                    <li><a href="news.html" class="contact" title="News">Новости</a></li>
                                    <li><a href="about.html" class="repairs" title="Contact">Ремонт</a></li>
                                </ul>-->
<?php
                      	if (has_nav_menu('primary')){
                      		wp_nav_menu( array(
                      			'theme_location'  => 'primary',
                      			'menu'            => '',
                      			'container'       => false,
                      			'container_class' => '',
                      			'container_id'    => '',
                      			'menu_class'      => '',
                      			'menu_id'         => '',
                      			'echo'            => true,
                      			'fallback_cb'     => 'wp_page_menu',
                      			'before'          => '',
                      			'after'           => '',
                      			'link_before'     => '',
                      			'link_after'      => '',
                      			'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
                      			'depth'           => 1,
                      			'walker'          => '',
                      		) );
                      	}
?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
