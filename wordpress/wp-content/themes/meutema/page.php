<?php
get_header();
?>  
   
            <article class="article-front">
            


            <?php
                if (have_posts()) {

                    while (have_posts()) {
                        the_post();
                        $post_title = get_the_title();
                
                        
                        switch ($post_title) {
                            case 'Matches':
                                get_template_part('template-parts/content', 'matches');
                                break;
                                
                            case 'Likes':
                                get_template_part('template-parts/content', 'likes');
                                break;
                                
                            case 'Live':
                                get_template_part('template-parts/content', 'live');
                                break;
                
                            default:
                                the_content();
                                break;
                        }
                    }
                }
                
            ?>



            </article>
            
<?php
get_footer();
?>    

