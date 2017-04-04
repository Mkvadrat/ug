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

	<!-- start menu-objects -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="menu-objects">
                    <ul>
<?php
					$args = array(
						'numberposts' => 0,
						'post_type'   => 'ug-building',
						'orderby'     => 'date',
						'order'       => 'DESC',
					);

					$building_menu = get_posts( $args );

					foreach($building_menu as $building_menu_list){
?>
<?php
						if($building_menu_list->ID == get_the_ID()){
?>
							<li><a class="active-menu-objects" href="<?php echo get_permalink($building_menu_list->ID); ?>"><?php echo $building_menu_list->post_title; ?></a></li>
<?php
						}else{
?>
							<li><a href="<?php echo get_permalink($building_menu_list->ID); ?>"><?php echo $building_menu_list->post_title; ?></a></li>
<?php
						}
					}
?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end menu-objects -->

	<div class="our-objects-block">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>

	<!-- start map -->
    <div class="map" id="maps" style="width:100%; height:610px"></div>
		<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&load=package.full" type="text/javascript"> </script>
        <script type="text/javascript">
            var myMap;
            ymaps.ready(init);
            function init()
            {
                ymaps.geocode('<?php the_field('adress_ug_building_list_taxonomy'); ?>', {
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

<?php get_footer(); ?>
