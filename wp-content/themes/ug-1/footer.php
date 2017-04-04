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

    <!-- start footer -->
    <footer>
        <div class="container-fluid footer-top-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-address">
                            <h6>наш адрес:</h6>
                            <p><?php getMeta('adress_footer_builder_main_page'); ?></p>
                        </div>

                        <div class="footer-call-us">
                            <h6><?php getMeta('title_footer_builder_main_page'); ?></h6>
							<p><?php getMeta('text_footer_builder_main_page'); ?></p>
                        </div>

                        <div class="footer-phone">
                            <!-- <p><?php getMeta('phone_footer_a_builder_main_page'); ?></p>
                            <p><?php getMeta('phone_footer_b_builder_main_page'); ?></p> -->

                            <p><a href="tel:<?php getMeta('phone_footer_a_builder_main_page'); ?>"><?php getMeta('phone_footer_a_builder_main_page'); ?></a></p>
                            <p><a href="tel:<?php getMeta('phone_footer_b_builder_main_page'); ?>"><?php getMeta('phone_footer_b_builder_main_page'); ?></a></p>
                            <p>skype: <?php getMeta('skype_footer_builder_main_page'); ?></p>
                            <!--<p>viber: <?php getMeta('viber_footer_builder_main_page'); ?></p>-->
                        </div>

                        <div class="footer-socials">
                            <h6>мы в социальных сетях:</h6>
                            <a href="<?php getMeta('instagram_footer_builder_main_page'); ?>"></a>
                            <a href="<?php getMeta('facebook_footer_builder_main_page'); ?>"></a>
                            <a href="<?php getMeta('vkontakte_footer_builder_main_page'); ?>"></a>
                            <a href="<?php getMeta('google_footer_builder_main_page'); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-line">

                        <a class="logo-footer" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php getMetaImg('logo_footer_builder_main_page'); ?>" alt="<?php echo getAltImage('logo_footer_builder_main_page') ?>" title="<?php echo getTitleImage('logo_footer_builder_main_page') ?>">
                        </a>

                        <!--<ul>
                            <li><a href="about.html" title="About us">О компании</a></li>

                            <li><a href="our-objects-list.html" title="Constructed">Построено</a></li>

                            <li><a href="our-objects-list.html" title="our objects">Наши объекты</a></li>

                            <li><a href="about.html" class="repairs" title="Contact">Ремонт</a></li>

                            <li><a href="news.html" class="contact" title="News">Новости</a></li>

                            <li><a href="contacts.html" title="contacts">Контакты</a></li>
                        </ul>-->

<?php
                      	if (has_nav_menu('footer_menu')){
                      		wp_nav_menu( array(
                      			'theme_location'  => 'footer_menu',
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
                      			'items_wrap'      => '<ul>%3$s</ul>',
                      			'depth'           => 1,
                      			'walker'          => '',
                      		) );
                      	}
?>
                        <p class="made-in">ЖСК "ЮГ-1" 2017. Все права защищены. <span>сделано в <a href="http://mkvadrat.com/">DA MKVADRAT</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <div class="hidden">
        <div id="news1">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/2iJoGjj0g5o" frameborder="0" allowfullscreen></iframe>
        </div>

        <div id="news2">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NRTWfGsc09c" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $("#owl-example1").owlCarousel({
            autoPlay: 4000,
            items : 1,
            itemsDesktop : [1000,1],
            itemsDesktopSmall : [900,1],
            itemsTablet : [600,1],
            pagination : false,
            navigation: true,
            stopOnHover : true,
            slideSpeed : 1000,
            rewindNav : false
        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#owl-example2").owlCarousel({
            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [1021,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [479,1],
            singleItem : false,
            itemsScaleUp : true,
            pagination : false,
            navigation : true,
            stopOnHover : true,
            slideSpeed : 1000
        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#owl-example3").owlCarousel({
            items : 3,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [1070,2],
            itemsTablet: [778,1],
            itemsTabletSmall: false,
            itemsMobile : [479,1],
            singleItem : false,
            itemsScaleUp : true,
            pagination : false,
            navigation : true,
            stopOnHover : true,
            slideSpeed : 1000
        });
    });

</script>

<script type="text/javascript">
//форма обратной связи
function callbackFormContactsPage() {
  var data = {
    'action': 'callbackFormContactsPage',
    'name' : $('#name').val(),
    'phone' : $('#phone').val(),
    'email' : $('#email').val(),
    'subject' : $('#subject').val(),
    'comment' : $('#comment').val()
  };
  $.ajax({
    url:'http://' + location.host + '/wp-admin/admin-ajax.php',
    data:data, // данные
    type:'POST', // тип запроса
    success:function(data){
      swal(data.message);
    }
  });
};
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("a.ancLinks").click(function () {
            var elementClick = $(this).attr("href");
            var destination = $(elementClick).offset().top;
            $('html,body').animate( { scrollTop: destination }, 1100 );
            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("li.scroll").click(function () {
			var offset = $('#change-flat').offset().top;
			$('html,body').animate( { scrollTop: offset }, 1100 );
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("li.scroll-2").click(function () {
            var offset = $('#description-about-flat').offset().top;
            $('html,body').animate( { scrollTop: offset }, 1100 );
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>

<?php wp_footer(); ?>
</body>
</html>
