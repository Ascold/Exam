<?php
/**
 * Created by PhpStorm.
 * User: ascold
 * Date: 4/8/17
 * Time: 4:54 PM
 */

    get_header(); ?>
    <div class="blog-page">
        <div class="container-inner">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <section class="section-top">
                        <div class="container-inner">
                            <h2 class="page-title">
                                <?php
                                echo get_the_title(30);
                                ?>
                            </h2>
                        </div>
                    </section>
                    <section class="single-post">
                        <?php
                        while (have_posts()) : the_post();

                            get_template_part('template-parts/content', 'blog');

                        endwhile;
                        ?>
                        <?php
                        previous_post_link('%link', 'previous', true);
                        next_post_link('%link', 'next', true); ?>
                    </section>
                </main><!-- #main -->
            </div><!-- #primary -->
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_footer();

