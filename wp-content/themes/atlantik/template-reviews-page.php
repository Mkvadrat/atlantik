<?php
/*
Template name: Reviews page
*/

get_header(); 
?>

   <div class="content testimonials">
      <h1><?php the_title(); ?></h1>
      <?php echo get_field('seo_descr_wped_reviews_page'); ?>

      <div class="testimonials-grid">
         <?php echo get_field('title_form_text_reviews_page'); ?>
         
         <?php                     
            define( 'DEFAULT_COMMENTS_PER_PAGE', $GLOBALS['wp_query']->query_vars['comments_per_page']);
        
            $page = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
        
            $limit = DEFAULT_COMMENTS_PER_PAGE;
        
            $offset = ($page * $limit) - $limit;
        
            $param = array(
               'status'	=> 'approve',
               'offset'	=> $offset,
               'number'	=> $limit
            );
        
            $total_comments = get_comments(array(
               'orderby' => 'comment_date',
               'order'   => 'ASC',
               'status'  => 'approve',
               'parent'  => 0
            ));
            
            $comments = get_comments( $param );
      
            if($comments){
            foreach($comments as $comment){
               $author = $comment->comment_author;
               $descr = strip_tags( $comment->comment_content );
               $city = get_comment_meta($comment->comment_ID, 'city', true);
               
               global $cnum;
       
               // определяем первый номер, если включено разделение на страницы
       
               $per_page = $limit;
       
               if( $per_page && !isset($cnum) ){
                   $com_page = $page;
                   if($com_page>1)
                       $cnum = ($com_page-1)*(int)$per_page;
               }
               // считаем
               $cnum = isset($cnum) ? $cnum+1 : 1;
          ?>    
         <div class="testimonials-item">
             <p><?php echo $comment->comment_content; ?></p>
             <div class="info-testimonial">
                 <span><strong><?php echo $comment->comment_author; ?> <?php if($city){ ?>, <?php echo $city; } ?></strong></span>
                 <span><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></span>
             </div>
         </div>
         <?php } ?>
         <?php } ?>
         
         <?php
            $pages = ceil(count($total_comments)/DEFAULT_COMMENTS_PER_PAGE);
        
            $args = array(
               'base'         => @add_query_arg('paged','%#%'),
               'format'       => '?paged=%#%',
               'total'        => absint($pages),
               'current'      => $page,
               'show_all'     => false,
               'mid_size'     => 4,
               'prev_next'    => false,
               'prev_text'    => __('&laquo; В начало'),
               'next_text'    => __('В конец &raquo;'),
               'type' => 'array'
            );
        
            $pagination = paginate_links($args);
         ?>
          
          <?php
          if($pagination){ ?>
            <div class="pagination-response">
               <ul>
                  <?php foreach ($pagination as $pag){ ?>
                     <li><?php echo $pag; ?></li>
                  <?php } ?>
               </ul>
            </div>
          <?php } ?>
      </div>

      <div class="contacts-form testimonial-form" id="testimonial-form">
         <div class="form-box">
            <form class="reviews-form" id="commentform">
               <h3>Ваш отзыв</h3>
               <div class="row row-cols-2">
                  <div>
                     <div class="input-group">
                        <input type="text" class="form-control" name="author" id="author" placeholder="Ваше имя" aria-label="Ваше имя">
                        <div class="input-group-text"><img src="/wp-content/themes/atlantik/images/form-name.svg"/></div>
                     </div>
                     <div class="input-group">
                        <input type="text" class="form-control" name="city" id="city" placeholder="Ваш город" aria-label="Ваш город">
                        <div class="input-group-text"><img src="/wp-content/themes/atlantik/images/form-phone.svg"/></div>
                     </div>
                     <div class="input-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Ваш email">
                        <div class="input-group-text"><img src="/wp-content/themes/atlantik/images/form-mail.svg"/></div>
                     </div>
                  </div>
                  <div>
                     <div class="input-group">
                        <textarea class="form-control" name="comment" id="comment" aria-label="Ваше сообщение" placeholder="Ваше сообщение"></textarea>
                        <div class="input-group-text"><img src="/wp-content/themes/atlantik/images/form-message.svg"/></div>
                        <?php echo comment_id_fields(); ?> 
                     </div>
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" onchange="document.getElementById('submit2').disabled = !this.checked;" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Я принимаю условия соглашения на обработку персональных данных</label>
                     </div>
                     <button type="submit" id="submit2" class="btn btn-primary disable">оставить отзыв</button>
                     <div class="respond"></div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   
   <script language="javascript">
      $( "#commentform button[type=\'submit\']" ).click(function() {
         $(".reviews-form").submit();
      });
   </script>
   
<?php get_footer(); ?>