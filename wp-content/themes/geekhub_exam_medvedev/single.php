<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package GEEKHUB_EXAM_MEDVEDEV
 */

get_header(); ?>
<div class="single-page">
    <div class="container-inner">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="section-top">
                <div class="container-inner">
                    <?php
                    if (is_single()) :
                        the_title('<h2>', '</h2>');
                    endif;
                    ?>
                </div>
            </section>
            <section class="single-post">
                <?php
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'single');
                    the_post_navigation();
                endwhile; // End of the loop.
                ?>
                <?php
                previous_post_link('%link', 'previous', true);
                next_post_link('%link', 'next', true); ?>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar();?>
</div>
</div>

<?php
get_footer();
