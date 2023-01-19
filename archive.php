<?php get_header();?>
<div class="projects-list">
    <div class="projects-list-wrapper">
        <?php 
            global $post;
            $my_posts = get_posts( [
                'posts_per_page' => 2,
                'category_name' => 'projects',
                'post_type' => 'post'
            ] );

            foreach($my_posts  as $post) {
                setup_postdata($post);
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