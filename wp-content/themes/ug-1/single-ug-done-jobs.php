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

	<div class="construction-process">
        <!-- start bunner-object -->
        <div class="container-fluid padding-none">
            <div class="row margin-none">
                <div class="col-md-12 padding-none">
                    <div class="bunner-object">

<?php
						$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						$alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
						$item_page = get_post();
?>
						<img class="banner-in-body" src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $alt; ?>">

                        <div class="object-description">
                            <p style="font-size: 2.8vw;"><?php echo $item_page->post_title; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end bunner-object -->

        <!-- START BLOCK 1 -->
        <?php if(get_field('enable_work_period_a_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_a_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_a_construction_process_page'))){
	                    foreach (get_field ('gallery_period_a_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                        <!--<?php the_field('gallery_period_a_construction_process_page'); ?>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_a_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 1 -->

        <!-- START BLOCK 2 -->
        <?php if(get_field('enable_work_period_b_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_b_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_b_construction_process_page'))){
	                    foreach (get_field ('gallery_period_b_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                        <!--<?php the_field('gallery_period_b_construction_process_page'); ?>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_b_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 2 -->

        <!-- START BLOCK 3 -->
        <?php if(get_field('enable_work_period_c_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_c_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_c_construction_process_page'))){
	                    foreach (get_field ('gallery_period_c_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                        <!--<?php the_field('gallery_period_c_construction_process_page'); ?>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_c_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 3 -->

        <!-- START BLOCK 4 -->
        <?php if(get_field('enable_work_period_d_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_d_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_d_construction_process_page'))){
	                    foreach (get_field ('gallery_period_d_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                        <!--<?php the_field('gallery_period_d_construction_process_page'); ?>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_d_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 4 -->

        <!-- START BLOCK 5 -->
        <?php if(get_field('enable_work_period_e_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_e_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_e_construction_process_page'))){
	                    foreach (get_field ('gallery_period_e_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                        <!--<?php the_field('gallery_period_e_construction_process_page'); ?>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_e_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 5 -->

        <!-- START BLOCK 6 -->
        <?php if(get_field('enable_work_period_f_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_f_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_f_construction_process_page'))){
	                    foreach (get_field ('gallery_period_f_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                       <!-- <?php the_field('gallery_period_f_construction_process_page'); ?>   -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_f_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 6 -->

        <!-- START BLOCK 7 -->
        <?php if(get_field('enable_work_period_g_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_g_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_g_construction_process_page'))){
	                    foreach (get_field ('gallery_period_g_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                       <!-- <?php the_field('gallery_period_g_construction_process_page'); ?>    -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_g_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 7 -->

        <!-- START BLOCK 8 -->
        <?php if(get_field('enable_work_period_h_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_h_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_h_construction_process_page'))){
	                    foreach (get_field ('gallery_period_h_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                       <!-- <?php the_field('gallery_period_h_construction_process_page'); ?>       -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_h_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 8 -->

        <!-- START BLOCK 9 -->
        <?php if(get_field('enable_work_period_i_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_i_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_i_construction_process_page'))){
	                    foreach (get_field ('gallery_period_i_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                      <!--  <?php the_field('gallery_period_i_construction_process_page'); ?>                      -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_i_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 9 -->

        <!-- START BLOCK 10 -->
        <?php if(get_field('enable_work_period_j_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_j_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_j_construction_process_page'))){
	                    foreach (get_field ('gallery_period_j_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                    <!--    <?php the_field('gallery_period_j_construction_process_page'); ?>   -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_j_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 10 -->

        <!-- START BLOCK 11 -->
        <?php if(get_field('enable_work_period_k_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_k_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
						if(!empty(get_field ('gallery_period_k_construction_process_page'))){
	                    foreach (get_field ('gallery_period_k_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                        <!--<?php the_field('gallery_period_k_construction_process_page'); ?>          -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_k_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 11 -->

        <!-- START BLOCK 12 -->
        <?php if(get_field('enable_work_period_l_construction_process_page') == 'yes'){ ?>
 		<!-- start date construction -->
        <div class="bg-h2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('work_period_l_construction_process_page'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end date construction -->

        <!-- start photo-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="photo-construction">
<?php
										if(!empty(get_field ('gallery_period_l_construction_process_page'))){
	                    foreach (get_field ('gallery_period_l_construction_process_page') as $nextgen_gallery_id) :
	                        echo nggShowGallery( $nextgen_gallery_id );
	                    endforeach;
										}
?>
                     <!--   <?php the_field('gallery_period_l_construction_process_page'); ?>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end photo-construction -->

        <!-- start description-construction -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php the_field('descr_period_l_construction_process_page'); ?>
                </div>
            </div>
        </div>
        <!-- end description-construction -->
        <?php } ?>
        <!-- END BLOCK 12 -->
	</div>

<?php get_footer(); ?>
