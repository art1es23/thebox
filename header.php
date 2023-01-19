<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css"> -->

    <?php wp_head();?>
</head>

<body>
    <header class="header" id="header">
        <div class="container header-wrapper">
            <div class="logo">
                <a href="<?php bloginfo('url'); ?>" class="logo__icon">
                    <!-- <img src="<?php bloginfo('url'); ?>/assets/img/logo.png"> -->
                </a>

                <div class="logo__caption"> <span class="italic">The</span><span>Box</span></div>
            </div>

            <button class="menu-toggle">
                <!-- <span class="menu-toggle__item menu-toggle__item--top"></span> -->
                <span class="menu-toggle__item"></span>
                <!-- <span class="menu-toggle__item menu-toggle__item--bottom"></span> -->
            </button>

            <nav class="navigation">
                <?php wp_nav_menu( [
                    'theme_location'  => 'header_menu',
                    'container' => false,
                    // 'container'       => 'nav',
                    // 'container_class' => 'navigation',
                    'menu_class'      => 'navigation-wrapper navigation-wrapper--hidden',
                    'menu_id'         => 'navigation-id'
                ] );?>
            </nav>

        </div>
    </header>

    <script>
    const navigationWrapper = document.querySelector('.navigation');
    const menuTrigger = document.querySelector('.menu-toggle');
    const navigationInner = navigationWrapper.querySelector('.navigation-wrapper');

    menuTrigger.addEventListener('click', event => {

        navigationWrapper.classList.toggle('navigation--active');
        event.currentTarget.classList.toggle('menu-toggle--active');
        // navigationInner.classList.toggle('navigation-wrapper--hidden');

    })
    </script>