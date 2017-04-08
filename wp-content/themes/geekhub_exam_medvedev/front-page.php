<?php
/**
 * Created by PhpStorm.
 * User: ascold
 * Date: 4/8/17
 * Time: 9:42 AM
 */
get_header(); ?>
    <div class="front-page">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section class="section-why-us">
                    <div class="container-inner">
                        <div>
                            <img src="/images/notebook.png"
                        </div>
                        <div>
                            <h1>
                                <?php echo get_post_meta($post->ID, 'section1-h1', true); ?>
                            </h1>
                            <h2>
                                <?php echo get_post_meta($post->ID, 'section1-h2', true); ?>
                            </h2>
                            <div>
                                <p>
                                    <?php echo get_post_meta($post->ID, 'section1-h3', true); ?>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <?php echo get_post_meta($post->ID, 'section1-textarea', true); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-welcome-here">
                    <div class="container-inner">
                        <h2>
                            <?php echo get_post_meta($post->ID, 'section2-h1', true); ?>
                        </h2>
                        <div>
                            <p>
                                <?php echo get_post_meta($post->ID, 'section2-textarea', true); ?>
                            </p>
                        </div>
                    </div>
                </section>
                <section class="section-we-are-offering">
                    <div class="container-inner">
                        <h2>
                            <?php echo get_post_meta($post->ID, 'section3-h1', true); ?>
                        </h2>
                        <div>
                            <p>
                                <?php echo get_post_meta($post->ID, 'section3-textarea', true); ?>
                            </p>
                        </div>
                        <div class="offer-wrapper">

                            <?php $args = array(
                                'post_type' => 'offering_post',
                                'order' => 'ASC'
                            );
                            $offering = new WP_Query($args);
                            if ($offering->have_posts()) :
                                while ($offering->have_posts()) : $offering->the_post(); ?>
                                    <div class="offer-inner">
                                    <?php the_post_thumbnail();
                                    the_title('<h2>', '</h2>');
                                    the_content(); ?>
                                    </div>
                                <?php endwhile;
                            else :
                                echo '<p>No offers</p>';
                            endif;
                            unset($args);
                            wp_reset_query();
                            ?>

                        </div>
                    </div>
                </section>
                <section class="section-latest-work">
                    <div class="container-inner">
                        <h2>
                            <?php echo get_post_meta($post->ID, 'section4-h1', true); ?>
                        </h2>
                        <div>
                            <p>
                                <?php echo get_post_meta($post->ID, 'section4-textarea', true); ?>
                            </p>
                        </div>
                        <div id="tabs" class="tab-wrapper">
                            <ul class="tab-title">
                                <li id="tab-head-1" class="active">
                                    <p>
                                        <?php echo get_post_meta($post->ID, 'Tab-1', true); ?>
                                    </p>
                                </li>
                                <li id="tab-head-2">
                                    <p>
                                        <?php echo get_post_meta($post->ID, 'Tab-2', true); ?>
                                    </p>
                                </li>
                                <li id="tab-head-3">
                                    <p>
                                        <?php echo get_post_meta($post->ID, 'Tab-3', true); ?>
                                    </p>
                                </li>
                                <li id="tab-head-4">
                                    <p>
                                        <?php echo get_post_meta($post->ID, 'Tab-4', true); ?>
                                    </p>
                                </li>
                                <li id="tab-head-5">
                                    <p>
                                        <?php echo get_post_meta($post->ID, 'Tab-5', true); ?>
                                    </p>
                                </li>
                            </ul>
                            <ul class="tab-items">
                                <li id="tab-item-1" class="block-all active">
                                    <?php $args = array(
                                        'post_type' => 'latest_works_post',
                                        'order' => 'ASC',
                                        'numberposts' => '6'
                                    );
                                    $cat_posts = new WP_Query($args);
                                    if ($cat_posts->have_posts()) :
                                        while ($cat_posts->have_posts()) : $cat_posts->the_post();
                                            the_post_thumbnail();
                                        endwhile;
                                    else :
                                        echo '<p>No content</p>';
                                    endif;
                                    unset($args);
                                    unset($cat_posts);
                                    wp_reset_query(); ?>
                                </li>
                                <li id="tab-item-2" class="block-design">
                                    <?php $args = array(
                                        'post_type' => 'latest_works_post',
                                        'order' => 'ASC',
                                        'category_name' => 'design',
                                        'numberposts' => '6'
                                    );
                                    $cat_posts = new WP_Query($args);
                                    if ($cat_posts->have_posts()) :
                                        while ($cat_posts->have_posts()) : $cat_posts->the_post();
                                            the_post_thumbnail();
                                        endwhile;
                                    else :
                                        echo '<p>No content</p>';
                                    endif;
                                    unset($args);
                                    unset($cat_posts);
                                    wp_reset_query(); ?>

                                </li>
                                <li id="tab-item-3" class="block-development">
                                    <?php $args = array(
                                        'post_type' => 'latest_works_post',
                                        'order' => 'ASC',
                                        'category_name' => 'development',
                                        'numberposts' => '6'
                                    );
                                    $cat_posts = new WP_Query($args);
                                    if ($cat_posts->have_posts()) :
                                        while ($cat_posts->have_posts()) : $cat_posts->the_post();
                                            the_post_thumbnail();
                                        endwhile;
                                    else :
                                        echo '<p>No content</p>';
                                    endif;
                                    unset($args);
                                    unset($cat_posts);
                                    wp_reset_query(); ?>

                                </li>
                                <li id="tab-item-4" class="block-seo">
                                    <?php $args = array(
                                        'post_type' => 'latest_works_post',
                                        'order' => 'ASC',
                                        'category_name' => 'seo',
                                        'numberposts' => '6'
                                    );
                                    $cat_posts = new WP_Query($args);
                                    if ($cat_posts->have_posts()) :
                                        while ($cat_posts->have_posts()) : $cat_posts->the_post();
                                            the_post_thumbnail();
                                        endwhile;
                                    else :
                                        echo '<p>No content</p>';
                                    endif;
                                    unset($args);
                                    unset($cat_posts);
                                    wp_reset_query(); ?>

                                </li>
                                <li id="tab-item-5" class="block-others">
                                    <?php $args = array(
                                        'post_type' => 'latest_works_post',
                                        'order' => 'ASC',
                                        'category_name' => 'others',
                                        'numberposts' => '6'
                                    );
                                    $cat_posts = new WP_Query($args);
                                    if ($cat_posts->have_posts()) :
                                        while ($cat_posts->have_posts()) : $cat_posts->the_post();
                                            the_post_thumbnail();
                                        endwhile;
                                    else :
                                        echo '<p>No content</p>';
                                    endif;
                                    unset($args);
                                    unset($cat_posts);
                                    wp_reset_query(); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
<?php
get_footer();
