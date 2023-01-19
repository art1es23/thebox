<?php 
get_header();   
?>

<section class="projects">
    <div class="container">
        <h2 class="projects__title title">Projects </h2>
        <div class="projects-wrapper">
            <ul class="projects-nav">
                <li class="projects-nav__item projects-nav__item--active">All Projects</li>
                <li class="projects-nav__item">Project1</li>
                <li class="projects-nav__item">Project2</li>
                <li class="projects-nav__item">Project3 </li>
            </ul>
            <div class="projects-list">
                <div class="projects-list-wrapper">

                    <?php 
                        global $query_string;
                        parse_str($query_string, $args);
                        $args['post_type'] = array('portfolio','skills');
                        query_posts( $args );

                        if (have_posts()) {
                            while (have_posts()) { 
                                the_post(); 
                    ?>

                    <article class="projects-list__item project container">
                        <a href="<?php the_permalink();?>" class="project__img img-wrapper">
                            <img src="<?php the_post_thumbnail_url();?>" width="1920" height="1080" alt="Service Icon">
                        </a>
                        <div class="project__description project__description--wrapper">
                            <h3 class="project__caption"><?php the_title();?></h3>
                            <p class="project__legend"><?php the_excerpt();?></p>
                        </div>
                    </article>

                    <?php } } else { ?>
                    <p>Not found posts.</p>
                    <?php } ?>

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
        </div>
    </div>
</section>

<?php get_footer();?>