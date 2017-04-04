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
								'category' 	     => getCurrentCatID(),
								'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
								'paged'          => $current_page
							);

							$news = get_posts( $args );

							if(!empty($news)){
							foreach( $news as $news_list ){

								//var_dump($news_list);
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($news_list->ID), 'full');
?>
						<div class="news-list">
							<?php if(!empty($image_url)){ ?>
								<a href="<?php echo get_permalink($news_list->ID); ?>"><img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($news_list->ID), '_wp_attachment_image_alt', true ); ?>"></a>
							<?php }else{ ?>
								<a href="<?php echo get_permalink($news_list->ID); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news-2.jpg" alt=""></a>
							<?php } ?>

							<h4><?php echo $news_list->post_title; ?></h4>

                <p><?php echo mb_substr( strip_tags( $news_list->post_content ), 0, 450 ); ?><a href="<?php echo get_permalink($news_list->ID)?>">...Читать далее</a></p>

                <!--<p><?php echo wp_trim_words( $news_list->post_content, 40, '<a href="'. get_permalink($news_list->ID) .'"> ...Читать далее</a>' ); ?></p>-->
						</div>
<?php
							}

							wp_reset_postdata();

							}else{
?>
							<h4>Извините, в данной рубрике новости отсутствуют.</h4>
							<div>
								<p>Новости не найдены...</p>
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

                <div class="col-lg-1 col-md-12">
                	<div class="years years-list">
<?php
							$parent_id = 19;
							$sub_cats = get_categories( array(
								'child_of' => $parent_id,
								'hide_empty' => 0
							) );
							if( $sub_cats ){
								echo '<ul>';
								foreach( $sub_cats as $cat ){
									if(getCurrentCatID() == $cat->cat_ID){
										echo '<li><a class="active-years" href="'. get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
									}else{
										echo '<li><a href="'. get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
									}
								}
								echo '</ul>';
							}
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
