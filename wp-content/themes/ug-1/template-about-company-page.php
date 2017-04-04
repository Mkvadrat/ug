<?php
/*
Template name: About company page
Theme Name: Ug-1
Theme URI: http://ug-1.com.ua/
Description: Тема для сайта ug-1.com.ua
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>

	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>

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

<?php get_footer(); ?>
