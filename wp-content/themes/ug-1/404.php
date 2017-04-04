<?php
/*
Theme Name: Ug-1
Theme URI: http://ug-1.com.ua/
Description: Тема для сайта ug-1.com.ua
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/

get_header(); 
?>
    <!-- start 404-contant -->
    <div class="contant-404">
        <p class="figures-404">404</p>
        <p class="page-not-found">страница не найдена</p>
        <div class="button-block">
            <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">Вернуться на главную</a>
        </div>
    </div>
    <!-- end 404-contant -->

<?php get_footer(); ?>