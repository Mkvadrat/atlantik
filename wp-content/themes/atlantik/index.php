<?php
/*
Theme Name: Atlantik
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header(); ?>
    
    <div class="content about">
        <h1><?php the_title(); ?></h1>
        <div class="container-xl">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
            
            <div class="socials">
                <?php echo html_entity_decode(get_option('my_option'), ENT_QUOTES, 'UTF-8'); ?>
            </div>
        </div>
    </div>
                   
<?php get_footer(); ?>    

