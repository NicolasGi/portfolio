<?php
/**
 * Template Name: Project
 */
?>
<?php get_header();
$loopProjects = pt_wp_query('projects', '1');

?>

<main>
    <section class="project">
        <?php if ($loopProjects->have_posts()) : ?>
            <?php while ($loopProjects->have_posts()) : $loopProjects->the_post(); ?>
                <div class="project__content container show-on-scroll">
                    <h2 aria-level="2" class="title">
                        <?php the_field('pt_name_project'); ?>
                    </h2>
                    <figure class="about__img">
                        <?php $img = get_field('pt_img_project');
                        if (!empty($img)): ?>
                            <img src="<?php echo esc_url($img['url']); ?>"
                                 alt="<?php echo esc_attr($img['alt']); ?>"/>
                        <?php endif; ?>
                    </figure>
                    <div class="txt">
                        <?php the_field('pt_description_project');?>
                    </div>
                    <a href="http://isn.nicolas-gilson.site/" class="btn btn-a">
                        Voir le site
                    </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>
