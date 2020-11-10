<?php
/*
Template name: Main page
*/

get_header(); 
?>

    <div class="content">
        <h1><?php echo get_field('title_rooms_block_text_main_page'); ?></h1>
        
        <?php echo get_field('seodescr_rooms_block_wped_main_page'); ?>
        
        <?php
            $args = array(
                    'post_type' => 'rooms',
                    'numberposts' => -1,
                    'post_status' => 'publish',
                    'orderby'     => 'date',
                    'order'       => 'ASC',
            );

            $lists = get_posts( $args );
        ?>
        
        <?php if($lists){ ?>
        <div class="carousel-rooms">
            <div class="owl-carousel">
                <?php foreach($lists as $list){ ?>
                <div class="item-carousel">
                    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($list->ID), 'full'); ?>
                    <div class="image-carousel" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/room-1.jpg'; ?>')"></div>
                    <div class="text-carousel">
                        <h3><?php echo $list->post_title; ?></h3>
                        <p><?php echo get_field('room_rate_single_rooms_page', $list->ID); ?></p>
                        <a href="<?php echo get_permalink($list->ID) ?>" class="btn">Подробнее</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        
        <?php $seopages = get_field_object('seopage_block_relation_main_page'); ?>
        
        <?php if($seopages){ ?>
        <?php $i = 0; ?>
        <?php foreach ($seopages['value'] as $seopage) { ?>
        <?php $i++; ?>
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($seopage->ID), 'full'); ?>
        <?php $text =  get_field('description_wped_standart_page', $seopage->ID); ?>
        <div class="big-card <?php echo ($i == 2) ? 'right-text' : 'left-text'; ?>">
            <div class="big-card-image" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url(get_template_directory_uri()) . '/images/SvNikolay.jpg'; ?>')"></div>
            <div class="big-card-text">
                <h3><?php echo $seopage->post_title; ?></h3>
                <?php echo kama_excerpt([ 'text' => $text, 'maxchar' => 150 ]);?>
                <a href="<?php echo get_permalink($seopage->ID); ?>" class="btn">Подробнее</a>
            </div>
        </div>
        <?php } ?>
        <?php } ?>

        <div class="services">
            <?php echo get_field('descr_service_wped_block_main_page'); ?>
            <h3><?php echo get_field('title_service_text_block_main_page'); ?></h3>
            <div class="serv-box row row-cols-auto">
                <?php $sectionsCols = array_chunk(get_field('service_rptr_block_main_page'), ceil(count(get_field('service_rptr_block_main_page')) / 3)); ?>
                <?php if(!empty($sectionsCols[0])){?>
                <ul class="col-4">
                    <?php foreach($sectionsCols[0] as $sectionsCol){ ?>
                    <li><img src="<?php echo $sectionsCol['image_subblock_main_page']; ?>"/><?php echo $sectionsCol['title_subblock_main_page']; ?></li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php if(!empty($sectionsCols[1])){?>
                <ul class="col-4">
                    <?php foreach($sectionsCols[1] as $sectionsCol){ ?>
                    <li><img src="<?php echo $sectionsCol['image_subblock_main_page']; ?>"/><?php echo $sectionsCol['title_subblock_main_page']; ?></li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php if(!empty($sectionsCols[2])){?>
                <ul class="col-3 offset-1">
                    <?php foreach($sectionsCols[2] as $sectionsCol){ ?>
                    <li><img src="<?php echo $sectionsCol['image_subblock_main_page']; ?>"/><?php echo $sectionsCol['title_subblock_main_page']; ?></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>

        <?php $actions = get_field_object('action_block_relation_main_page'); ?>
        <?php if($actions){ ?>
        <?php foreach ($actions['value'] as $action) { ?>
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($action->ID), 'full'); ?>
        <?php $text =  get_field('description_wped_standart_page', $action->ID); ?>
        <div class="info-card just-border" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url(get_template_directory_uri()) . '/images/SvNikolay.jpg'; ?>')">
            <div class="card-content">
                <h3><?php echo $action->post_title; ?></h3>
                <?php echo kama_excerpt([ 'text' => $text, 'maxchar' => 150 ]);?>
                <a href="<?php echo get_permalink($action->ID); ?>" class="btn">Подробнее</a>
            </div>
        </div>
        <?php } ?>
        <?php } ?>

        <?php
            $args = array(
                'status' => 'approve',
                'number' => '10',
                'post_id' => '92',
            );
        
            $comments = get_comments( $args );
        
            if(!empty($comments)){
        ?>
        <div class="testimonials">
            <h3><?php echo get_field('title_reviews_text_block_main_page'); ?></h3>
            <?php echo get_field('descr_reviews_wped_block_main_page'); ?>
            <div class="owl-carousel">
                <?php foreach ($comments as $comment) { ?>
                <?php $city = get_comment_meta($comment->comment_ID, 'city', true); ?>
                <div class="item-carousel">
                    <div class="text-carousel">
                        <p><?php echo mb_substr( strip_tags( $comment->comment_content ), 0, 152 ); ?></p>
                        <div class="info-testimonial">
                            <span><strong><?php echo $comment->comment_author; ?> <?php if($city){ ?>, <?php echo $city; } ?></strong></span>
                            <span><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></span>
                        </div>
                    </div>
                </div>
               <?php } ?>
            </div>
            <a href="<?php echo get_permalink('92'); ?>" class="btn">Читать все отзывы</a>
        </div>
        <?php } ?>

        <div class="info-text">
            <h3><?php echo get_field('title_contats_text_block_main_page'); ?></h3>
            <?php echo get_field('descr_contacts_wped_block_main_page'); ?>
        </div>
    </div>

    <div class="map-block">
        <div class="map">
            
            <div id="moskow" class="maps-footer" style="border-radius: 30px;overflow: hidden;height: 350px;margin: 0 20px 0 -20px;"></div>
            
            <script type="text/javascript">
                var moskowMap, moskowPlacemark, moskowcoords;
                ymaps.ready(init);
            
                function init() {
                    moskowMap = new ymaps.Map('moskow', {
                        center: [<?php echo get_field('coordinates_text_block_main_page'); ?>],
                        zoom: 17
                    });
                    var SearchControl = new ymaps.control.SearchControl({noPlacemark: true});
                    moskowMap.controls
                        //.add('zoomControl')
                        .add('typeSelector')
                    moskowcoords = [<?php echo get_field('coordinates_text_block_main_page'); ?>];
                    moskowPlacemark = new ymaps.Placemark([<?php echo get_field('coordinates_text_block_main_page'); ?>], {}, {
                        preset: "twirl#redIcon",
                        draggable: false
                    });
                    moskowMap.behaviors.disable('scrollZoom');
                    moskowMap.behaviors.disable('multiTouch'); 
                    moskowMap.behaviors.disable('drag'); 
                    moskowMap.geoObjects.add(moskowPlacemark);
                }
            </script>
       
        </div>
        <div class="map-info">
            <div class="map-contact">
                <?php echo get_field('contacts_wped_block_main_page'); ?>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?> 