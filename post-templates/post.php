<article class="projects-list__item project container">
    <a href="<?php the_permalink();?>" class="project__img img-wrapper">
        <img src="<?php echo get_field('project_image');?>" width="1920" height="1080" alt="Service Icon">
    </a>
    <div class="project__description project__description--wrapper">
        <h3 class="project__caption"><?php echo get_field('project_caption');?> - default</h3>
        <p class="project__legend"><?php echo get_field('project_description');?></p>
    </div>
</article>