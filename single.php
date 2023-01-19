<?php get_header(); ?>
<div class="hero">
    <p>HERO SECTION SINGLE PAGE</p>
</div>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>

<?php get_template_part('post-templates/post', get_post_format()) ;?>

<?php }}?>

<!-- <article class="projects-list__item project">
    <a href="<?php the_permalink();?>" class="project__img img-wrapper">
        <img src="<?php echo get_field('project_image');?>" width="1920" height="1080" alt="Service Icon">
    </a>
    <div class="project__description project__description--wrapper">
        <h3 class="project__caption"><?php echo get_field('project_caption');?></h3>
        <p class="project__legend"><?php echo get_field('project_description');?></p>
    </div>
</article> -->

<?php get_footer(); ?>