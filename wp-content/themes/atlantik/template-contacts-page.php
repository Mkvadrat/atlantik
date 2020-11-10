<?php
/*
Template name: Contacts page
*/

get_header(); 
?>

   <div class="content contacts">
      <h1><?php the_title(); ?></h1>
      
      <div class="contacts-block row">
         <?php if( have_rows('contacts_rptr_block_contacts_page')){ ?>
         <div class="contacts-info col-7">
            <?php while ( have_rows('contacts_rptr_block_contacts_page') ) { the_row(); ?>
            <div class="contact-item">
               <div class="contact-image">
                  <img src="<?php echo get_sub_field('image_subblock_contacts_page'); ?>"/>
               </div>
               <div class="contact-text">
                  <?php echo get_sub_field('text_subblock_contacts_page'); ?>
               </div>
            </div>
            <?php } ?>
         </div>
         <?php } ?>
         <?php
            $forms_a = get_field('contacts_form_relation_block_contacts_page');
               if($forms_a){
         ?>
         <div class="contacts-form col-5">
            <div class="form-box">
               <div>
                  <?php
                     echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                  ?>
               </div>
            </div>
         </div>
         <?php } ?>
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
                   center: [<?php echo get_field('coordinates_text_block_contacts_page'); ?>],
                   zoom: 17
               });
               var SearchControl = new ymaps.control.SearchControl({noPlacemark: true});
               moskowMap.controls
                   //.add('zoomControl')
                   .add('typeSelector')
               moskowcoords = [<?php echo get_field('coordinates_text_block_contacts_page'); ?>];
               moskowPlacemark = new ymaps.Placemark([<?php echo get_field('coordinates_text_block_contacts_page'); ?>], {}, {
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
   </div>
   
<?php get_footer(); ?>