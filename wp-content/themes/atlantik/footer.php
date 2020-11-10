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

    <div class="insta-block">
       <?php
            if ( function_exists('dynamic_sidebar') )
                dynamic_sidebar('instagram-sidebar');
        ?>
        <a rel="nofollow" class="btn" href="№">Подписаться на Инстаграмм отеля</a>
    </div>
    
    <footer>
        <div class="footer-top">
            <?php
                if (has_nav_menu('footer_menu')){
                    wp_nav_menu( array(
                        'theme_location'  => 'footer_menu',
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
            <div class="footer-soc">
                <?php echo get_field('social_links_wped_header_main_page', '8'); ?>
            </div>
        </div>
        <div class="footer-bottom">
            <?php echo get_field('wrapper_wped_header_main_page', '8'); ?>
        </div>
    </footer>
</div>

<nav id="menu" class="menu-for-mob">
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

<?php wp_footer(); ?>

</body>
</html>