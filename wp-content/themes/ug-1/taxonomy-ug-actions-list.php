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

	<!-- start news-block -->
    <div class="container">
        <div class="row">
        	<div class="news-block">
            	<div class="col-lg-11 col-md-12">
                    <div class="news">
<?php
					$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'category' 	     => 'ug-actions-list',
						'post_type'      => 'ug-actions',
						'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
						'paged'          => $current_page
					);

					$actions = get_posts( $args );

					if(!empty($actions)){
					foreach( $actions as $actions_list ){

						//var_dump($news_list);
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($actions_list->ID), 'full');
?>
						<div class="news-list">
							<?php if(!empty($image_url)){ ?>
								<a href="<?php echo get_permalink($actions_list->ID); ?>"><img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($actions_list->ID), '_wp_attachment_image_alt', true ); ?>"></a>
							<?php }else{ ?>
								<a href="<?php echo get_permalink($actions_list->ID); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news-2.jpg" alt=""></a>
							<?php } ?>

							<h4><?php echo $actions_list->post_title; ?></h4>

							 <p><?php echo mb_substr( strip_tags( $actions_list->post_content ), 0, 450 ); ?><a href="<?php echo get_permalink($actions_list->ID)?>">...Читать далее</a></p>

						</div>
<?php
							}

							wp_reset_postdata();

							}else{
?>
							<h4>Извините, в данной рубрике акции отсутствуют.</h4>
							<div>
								<p>Акции не найдены...</p>
							</div>
<?php
							}

							$defaults = array(
								'type' => 'array',
								'prev_next'    => True,
								'prev_text'    => __('В начало'),
								'next_text'    => __('В конец'),
							);

							$pagination = paginate_links($defaults);
?>
                    </div>
                </div>

                <?php if($pagination){ ?>
				<div class="col-md-12">
                    <div class="paggination">
                        <ul>
						<?php foreach ($pagination as $pag){ ?>
                            <li><?php echo $pag; ?></li>
						<?php } ?>
                        </ul>
                    </div>
           		</div>
           		<?php } ?>
            </div>
         </div>
    </div>

    <!-- end news-block -->

<?php get_footer(); ?>
