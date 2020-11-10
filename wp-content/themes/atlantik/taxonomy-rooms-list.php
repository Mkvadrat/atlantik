<?php
/*
Theme Name: Atlantik
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>
    <?php $category = get_queried_object(); ?>
    
    <div class="content">
        <h1><?php echo $category->name; ?></h1>
        
        <?php echo get_term_meta(get_queried_object()->term_id, 'seodescr_rooms_block_wped_rooms_page', true); ?>

        <?php
			$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'rooms-list',
						'field' => 'id',
						'terms' => array( get_queried_object()->term_id )
					)
				),
					'post_type' => 'rooms',
					'numberposts' => -1,
					'post_status' => 'publish',
					'orderby'     => 'date',
					'order'       => 'DESC',
			);

			$rooms_list = get_posts( $args );
			
			if($rooms_list){
		?>
        <?php $i = 0; ?>
        <?php foreach($rooms_list as $rooms){ ?>
        <?php $i++; ?>
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($rooms->ID), 'full'); ?>
        <div class="big-card <?php if($i % 2) { echo'right-text'; }else{ echo 'left-text'; }?>">
            <div class="big-card-image" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/room-1.jpg'; ?>')"></div>
            <div class="big-card-text">
                <h3><?php echo $rooms->post_title; ?></h3>
                <p><?php echo get_field('room_rate_single_rooms_page', $rooms->ID); ?></p>
                <a href="<?php echo get_permalink($rooms->ID) ?>" class="btn">Подробнее</a>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
	
<?php get_footer(); ?>