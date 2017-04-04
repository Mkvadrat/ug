<?php
/*
Template name: Main page
Theme Name: Ug-1
Theme URI: http://ug-1.com.ua/
Description: Тема для сайта ug-1.com.ua
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>

    <!-- start top slider -->
	<?php if(get_field('enable_slider_builder_main_page') == 'yes'){?>
    <div class="top-slider">
        <div id="owl-example1" class="owl-carousel">
		<?php if(get_field('enable_a_builder_main_page') == 'yes'){?>
            <div>
                <img class="img-slider" src="<?php the_field('slider_a_builder_main_page'); ?>" alt="">
                <div class="container-from-text">
					<?php if(get_field('action_slider_a_builder_main_page') == 'yes'){?>
						<img class="slider-sale" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/sale.png" alt="">
					<?php } ?>
					<?php if(get_field('matkapital_a_builder_main_page') == 'yes'){?>
						<img class="slider-matkapital" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/matkapital.png" alt="">
					<?php } ?>
					<?php if(get_field('installments_a_builder_main_page') == 'yes'){?>
						<img class="slider-payment" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/payment.png" alt="">
					<?php } ?>

					<?php the_field('text_a_builder_main_page'); ?>
                    <a href="<?php the_field('link_a_builder_main_page'); ?>">узнать подробнее</a>
                </div>
            </div>
		<?php } ?>

		<?php if(get_field('enable_b_builder_main_page') == 'yes'){?>
            <div>
                <img src="<?php the_field('slider_b_builder_main_page'); ?>" alt="">
                <div class="container-from-text">
					<?php if(get_field('action_slider_b_builder_main_page') == 'yes'){?>
						<img class="slider-sale" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/sale.png" alt="">
					<?php } ?>
					<?php if(get_field('matkapital_b_builder_main_page') == 'yes'){?>
						<img class="slider-matkapital" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/matkapital.png" alt="">
					<?php } ?>
					<?php if(get_field('installments_b_builder_main_page') == 'yes'){?>
						<img class="slider-payment" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/payment.png" alt="">
					<?php } ?>

					<?php the_field('text_b_builder_main_page'); ?>
                    <a href="<?php the_field('link_b_builder_main_page'); ?>">узнать подробнее</a>
                </div>
            </div>
		<?php } ?>

		<?php if(get_field('enable_c_builder_main_page') == 'yes'){?>
            <div>
                <img src="<?php the_field('slider_c_builder_main_page'); ?>" alt="">
                <div class="container-from-text">
					<?php if(get_field('action_slider_c_builder_main_page') == 'yes'){?>
						<img class="slider-sale" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/sale.png" alt="">
					<?php } ?>
					<?php if(get_field('matkapital_c_builder_main_page') == 'yes'){?>
						<img class="slider-matkapital" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/matkapital.png" alt="">
					<?php } ?>
					<?php if(get_field('installments_c_builder_main_page') == 'yes'){?>
						<img class="slider-payment" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/payment.png" alt="">
					<?php } ?>

					<?php the_field('text_c_builder_main_page'); ?>
                    <a href="<?php the_field('link_c_builder_main_page'); ?>">узнать подробнее</a>
                </div>
            </div>
		<?php } ?>

		<?php if(get_field('enable_d_builder_main_page') == 'yes'){?>
            <div>
                <img src="<?php the_field('slider_d_builder_main_page'); ?>" alt="">
                <div class="container-from-text">
					<?php if(get_field('action_slider_d_builder_main_page') == 'yes'){?>
						<img class="slider-sale" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/sale.png" alt="">
					<?php } ?>
					<?php if(get_field('matkapital_d_builder_main_page') == 'yes'){?>
						<img class="slider-matkapital" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/matkapital.png" alt="">
					<?php } ?>
					<?php if(get_field('installments_d_builder_main_page') == 'yes'){?>
						<img class="slider-payment" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/payment.png" alt="">
					<?php } ?>

					<?php the_field('text_d_builder_main_page'); ?>
                    <a href="<?php the_field('link_d_builder_main_page'); ?>">узнать подробнее</a>
                </div>
            </div>
		<?php } ?>

		<?php if(get_field('enable_e_builder_main_page') == 'yes'){?>
            <div>
                <img src="<?php the_field('slider_e_builder_main_page'); ?>" alt="">
                <div class="container-from-text">
					<?php if(get_field('action_slider_e_builder_main_page') == 'yes'){?>
						<img class="slider-sale" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/sale.png" alt="">
					<?php } ?>
					<?php if(get_field('matkapital_e_builder_main_page') == 'yes'){?>
						<img class="slider-matkapital" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/matkapital.png" alt="">
					<?php } ?>
					<?php if(get_field('installments_e_builder_main_page') == 'yes'){?>
						<img class="slider-payment" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/payment.png" alt="">
					<?php } ?>

					<?php the_field('text_e_builder_main_page'); ?>
                    <a href="<?php the_field('link_e_builder_main_page'); ?>">узнать подробнее</a>
                </div>
            </div>
		<?php } ?>
        </div>
    </div>
	<?php } ?>
    <!-- end top slider -->

	<!-- start slider-objects -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider-objects">
                    <div id="owl-example2" class="owl-carousel">
						<?php if(get_field('enable_a_best_price_builder_main_page') == 'yes'){?>
							<div>
								<h3><?php the_field('title_a_best_price_builder_main_page'); ?></h3>
								<a href="<?php the_field('link_a_best_price_builder_main_page'); ?>">
								<?php if(get_field('enable_price_a_best_price_builder_main_page') == 'yes'){?>
									<img class="price-main" src="<?php the_field('price_a_best_price_builder_main_page'); ?>" alt="">
								 <?php } ?>
									<img class="mask" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mask.png" alt="">
									<img class="slid-object" src="<?php the_field('image_a_best_price_builder_main_page'); ?>" alt="">
								</a>

								<p><?php the_field('text_a_best_price_builder_main_page'); ?></p>
							</div>
						<?php } ?>

						<?php if(get_field('enable_b_best_price_builder_main_page') == 'yes'){?>
							<div>
								<h3><?php the_field('title_b_best_price_builder_main_page'); ?></h3>
								<a href="<?php the_field('link_b_best_price_builder_main_page'); ?>">
								<?php if(get_field('enable_price_b_best_price_builder_main_page') == 'yes'){?>
									<img class="price-main" src="<?php the_field('price_b_best_price_builder_main_page'); ?>" alt="">
								 <?php } ?>
									<img class="mask" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mask.png" alt="">
									<img class="slid-object" src="<?php the_field('image_b_best_price_builder_main_page'); ?>" alt="">
								</a>

								<p><?php the_field('text_b_best_price_builder_main_page'); ?></p>
							</div>
						<?php } ?>

						<?php if(get_field('enable_c_best_price_builder_main_page') == 'yes'){?>
							<div>
								<h3><?php the_field('title_c_best_price_builder_main_page'); ?></h3>
								<a href="<?php the_field('link_c_best_price_builder_main_page'); ?>">
								<?php if(get_field('enable_price_c_best_price_builder_main_page') == 'yes'){?>
									<img class="price-main" src="<?php the_field('price_c_best_price_builder_main_page'); ?>" alt="">
								 <?php } ?>
									<img class="mask" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mask.png" alt="">
									<img class="slid-object" src="<?php the_field('image_c_best_price_builder_main_page'); ?>" alt="">
								</a>

								<p><?php the_field('text_c_best_price_builder_main_page'); ?></p>
							</div>
						<?php } ?>

						<?php if(get_field('enable_d_best_price_builder_main_page') == 'yes'){?>
							<div>
								<h3><?php the_field('title_d_best_price_builder_main_page'); ?></h3>
								<a href="<?php the_field('link_d_best_price_builder_main_page'); ?>">
								<?php if(get_field('enable_price_d_best_price_builder_main_page') == 'yes'){?>
									<img class="price-main" src="<?php the_field('price_d_best_price_builder_main_page'); ?>" alt="">
								 <?php } ?>
									<img class="mask" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mask.png" alt="">
									<img class="slid-object" src="<?php the_field('image_d_best_price_builder_main_page'); ?>" alt="">
								</a>

								<p><?php the_field('text_d_best_price_builder_main_page'); ?></p>
							</div>
						<?php } ?>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider-objects -->

	<!-- Вывод основного контента в шаблон -->
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
	<!-- Вывод основного контента в шаблон -->

	<!-- start line under top slider -->
    <div class="bg-h2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>отзывы наших клиентов</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- end line under top slider -->

	<!-- Вывод отзывов в шаблон -->
	<div class="container-fluid reviews-slider-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="reviews-slider">
                        <div id="owl-example3" class="owl-carousel">

<?php
	$args = array(
		'numberposts' => 0,
		'post_type'   => 'ug_review',
		'orderby'     => 'date',
		'order'       => 'DESC',
	);

	$review = get_posts( $args );

	foreach($review as $review_list){
		//var_dump($review_list);
?>
							<div>
                                <div class="container-reviews">
                                    <p><?php echo $review_list->post_content; ?></p>
                                    <img src="<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($review_list->ID), 'full'); echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($review_list->ID), '_wp_attachment_image_alt', true ); ?>">
                                    <p><?php echo $review_list->post_title; ?></p>
                                    <p><?php echo get_post_meta( $review_list->ID, 'position_held_review_main_page', $single = true ); ?>, <?php echo get_post_meta( $review_list->ID, 'city_review_main_page', $single = true ); ?></p>
                                </div>
                           	</div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Вывод отзывов в шаблон -->

	<?php if(get_field('enable_banner_builder_main_page') == 'yes'){?>
	<!-- start parent-banner -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="parent-banner">
                    <div class="banner-block">
                        <h3><?php the_field('title_banner_builder_main_page'); ?></h3>
                        <p><?php the_field('text_banner_builder_main_page'); ?></p>
                        <a href="<?php the_field('link_banner_builder_main_page'); ?>">узнать подробнее</a>
                        <img class="banner-in-container" src="<?php the_field('image_banner_builder_main_page'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end parent-banner -->
	<?php } ?>

	<!-- start news -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news">
                    <h3>Новости
                    <a href="<?php echo get_category_link(19); ?>">Читать все</a></h3>
<?php
					$args = array(
						'numberposts' => 2,
						'post_type'   => 'post',
						'orderby'     => 'date',
						'order'       => 'DESC',
					);

					$news = get_posts( $args );

					foreach($news as $news_list){

					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($news_list->ID), 'full');
?>
					<div class="news-list">
                       <?php if(!empty($image_url)){ ?>
								<a href="<?php echo get_permalink($news_list->ID); ?>"><img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($news_list->ID), '_wp_attachment_image_alt', true ); ?>"></a>
							<?php }else{ ?>
								<a href="<?php echo get_permalink($news_list->ID); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news-2.jpg" alt=""></a>
						<?php } ?>

                        <h4><?php echo $news_list->post_title; ?></h4>

                        <!--<p><?php echo wp_trim_words( $news_list->post_content, 60, '<a href="'. get_permalink($news_list->ID) .'"> ...Читать далее</a>' ); ?></p>-->
												<p><?php echo mb_substr( strip_tags( $news_list->post_content ), 0, 450 ); ?><a href="<?php echo get_permalink($news_list->ID)?>">...Читать далее</a></p>
                    </div>
<?php
					}

					wp_reset_postdata();
?>
                </div>
            </div>
        </div>
    </div>
    <!-- end news -->

    <!-- start contact-us -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-us">
                    <h4>Cвяжитесь с нами</h4>

                    <div class="form">
                        <input type="text" name="name" id="name" placeholder="Введите Ваше имя*">
                        <input type="text" name="phone" id="phone" placeholder="Введите Ваш телефон*">
                        <input type="text" name="email" id="email" placeholder="Введите Ваш е-mail*">
                        <textarea cols="30" rows="10" name="comment" id="comment" placeholder="Текст сообщения"></textarea>
                        <input type="submit" onclick="callbackFormMainPage();" value="Отправить">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact-us -->

	<script type="text/javascript">
	//форма обратной связи
	function callbackFormMainPage() {
		var data = {
			'action': 'callbackFormMainPage',
			'name' : $('#name').val(),
			'phone' : $('#phone').val(),
			'email' : $('#email').val(),
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

<?php get_footer(); ?>
