
<!DOCTYPE html>
<html lang="en"> 
<head>
    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<?php
    wp_head();
    ?>
    <body>
    
    <header class="header text-center">	    
	    
        
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div id="navigation" class="barra-navegacao">
        <div class="menu-container">
            <a class="site-title" href="?#">
                <?php echo get_bloginfo('name'); ?>
            </a>
            <button class="menu-toggle" id="menu-toggle" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>

       
        <nav class="me" id="me">
            
            <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul class="navbar-nav">%3$s</ul>'
                    )
                );
            ?>
        </nav>
    </div>
</nav>




    </header>
    <div class="main-wrapper">
            <header class="page-title theme-bg-light text-center gradient py-5">
                <h1 class="heading"><?php the_title(); ?></h1>
            </header>