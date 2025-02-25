<?php
get_header();
?>  
   
            <article class="article-front">
            


            <?php
                if(have_posts() ){

                    while(have_posts()){
                        the_post();
                        echo do_shortcode('[players]');
                    }
                }
            ?>



            </article>
            
<?php
get_footer();
?>    

