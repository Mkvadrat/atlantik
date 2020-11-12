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

    <div class="content">
        <img src="/wp-content/themes/atlantik/images/logo.svg" class="big-logo"/>
        <h1>Извините, страница не существует!</h1>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn">на главную</a>
        <img src="/wp-content/themes/atlantik/images/404.svg"/>
    </div>
            
<?php get_footer(); ?>