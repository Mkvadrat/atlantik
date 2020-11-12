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
    
    <div class="content service">
        <h1><?php echo $category->name; ?></h1>
        
        <?php echo get_term_meta(get_queried_object()->term_id, 'seodescr_block_wped_services_page', true); ?>

        <div class="seervice-grid">
            <?php	
                $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'category' 	     => $category->term_id,
                    'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                    'paged'          => $current_page
                ); 
                
                $posts = get_posts( $args );
                
                if($posts){
                    $i = 0;
                    foreach( $posts as $post ){
                        $i++; 
                        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
            ?>
            
            <div class="big-card rooms-card <?php if($i % 2) { echo'right-text'; }else{ echo 'left-text'; }?>">
                <div class="big-card-image" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/service-1.jpg'; ?>')"></div>
                <div class="big-card-text">
                    <h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h3>
                </div>
            </div>
            <?php   } 
                    wp_reset_postdata(); 
                }
            ?>

            <?php
                $defaults = array(
                    'type' => 'array',
                    'prev_next'    => True,
                    'prev_text'    => __('<img src="/wp-content/themes/atlantik/images/arrow-left.svg"/>'),
                    'next_text'    => __('<img src="/wp-content/themes/atlantik/images/arrow-right.svg"/>'),
                );
                                    
                $pagination = paginate_links($defaults);							
            ?>
            <?php if($pagination){ ?>
            <nav>
                <ul class="pagination justify-content-center align-items-center">
                    <?php foreach ($pagination as $pag){ ?>
                        <li><?php echo $pag; ?></li>
                    <?php } ?>
                </ul>
            </nav>
            <?php } ?>
        </div>
    </div>
   
<?php get_footer(); ?>