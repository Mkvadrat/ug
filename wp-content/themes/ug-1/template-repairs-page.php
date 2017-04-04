<?php
/*
Template name: Repairs page
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

	<div class="layout-panoramnij">
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
