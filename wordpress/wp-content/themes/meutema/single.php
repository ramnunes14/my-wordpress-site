<?php
get_header();
?>  
   
            
            


            <?php
                if(have_posts() ){

                    while(have_posts()){
                        the_post();
                        echo do_shortcode('[players]');
                    }
                }
            ?>



            
            
<?php
get_footer();
?>    

