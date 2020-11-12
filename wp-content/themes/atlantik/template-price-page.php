<?php
/*
Template name: Price page
*/

get_header(); 
?>

    <div class="content price-content">
        <h1><?php the_title(); ?></h1>
        
        <?php echo get_field('seodescr_block_wped_price_page'); ?>

        <div class="table-block">
            <?php $table = get_field( 'table_cost_price_page' ); ?>
            
            <?php if ( !empty( $table ) ) { ?>
            <table class="table table-striped">
                <?php if ( ! empty( $table['header'] ) ) { ?>
                <thead>
                <tr>
                    <?php foreach ( $table['header'] as $th ) { ?>
                    <th scope="col"><?php echo $th['c']; ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <?php } ?>
                
                <tbody>
                
                <?php foreach ( $table['body'] as $tr ) { ?>
                <tr>
                    <?php $i = 0; ?>
                    <?php foreach ( $tr as $td ) { ?>
                    <?php $i++; ?>
                    <?php if($i == 1) { ?>
                    <th scope="row"><?php echo $td['c']; ?></th>
                    <?php }else{ ?>
                    <td><?php echo $td['c']; ?></td>
                    <?php } ?>
                    <?php } ?>
                </tr>
                <?php } ?>
                               
                </tbody>
            </table>
            <?php } ?>
            
            <?php echo get_field('note_table_cost_wped_price_page'); ?>
        </div>

        <?php $relateds = get_field_object('room_related_price_page'); ?>
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