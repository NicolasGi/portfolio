<?php
/**
 * Template Name: Accueil
 */
?>
<?php
get_header();

$loopMe = pt_wp_query('about', '1');
$loopProjects = pt_wp_query('projects', '2');


?>
    <section id="about" class="about ">
        <?php if ($loopMe->have_posts()) : ?>
            <?php while ($loopMe->have_posts()) : $loopMe->the_post(); ?>
                <div class="about__content container  show-on-scroll">
                    <h2 aria-level="2" class="title">Nicolas Gilson</h2>
                    <div class="txt">
                        <?php the_field('pt_text_about_me'); ?>
                    </div>
                    <?php $img = get_field('pt_profile_img');
                    if (!empty($img)): ?>
                        <figure class="about__img">
                            <img src="<?php echo esc_url($img['url']); ?>"
                                 alt="<?php echo esc_attr($img['alt']); ?>"/>

                        </figure>
                    <?php endif; ?>
                    <!--<div class="about__img ">
                        <div class="fill cover-img"></div>
                        <div class="fill z-10 hover">
                            <div class="fill cover-img hover-img"></div>
                        </div>
                    </div>
-->

                    <a href="#project" class="btn btn-a">
                        Voir mes projects
                    </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section id="project" class="project ">
        <div class="project__container container show-on-scroll ">
            <h2 aria-level="2"
                class="project__title title">Mes projects</h2>
            <div class="projects-content">
                <?php if ($loopProjects->have_posts()) : ?>
                    <?php while ($loopProjects->have_posts()) : $loopProjects->the_post(); ?>
                        <div class="project-desc">
                            <a href="http://www.nicolas-gilson.site/project/">


                                <figure class="project-desc__img">

                                    <?php $img = get_field('pt_img_project');
                                    if (!empty($img)): ?>
                                        <img src="<?php echo esc_url($img['url']); ?>"
                                             alt="<?php echo esc_attr($img['alt']); ?>"/>
                                    <?php endif; ?>
                                </figure>
                                <h3 aria-level="3" class="project__subtitle">
                                    <?php the_field('pt_name_project'); ?>
                                </h3>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>