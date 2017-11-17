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



<?php

	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

	$alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

	$item_page = get_post();

	//var_dump($item_page);

?>



	<div class="layout-panoramnij">



			<?php if(get_field('enable_block_constructed_objects_layouts_page') == 'yes'){ ?>

			<div class="container-fluid padding-none">

					<div class="row margin-none">

							<div class="col-md-12 padding-none">

									<div class="bunner-object">

											<img class="banner-in-body" src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $alt; ?>">



											<div class="object-description">

													<p><?php echo $item_page->post_title; ?>”</p>

											</div>

									</div>

							</div>

					</div>

			</div>



			<div class="container">

					<div class="row">

							<div class="col-md-12">

									<div class="photo-construction">

											<!--<ul>

													<li>

															<a class="fancybox" href="images/construction-panoramnij-1.jpg"><img src="images/construction-panoramnij-1.jpg" alt=""></a>

													</li>

													<li>

															<a class="fancybox" href="images/construction-panoramnij-2.jpg"><img src="images/construction-panoramnij-2.jpg" alt=""></a>

													</li>

													<li>

															<a class="fancybox" href="images/construction-panoramnij-3.jpg"><img src="images/construction-panoramnij-3.jpg" alt=""></a>

													</li>

											</ul>-->

<?php

									if(get_field('gallery_block_constructed_objects_layouts_page')){

									  foreach (get_field ('gallery_block_constructed_objects_layouts_page') as $nextgen_gallery_id) :

                        echo nggShowGallery( $nextgen_gallery_id );

                    endforeach;

									}

?>

									</div>

							</div>

					</div>

			</div>



			<div class="container">

					<div class="row">

							<div class="col-md-12">

									<div class="description-construction text-border">

											<?php the_field('text_block_constructed_objects_layouts_page'); ?>

									</div>

							</div>

					</div>

			</div>

			<?php } ?>



			<div class="container">

        <div class="row">

          <div class="col-md-12">

            <div class="block-contacts-manager-in-object">

              <div class="contacts-manager-in-object">

                <?php if(ifMeta('foto_callback_block_contact_page')){ ?>

                  <img src="<?php getMetaImg('foto_callback_block_contact_page'); ?>" alt="<?php echo getAltImage('foto_callback_block_contact_page')?>" title="<?php echo getTitleImage('foto_callback_block_contact_page')?>">

                <?php }else{ ?>

                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/manager-1.jpg" alt="">

                <?php } ?>



                <p><?php getMeta('name_callback_block_contact_page'); ?></p>



                <!-- <p><?php getMeta('phone_callback_block_contact_page'); ?></p> -->

                <p>
				                <a href="tel:<?php getMeta('phone_callback_block_contact_page'); ?>"><?php getMeta('phone_callback_block_contact_page'); ?></a>
				                <br>
				                <a href="tel:<?php getMeta('phone_callback_two_block_contact_page'); ?>"><?php getMeta('phone_callback_two_block_contact_page'); ?></a>
				            </p>


                <p><?php getMeta('skype_callback_block_contact_page'); ?></p>



                <p><?php getMeta('email_callback_block_contact_page'); ?></p>



                <a class="button fancybox" href="#form-block-modal">Уточнить цену</a>

              </div>

            </div>

          </div>

        </div>

      </div>

	</div>



	<div class="hidden">

			<div class="form-block-modal" id="form-block-modal">

					<h4>вы можете написать нам</h4>



					<div class="form">

							<p><span>Ваше имя*:</span><input type="text" name="name" id="name"></p>



							<p><span>Ваш телефон:</span><input type="text" name="phone" id="phone"></p>



							<p><span>e-mail*:</span><input type="text" name="email" id="email"></p>



							<p><span>Тема сообщения*:</span><input type="text" name="subject" id="subject"></p>



							<p><span>Текст сообщения*:</span><textarea name="comment" id="comment"></textarea></p>



							<input type="submit" onclick="callbackFormContactsPage();" value="Отправить">

					</div>

			</div>

	</div>



<?php get_footer(); ?>
