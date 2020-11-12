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
			
			<?php
				if	(
						have_rows('room_equipment_a_single_rooms_page') || 
						have_rows('room_equipment_b_single_rooms_page') ||
						have_rows('room_equipment_c_single_rooms_page') ||
						have_rows('room_equipment_d_single_rooms_page')
					){
			?>
            <div class="room-services row row-cols-4">
				<?php if( have_rows('room_equipment_a_single_rooms_page')){ ?>
                <div class="list-column">
					<?php while ( have_rows('room_equipment_a_single_rooms_page') ) { the_row(); ?>
                    <div>
                        <div class="list-img">
                            <img src="<?php echo get_sub_field('image_subblock_main_page'); ?>"/>
                        </div>
                        <strong><?php echo get_sub_field('title_subblock_main_page'); ?></strong>
						
						<?php if( have_rows('items_subblock_main_page')){ ?>
                        <ul class="list-group">
							<?php while ( have_rows('items_subblock_main_page') ) { the_row(); ?>
                            <li><?php echo get_sub_field('name_items_subblock_main_page'); ?></li>
                            <?php } ?>
                        </ul>
						<?php } ?>
                    </div>
					<?php } ?>
                </div>
				<?php } ?>
				
                <?php if( have_rows('room_equipment_b_single_rooms_page')){ ?>
                <div class="list-column">
					<?php while ( have_rows('room_equipment_b_single_rooms_page') ) { the_row(); ?>
                    <div>
                        <div class="list-img">
                            <img src="<?php echo get_sub_field('image_subblock_main_page'); ?>"/>
                        </div>
                        <strong><?php echo get_sub_field('title_subblock_main_page'); ?></strong>
						
						<?php if( have_rows('items_subblock_main_page')){ ?>
                        <ul class="list-group">
							<?php while ( have_rows('items_subblock_main_page') ) { the_row(); ?>
                            <li><?php echo get_sub_field('name_items_subblock_main_page'); ?></li>
                            <?php } ?>
                        </ul>
						<?php } ?>
                    </div>
					<?php } ?>
                </div>
				<?php } ?>
				
               <?php if( have_rows('room_equipment_c_single_rooms_page')){ ?>
                <div class="list-column">
					<?php while ( have_rows('room_equipment_c_single_rooms_page') ) { the_row(); ?>
                    <div>
                        <div class="list-img">
                            <img src="<?php echo get_sub_field('image_subblock_main_page'); ?>"/>
                        </div>
                        <strong><?php echo get_sub_field('title_subblock_main_page'); ?></strong>
						
						<?php if( have_rows('items_subblock_main_page')){ ?>
                        <ul class="list-group">
							<?php while ( have_rows('items_subblock_main_page') ) { the_row(); ?>
                            <li><?php echo get_sub_field('name_items_subblock_main_page'); ?></li>
                            <?php } ?>
                        </ul>
						<?php } ?>
                    </div>
					<?php } ?>
                </div>
				<?php } ?>
				
                <?php if( have_rows('room_equipment_d_single_rooms_page')){ ?>
                <div class="list-column">
					<?php while ( have_rows('room_equipment_d_single_rooms_page') ) { the_row(); ?>
                    <div>
                        <div class="list-img">
                            <img src="<?php echo get_sub_field('image_subblock_main_page'); ?>"/>
                        </div>
                        <strong><?php echo get_sub_field('title_subblock_main_page'); ?></strong>
						
						<?php if( have_rows('items_subblock_main_page')){ ?>
                        <ul class="list-group">
							<?php while ( have_rows('items_subblock_main_page') ) { the_row(); ?>
                            <li><?php echo get_sub_field('name_items_subblock_main_page'); ?></li>
                            <?php } ?>
                        </ul>
						<?php } ?>
                    </div>
					<?php } ?>
                </div>
				<?php } ?>
            </div>
			<?php } ?>
        </div>

		<?php $relateds = get_field_object('room_related_single_rooms_page'); ?>
		<?php if($relateds['value']) { ?>
        <div class="related-block">
            <h3>Смотрите также</h3>
            <div class="related-grid">
				<?php foreach ($relateds['value'] as $related) { ?>
				<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($related->ID), 'full'); ?>
				
                <div class="item-carousel">
                    <div class="image-carousel" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/room-1.jpg'; ?>')"></div>
                    <div class="text-carousel">
                        <h3><?php echo $related->post_title; ?></h3>
                        <p><?php echo get_field('room_rate_single_rooms_page', $related->ID); ?></p>
                        <a href="<?php echo get_permalink($related->ID) ?>" class="btn">Подробнее</a>
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
		<?php } ?>
    </div>

<?php get_footer(); ?>