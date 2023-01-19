<?php get_header();?>

<div class="hero">
    <p>HERO SECTION SINGLE PAGE</p>
</div>

<div class="projects-list">
    <div class="projects-list-wrapper container">
        <?php 
            global $post;
            $args = get_posts( [
                'posts_per_page' => 3,
                'category_name' => 'projects',
                'post_type' => 'post',
                'orderby' => 'date'
            ] );

            foreach($args  as $post) {
                setup_postdata($post);
            ?>

        <article class="projects-list__item project">
            <a href="<?php the_permalink();?>" class="project__img img-wrapper">
                <img src="<?php echo get_field('project_image');?>" width="1920" height="1080" alt="Service Icon">
            </a>
            <div class="project__description project__description--wrapper">
                <h3 class="project__caption"><?php echo get_field('project_caption');?></h3>
                <p class="project__legend"><?php echo get_field('project_description');?></p>
                <div class="project__categories"><?php the_category($separator = ', ');?></div>
            </div>
        </article>

        <?php } ?>
    </div>

    <!-- <div class="projects-list-wrapper">

        <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post();     
            ?>
        <article class="projects-list__item project">
            <div class="project__img img-wrapper">
                <img src="<?php echo get_field('project_image');?>" width="100%" height="100%" alt="Service Icon">
            </div>
            <div class="project__description project__description--wrapper">
                <h3 class="project__caption"><?php echo get_field('project_caption');?></h3>
                <p class="project__legend"><?php echo get_field('project_description');?></p>
            </div>
        </article>

        <?php }}; ?>

    </div> -->

</div>

<?php get_footer();?>