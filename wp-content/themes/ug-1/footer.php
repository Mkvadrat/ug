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

                        <!-- Yandex.Metrika informer -->

                        <a class="yandex-metrika" href="https://metrika.yandex.ru/stat/?id=44719720&amp;from=informer"

                        target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/44719720/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"

                        style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="44719720" data-lang="ru" /></a>

                        <!-- /Yandex.Metrika informer -->



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





 

<!-- Yandex.Metrika counter -->

<script type="text/javascript" >

    (function (d, w, c) {

        (w[c] = w[c] || []).push(function() {

            try {

                w.yaCounter44719720 = new Ya.Metrika({

                    id:44719720,

                    clickmap:true,

                    trackLinks:true,

                    accurateTrackBounce:true,

                    webvisor:true

                });

            } catch(e) { }

        });

 

        var n = d.getElementsByTagName("script")[0],

            s = d.createElement("script"),

            f = function () { n.parentNode.insertBefore(s, n); };

        s.type = "text/javascript";

        s.async = true;

        s.src = "https://mc.yandex.ru/metrika/watch.js";

 

        if (w.opera == "[object Opera]") {

            d.addEventListener("DOMContentLoaded", f, false);

        } else { f(); }

    })(document, window, "yandex_metrika_callbacks");

</script>

<noscript><div><img src="https://mc.yandex.ru/watch/44719720" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<!-- /Yandex.Metrika counter -->



<script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code="f044d44fef18fe83b9eb9e00cc1d4038" charset="UTF-8"></script>

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-35115627-4', 'auto');

  ga('send', 'pageview');



</script>

</body>

</html>

