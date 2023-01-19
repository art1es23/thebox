<?php 
get_header();   
?>

<style>
<?php include locate_template('assets/css/post-templates/post-portfolio.css');
?>
</style>

<?php 
    $img_src = get_field('thumbnail_preview');
    $title = get_field('title');
    $description = get_field('description');
    $date = get_field('date_of_project');
    $client = get_field('client');
?>

<article class="container projects-list__item project container">
    <div class="project-img img-wrapper"><img src="<?php echo $img_src;?>" alt="<?php echo $img_src?>"></div>
    <div class="project-info">
        <h1 class="project__title"><?php echo $title;?></h1>
        <ul class="project-meta-description">
            <li><?php echo $date;?></li>
            <li class="project-skills">
                <?php the_terms(get_the_ID(), 'skills', '', '|', '')?>
            </li>
            <li><?php echo $client;?></li>
        </ul>
        <p class="project__description"><?php echo $description;?></p>
    </div>
</article>

<?php get_footer();?>