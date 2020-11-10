<?php
/*
Theme Name: Sofiya
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>

	<div class="content">
        <h1><?php the_title(); ?></h1>

        <div class="card-room">
            <div class="row">
                <div class="room-images col-6">
					<?php if( have_rows('room_image_single_rooms_page')){ ?>
                    <div class="room-slider">
                        <div class="fotorama" data-nav="thumbs">
							<?php while ( have_rows('room_image_single_rooms_page') ) { the_row(); ?> 
								<img src="<?php echo get_sub_field('image_subblock_main_page'); ?>" width="95" height="63"/>
							<?php } ?>
                        </div>
                    </div>
					<?php } ?>
                </div>
                <div class="room-description col-6">
					<?php if( have_rows('room_short_charact_single_rooms_page')){ ?>
					<?php while ( have_rows('room_short_charact_single_rooms_page') ) { the_row(); ?> 
						<p><?php echo get_sub_field('text_subblock_main_page'); ?></p>
					<?php } ?>
					<?php } ?>
					
					<?php if(get_field('room_rate_single_rooms_page')){ ?>
						<p>Цена <strong><?php echo get_field('room_rate_single_rooms_page'); ?></strong></p>
					<?php } ?>
					
					<?php echo get_field('room_findprice_single_rooms_page'); ?>
                    
					<?php the_content(); ?>
                </div>
            </div>
            <div class="room-services row row-cols-4">
                <div class="list-column">
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/video.svg"/>
                        </div>
                        <strong>Видео/аудио:</strong>
                        <ul class="list-group">
                            <li>Кабельное телевидение</li>
                            <li>Телевизор</li>
                        </ul>
                    </div>
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/internet.svg"/>
                        </div>
                        <strong>Интернет/телефония:</strong>
                        <ul class="list-group">
                            <li>Wi-Fi</li>
                            <li>Телефон</li>
                        </ul>
                    </div>
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/electronica.svg"/>
                        </div>
                        <strong>Электроника:</strong>
                        <ul class="list-group">
                            <li>Система климат-контроля</li>
                            <li>Фен</li>
                            <li>Холодильник</li>
                            <li>Электронные замки</li>
                        </ul>
                    </div>
                </div>
                <div class="list-column">
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/vannaya.svg"/>
                        </div>
                        <strong>Ванная комната:</strong>
                        <ul class="list-group">
                            <li>Биде</li>
                            <li>Душевая кабина</li>
                            <li>Пляжные полотенца</li>
                            <li>Унитаз</li>
                            <li>Ванная с джакузи</li>
                            <li>Косметические средства</li>
                            <li>Раковина</li>
                            <li>Тапочки</li>
                            <li>Халаты</li>
                            <li>Гидромассажный душ</li>
                        </ul>
                    </div>
                </div>
                <div class="list-column">
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/krovati.svg"/>
                        </div>
                        <strong>Кровати:</strong>
                        <ul class="list-group">
                            <li>Двуспальная кровать</li>
                            <li>Ортопедический матрас</li>
                        </ul>
                    </div>
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/mebel.svg"/>
                        </div>
                        <strong>Мебель:</strong>
                        <ul class="list-group">
                            <li>Гардеробная</li>
                            <li>Зеркало</li>
                            <li>Мягкая мебель</li>
                            <li>Кресла</li>
                            <li>Журнальный столик</li>
                            <li>Тумбы</li>
                        </ul>
                    </div>
                </div>
                <div class="list-column">
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/territoriya.svg"/>
                        </div>
                        <strong>Внешняя территория и вид из окон:</strong>
                        <ul class="list-group">
                            <li>Балкон с красивым видом</li>
                            <li>Вид на море</li>
                        </ul>
                    </div>
                    <div>
                        <div class="list-img">
                            <img src="/wp-content/themes/atlantik/images/prochee.svg"/>
                        </div>
                        <strong>Прочее:</strong>
                        <ul class="list-group">
                            <li>Обслуживание номеров</li>
                            <li>Набор посуды</li>
                            <li>Отопление</li>
                            <li>Сейф</li>
                            <li>Чайный набор</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="related-block">
            <h3>Смотрите также</h3>
            <div class="related-grid">
                <div class="item-carousel">
                    <div class="image-carousel" style="background-image: url('/wp-content/themes/atlantik/images/room-1.jpg')"></div>
                    <div class="text-carousel">
                        <h3>НОМЕР «СТАНДАРТ»</h3>
                        <p>от 2800 руб. за номер в сутки</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
                <div class="item-carousel">
                    <div class="image-carousel" style="background-image: url('/wp-content/themes/atlantik/images/room-2.jpg')"></div>
                    <div class="text-carousel">
                        <h3>НОМЕР «семейный»</h3>
                        <p>от 4200 руб. за номер в сутки</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
                <div class="item-carousel">
                    <div class="image-carousel" style="background-image: url('/wp-content/themes/atlantik/images/room-3.jpg')"></div>
                    <div class="text-carousel">
                        <h3>НОМЕР «Студио-горы»</h3>
                        <p>от 4800 руб. за номер в сутки</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
                <div class="item-carousel">
                    <div class="image-carousel" style="background-image: url('/wp-content/themes/atlantik/images/room-4.jpg')"></div>
                    <div class="text-carousel">
                        <h3>НОМЕР «СТудио-море»</h3>
                        <p>от 6200 руб. за номер в сутки</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>