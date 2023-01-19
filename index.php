<?php 

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package qmpwwsdFirstTheme
 */
/* Template Name: Front page */

get_header();?>

<main class="main" id="main">
    <div class="slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide card"></div>
            <div class="swiper-slide card"></div>
            <div class="swiper-slide card"></div>
            <div class="swiper-slide card"></div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="slider-button-prev"> </div>
        <div class="slider-button-next"> </div>
        <div class="slider-scrollbar"></div>
    </div>
    <?php get_sidebar()?>

    <section class="reputation">
        <div class="container">
            <h2 class="reputation__title title">Our Reputation </h2>
            <div class="reputation-list">

                <?php 
                    $reputation_posts = get_field('reputation_posts');

                    if ($reputation_posts) : ?>
                <?php foreach($reputation_posts as $post) : setup_postdata($post);?>

                <div class="reputation-list__item">
                    <div class="reputation-list__icon">
                        <img src="<?php echo get_field('list__icon');?>" width="10%" alt="Icon Reputation">
                    </div>
                    <h3 class="reputation-list__caption"><?php echo get_field('list_caption');?></h3>
                    <p class="reputation-list__description"><?php echo get_field('list_description');?></p>
                </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <section class="about-us">
        <div class="container about-us-wrapper">
            <!-- <div class="about-us-wrapper"> -->
            <div class="about-us__item about-us-img">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/about-us-1.webp" alt="">
            </div>
            <div class="about-us__item about-us-quote">
                <h2 class="about-us__title title">About Us</h2>
                <p class="about-us__description">For more than 30 years we have been delivering world-class
                    construction and we’ve built many lasting relationships along the way.</p>
                <p class="about-us__description"> We’ve matured into an industry leader and trusted resource for
                    those seeking quality, innovation and reliability when building in the U.S.</p>
                <button class="about-us__btn btn btn-wrapper">More on Our History</button>
            </div>
            <!-- </div> -->
        </div>
    </section>
    <section class="services">
        <div class="container">
            <h2 class="services__title title">Services</h2>
            <div class="services-list">
                <div class="services-list__item service">
                    <div class="service__icon"> <img
                            src="<?php echo get_template_directory_uri();?>/assets/img/services_construction.png"
                            width="100%" alt="Service Icon"></div>
                    <div class="service__caption">Service </div>
                </div>
                <div class="services-list__item service">
                    <div class="service__icon"> <img
                            src="<?php echo get_template_directory_uri();?>/assets/img/services_renovation.png"
                            width="100%" alt="Service Icon"></div>
                    <div class="service__caption">Service </div>
                </div>
                <div class="services-list__item service">
                    <div class="service__icon"> <img
                            src="<?php echo get_template_directory_uri();?>/assets/img/services_consultation.png"
                            width="100%" alt="Service Icon"></div>
                    <div class="service__caption">Service </div>
                </div>
                <div class="services-list__item service">
                    <div class="service__icon"> <img
                            src="<?php echo get_template_directory_uri();?>/assets/img/services_repair.png" width="100%"
                            alt="Service Icon"></div>
                    <div class="service__caption">Service </div>
                </div>
                <div class="services-list__item service">
                    <div class="service__icon"> <img
                            src="<?php echo get_template_directory_uri();?>/assets/img/services_architecture.png"
                            width="100%" alt="Service Icon"></div>
                    <div class="service__caption">Service </div>
                </div>
                <div class="services-list__item service">
                    <div class="service__icon"> <img
                            src="<?php echo get_template_directory_uri();?>/assets/img/services_electric.png"
                            width="100%" alt="Service Icon"></div>
                    <div class="service__caption">Service </div>
                </div>
            </div>
        </div>
    </section>
    <section class="stats">
        <div class="container stats-wrapper">
            <div class="stats-list">

                <?php 
                    // Check rows existexists.
                    if( have_rows('stats_list') ){

                        // Loop through rows.
                        while( have_rows('stats_list') ) { 
                            the_row();
                            // Load sub field value.
                            $sub_value = get_sub_field('stats_list_group');
                            // Do something...
                            ?>

                <div class="stats-list__item stat">
                    <span class="stat__number"><?php echo $sub_value['stat'];?></span>
                    <span class="stat__legend"><?php echo $sub_value['legend'];?></span>
                </div>

                <?php }} else {

                    } ?>
            </div>
            <div class="experience">
                <h2 class="experience__title title">30 Years Experience</h2>
                <p class="experience__description"> Our company has been the leading provided construction services to
                    clients throughout the USA since 1988. Our company has been the leading provided construction
                    services to
                    clients throughout the USA since 1988. </p>
                <p class="experience__description">Our company has been the leading provided construction services to
                    clients throughout the USA since 1988.</p>
                <button class="experience__btn btn">Contact Us</button>
            </div>
        </div>
    </section>

    <section class="consultation">
        <div class="container consultation-wrapper">
            <div class="consultation-description">
                <p class="consultation-description__caption">Free consultation with exceptional quality</p>
                <p class="consultation-description__legend">Just one call away: <a class="phone-number"
                        href="tel:+84 1102 2703">+84 1102 2703</a> </p>
            </div>
            <button class="consultation__btn btn">Get your consultation</button>
        </div>
    </section>

    <section class="projects">
        <div class="container projects-wrapper">
            <!-- <div class="projects-wrapper"> -->
            <h2 class="projects__title title">Projects </h2>
            <div class="project-sticky">
                <ul class="projects-nav">
                    <div class="hide-tabs-button svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                            width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

                            <g style="stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path
                                    d="M 90 45 C 90 20.187 69.813 0 45 0 C 20.187 0 0 20.187 0 45 c 0 24.813 20.187 45 45 45 C 69.813 90 90 69.813 90 45 z M 10 45 c 0 -19.299 15.701 -35 35 -35 s 35 15.701 35 35 S 64.299 80 45 80 S 10 64.299 10 45 z"
                                    style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path
                                    d="M 49.926 62.777 V 27.222 c 0 -2.761 -2.238 -5 -5 -5 s -5 2.239 -5 5 v 35.555 c 0 2.762 2.239 5 5 5 S 49.926 65.539 49.926 62.777 z"
                                    style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path
                                    d="M 63.896 48.882 c 0 -1.279 -0.488 -2.559 -1.464 -3.536 c -1.953 -1.953 -5.119 -1.953 -7.071 0 L 45 55.706 l -10.361 -10.36 c -1.953 -1.953 -5.119 -1.953 -7.071 0 c -1.952 1.953 -1.952 5.119 0 7.072 l 13.896 13.896 c 1.953 1.952 5.119 1.952 7.071 0 l 13.896 -13.896 C 63.408 51.441 63.896 50.161 63.896 48.882 z"
                                    style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>
                    <li class="projects-nav__item projects-nav__item--active">All Projects</li>
                    <li class="projects-nav__item projects-nav__item--disabled">Project1</li>
                    <li class="projects-nav__item projects-nav__item--disabled">Project2</li>
                    <li class="projects-nav__item projects-nav__item--disabled">Project3 </li>
                </ul>
            </div>
            <div class="projects-list">
                <div class="projects-list-wrapper">

                    <?php 
                    $project_posts = get_field('project_posts');

                    if ($project_posts) { ?>
                    <?php foreach($project_posts as $post) { setup_postdata($post);?>

                    <article class="projects-list__item project">
                        <a href="<?php the_permalink();?>" class="project__img img-wrapper">
                            <img src="<?php echo get_field('project_image');?>" width="1920" height="1080"
                                alt="Service Icon">
                        </a>
                        <div class="project__description project__description--wrapper">
                            <h3 class="project__caption"><?php echo get_field('project_caption');?></h3>
                            <p class="project__legend"><?php echo get_field('project_description');?></p>
                            <div class="project__categories"><?php the_category($separator = ', ');?></div>
                        </div>
                    </article>

                    <?php }; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php }; ?>

                </div>
                <div class="projects-list__arrows arrows">
                    <div class="arrows__item arrow-left"><span>left</span></div>
                    <div class="arrows__item arrow-right"><span>right</span></div>
                </div>
                <ul class="projects-list__toggles toggles">
                    <li class="toggles__item toggles__item--active"> </li>
                    <li class="toggles__item"> </li>
                    <li class="toggles__item"> </li>
                    <li class="toggles__item"> </li>
                </ul>
            </div>

            <!-- </div> -->
        </div>
    </section>
    <section class="contact-us">
        <div class="container contact-us-wrapper">
            <form class="contact-us-form" action="">
                <h2 class="contact-us-form__title title">What can us do for you?</h2>
                <p class="contact-us-form__legend">We are ready to work on a project of any complexity, whether it’s
                    commercial or residential.</p>
                <div class="input-fields-wrapper">
                    <input class="input" type="text" placeholder="Name *">
                    <input class="input" type="email" placeholder="Email *">
                    <input class="input" type="text" placeholder="Reason for Contacting *">
                    <input class="input" type="text" placeholder="Phone">
                </div>
                <textarea placeholder="Message" id="contact-us__textarea" rows="4"></textarea><span
                    class="indicate-fields">* indicates a required field</span>
                <input class="btn contact-us-form__btn" type="submit" value="Submit">
            </form>
        </div>
    </section>
</main>

<?php get_footer();?>