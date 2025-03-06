
<!DOCTYPE html>
<html lang="en"> 
<head>
    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<?php
    wp_head();
    ?>
    <body class='back-cor'>
    
    <header class="header text-center">	    
	    <?php session_start()?>
    <header class="bg-white">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">Your Company</span>
        <i class="fas fa-chart-bar"></i>

      </a>
    </div>
    <div class="flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-1">
    <div class="relative">
    <button type="button" id="toggleBtn" class="flex items-center gap-x-1 text-sm/6 font-semibold text-gray-900">
        Stats
        <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
    </button>

    <div id="menu-tab" style="display:none;" class="absolute top-full -left-8 z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white ring-1 shadow-lg ring-gray-900/5 mtb">
        <div class="p-4">
            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                    <i class="fas fa-futbol"></i>
                </div>
                <div class="flex-auto">
                    <a href="/?page_id=72" class="block font-semibold text-gray-900">
                        Golos
                        <span class="absolute inset-0"></span>
                    </a>
                    <p class="mt-1 text-gray-600">Probabilidade por Jogador de Golo</p>
                </div>
            </div>
            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
              <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <i class="fas fa-person-running"></i>

              </div>
              <div class="flex-auto">
                <a href="/?page_id=74" class="block font-semibold text-gray-900">
                  Assistencias
                  <span class="absolute inset-0"></span>
                </a>
                <p class="mt-1 text-gray-600">Probabilidade por Jogador de Assistencia</p>
              </div>
            </div>
            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
              <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <i class="fas fa-square fa-2x" style="color: yellow;"></i>

              </div>
              <div class="flex-auto">
                <a href="/?page_id=78" class="block font-semibold text-gray-900">
                  Cartoes
                  <span class="absolute inset-0"></span>
                </a>
                <p class="mt-1 text-gray-600">Probabilidade por Jogador de levar cartao</p>
              </div>
            </div>
            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
              <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <i class="fas fa-stopwatch"></i>

              </div>
              <div class="flex-auto">
                <a href="/?page_id=80" class="block font-semibold text-gray-900">
                  Minutos
                  <span class="absolute inset-0"></span>
                </a>
                <p class="mt-1 text-gray-600">Minutos por Jogador</p>
              </div>
            </div>
            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
              <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <i class="fas fa-trophy"></i>

              </div>
              <div class="flex-auto">
                <a href="/?page_id=76" class="block font-semibold text-gray-900">
                  Rank
                  <span class="absolute inset-0"></span>
                </a>
                <p class="mt-1 text-gray-600">Rank de cada Jogador</p>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
            <a href="/?p=42" class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
            <i class="fas fa-user"></i>

              Nomes dos jogadores
            </a>
            <a href="/?page_id=36" class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
            
            <i class="fas fa-heart"></i>
              Likes
            </a>
          </div>
        </div>
      </div>

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
      
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
    <?php
        $redirect_url = $_SERVER['HTTP_REFERER'];
    
    if ( is_user_logged_in() ) {
    ?>
        <a href="/wp-login.php?action=logout&redirect_to=/" class="text-sm/6 font-semibold text-gray-900 blg">Logout<span aria-hidden="true">&rarr;</span></a>
    <?php
    }
    else{
    ?>
      <a href="/wp-login.php?redirect_to=/" class="text-sm/6 font-semibold text-gray-900 blg">Log in <span aria-hidden="true">&rarr;</span></a>
    <?php
    }
    ?>
    </div>
  </nav>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div class="lg:hidden" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-10"></div>
    <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
        </a>
        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Close menu</span>
          <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          
          <div class="py-6">
            <a href="/wp-login.php" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div id="navigation" class="barra-navegacao">
        <div class="menu-container">
            <a class="site-title" href="/">
                <?php echo get_bloginfo('name'); ?>
            </a>
        </div>

       
        
        </div>
        <div class="barr-pesquisa">
              <form class="form-pesq">
                <input id="pesq" name="jogador" placeholder="Pesquisa">
                <input id="pesq" type="hidden" name="name" value="ola">
                <button type="submit" id="pesq-btn"><i class="fas fa-search"></i>
                </button>
              </form>
            </div>
    </nav>




    </header>
    <div class="main-wrapper">
            <header class="page-title theme-bg-light text-center gradient py-5">
                <h1 class="heading"><?php the_title(); ?></h1>
            </header>
            