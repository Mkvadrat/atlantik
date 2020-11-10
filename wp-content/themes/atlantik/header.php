<?php
/*
Theme Name: Atlantik
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no"/>
    <title><?php echo mkvadrat_wp_title('','|', true, 'right'); ?></title>
    
    <?php wp_head(); ?>
</head>
<body>
<div class="page">
    <header>
        <div class="header-top">
            <?php echo get_field('address_hotel_wped_header_main_page', '8'); ?>
        </div>
        <div class="header-body">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img
                    src="<?php header_image(); ?>"
                    height="<?php echo get_custom_header()->height; ?>"
                    width="<?php echo get_custom_header()->width; ?>"
                    alt="logotype"
                />
            </a>
            <nav class="menu-top">
                <?php
                    if (has_nav_menu('header_menu')){
                        wp_nav_menu( array(
                            'theme_location'  => 'header_menu',
                            'menu'            => '',
                            'container'       => false,
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => '',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 1
                        ) );
                    }
                ?>
            </nav>
            <a href="#menu" class="btn-menu"><span></span></a>
            <?php echo get_field('link_booking_text_header_main_page', '8'); ?>
        </div>
    </header>

    <?php if(is_front_page()){ ?>
    <div class="banner main-banner" style="background-image: url('<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id('8'), 'full'); echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/banner.jpg">'; ?>')"></div>
    
    <div class="booking">
        <div class="title">
            <?php echo get_field('title_booking_text_header_main_page', '8'); ?>
        </div>
        <div class="booking-form">
            <?php echo get_field('booking_form_wped_header_main_page', '8'); ?>
        </div>
    </div>
    <?php }else{ ?>
    <div class="banner main-banner small-banner" style="background-image: url('<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id('8'), 'full'); echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/banner.jpg">'; ?>')"></div>

     <div class="booking">
        <div class="title">
            <?php echo get_field('title_booking_text_header_main_page', '8'); ?>
        </div>
        <div class="booking-form">
            <?php echo get_field('booking_form_wped_header_main_page', '8'); ?>
        </div>
    </div>
    <?php } ?>   