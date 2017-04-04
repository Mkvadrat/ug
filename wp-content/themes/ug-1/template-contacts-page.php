<?php
/*
Template name: Contacts page
Theme Name: Ug-1
Theme URI: http://ug-1.com.ua/
Description: Тема для сайта ug-1.com.ua
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>

	<!-- start contacts-block -->
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <!-- end contacts-block -->

	<!-- start map -->
    <div class="map">
			<!-- start map -->
			<div id="maps" style="width:100%; height:610px"></div>
			<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&load=package.full" type="text/javascript"> </script>
					<script type="text/javascript">
							var myMap;
							ymaps.ready(init);
							function init()
							{
									ymaps.geocode('<?php the_field('adress_organization_contact_page'); ?>', {
											results: 1
									}).then
									(
											function (res)
											{
													var firstGeoObject = res.geoObjects.get(0),
															myMap = new ymaps.Map
															("maps",
																	{
																			center: firstGeoObject.geometry.getCoordinates(),
																			zoom: 15,
									controls: ["zoomControl", "fullscreenControl"]
																	}
															);
													var myPlacemark = new ymaps.Placemark
													(
															firstGeoObject.geometry.getCoordinates(),
															{
																	iconContent: ''
															},
															{
																	preset: 'twirl#blueStretchyIcon'
															}
													);
													myMap.geoObjects.add(myPlacemark);
													myMap.controls.add('typeSelector');
													myMap.behaviors.disable('scrollZoom');
											},
											function (err)
											{
													alert(err.message);
											}
									);
							}
			</script>
			<!--<div class="map"><iframe src="https://api-maps.yandex.ua/frame/v1/-/CZwR4B1z" width="100%" height="610" frameborder="0"></iframe></div>-->
			<!-- end map -->
    </div>
    <!-- end map -->

	<!-- start form-block -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-block">
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
        </div>
    </div>
    <!-- end form-block -->

<?php get_footer(); ?>
