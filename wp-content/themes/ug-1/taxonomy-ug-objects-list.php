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

    <!-- start menu-objects-list -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="menu-objects-list">
<?php
					$term = get_queried_object();
					$cat_id = $term->term_id;
					$cat_data = get_option("category_$cat_id");
?>
                    <h3><?php echo $cat_data['title_for_categories_objects_page']; ?></h3>

                    <!--<p><?php echo $cat_data['text_for_categories_objects_page']; ?></p>-->
                    <p><?php echo wpautop(stripcslashes( $cat_data['text_for_categories_objects_page'] ), $br = false); ?></p>

<?php
					$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'category' 	     => 'ug-objects-list',
						'post_type'      => 'ug-objects',
						'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
						'paged'          => $current_page
					);

					$objects = get_posts( $args );
?>
					<ul>
<?php
						foreach($objects as $objects_list){

							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($objects_list->ID), 'full');
							$price_image_url = wp_get_attachment_image_src( get_post_meta( $objects_list->ID, 'price_ug_objects_list_taxonomy', $single = true ), 'full');
							$matkapital_image_url = wp_get_attachment_image_src( get_post_meta( $objects_list->ID, 'capital_ug_objects_list_taxonomy', $single = true ), 'full');
		?>
								<li>            <?php //var_dump($price_image_url[0]);?>
		                            <a class="photo-object" href="<?php echo get_permalink($objects_list->ID); ?>">
		                            <?php if(get_post_meta( $objects_list->ID, 'enable_price_ug_objects_list_taxonomy', $single = true ) == 'yes' && $price_image_url[0]){ ?>
		                                <span><img src="<?php echo $price_image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_meta( $objects_list->ID, 'price_ug_objects_list_taxonomy', $single = true ), '_wp_attachment_image_alt', $single = true ); ?>"></span>
		                            <?php } ?>

		                            <?php if(!empty($image_url)){ ?>
		                          		<img class="mask" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mask.png">
										<img class="slid-object" src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($objects_list->ID), '_wp_attachment_image_alt', true ); ?>">
									<?php }else{ ?>
										<img class="mask" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mask.png">
										<img class="slid-object" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/about-2.jpg">
									<?php } ?>

									<?php if(get_post_meta( $objects_list->ID, 'enable_capital_ug_objects_list_taxonomy', $single = true ) == 'yes' && $matkapital_image_url[0]){ ?>
		                                <img class="matkapital" src="<?php echo $matkapital_image_url[0];?>" alt="<?php echo get_post_meta( get_post_meta( $objects_list->ID, 'capital_ug_objects_list_taxonomy', $single = true ), '_wp_attachment_image_alt', $single = true ); ?>">
		                            <?php } ?>
		                            </a>

		                            <h4><?php echo $objects_list->post_title; ?></h4>

		                            <p>Адрес: <?php echo get_post_meta( $objects_list->ID, 'adress_ug_objects_list_taxonomy', $single = true ); ?></p>

		                            <p>Количество домов: <i><?php echo get_post_meta( $objects_list->ID, 'amount_houses_ug_objects_list_taxonomy', $single = true ); ?></i></p>

		                            <p>Количество квартир: <i><?php echo get_post_meta( $objects_list->ID, 'amount_apartments_ug_objects_list_taxonomy', $single = true ); ?></i></p>

		                            <p>Срок начала строительства: <i><?php echo get_post_meta( $objects_list->ID, 'date_beginning_construction_ug_objects_list_taxonomy', $single = true ); ?></i></p>

		                            <p>Срок окончания строительства: <i><?php echo get_post_meta( $objects_list->ID, 'date_completion_construction_ug_objects_list_taxonomy', $single = true ); ?></i></p>

		                            <a class="button" href="<?php echo get_permalink($objects_list->ID);?>">Подробнее ></a>
		                        </li>
	<?php
						}

						wp_reset_postdata();
?>
					</ul>
<?php
					$defaults = array(
						'type' => 'array',
						'prev_next'    => True,
						'prev_text'    => __('В начало'),
						'next_text'    => __('В конец'),
					);

					$pagination = paginate_links($defaults);
?>
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
    </div>
    <!-- end menu-objects-list -->

<?php get_footer(); ?>
