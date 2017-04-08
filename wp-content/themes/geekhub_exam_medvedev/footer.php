<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GEEKHUB_EXAM_MEDVEDEV
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="featured-clients">
        <div class="container-inner">
            <h2>
                <?php echo get_theme_mod('slider-title', 'Featured Clients'); ?>
            </h2>
            <div class="slider">
                <?php $args = array(
                    'post_type' => 'slider_post',
                    'order' => 'ASC',
                );
                $slider = new WP_Query($args);
                if ($slider->have_posts()) : ?>
                <div class="owl-carousel owl-theme">
                    <?php $i = 0;
                    $published_posts = wp_count_posts('slider_post')->publish;
                    while ($i < $published_posts) :
                        $slider->the_post(); ?>
                        <div>
                            <?php the_post_thumbnail('slider-image'); ?>
                        </div>
                        <?php $i++;
                    endwhile;
                    else: ?>
                        <h3>No slide</h3>

                    <?php endif;
                    unset($args);
                    unset($slider);
                    wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="contacts">
        <div class="container-inner">
            <div class="contact-wrapper">
                <div class="contact-inner">
                    <h2>
                        <?php echo get_theme_mod('contact-title', 'default'); ?>
                    </h2>
                    <div>
                        <p>
                            <?php echo get_theme_mod('contact-desc', 'default'); ?>
                        </p>
                    </div>
                    <address>
                        <p>
                            <?php echo get_theme_mod('phone', 'default'); ?>
                        </p>
                        <p>
                            <?php echo get_theme_mod('address', 'default'); ?>
                        </p>
                    </address>
                    <div class="google-map">
                        <?php echo get_theme_mod('google_map', 'default'); ?>
                    </div>
                    <div class="contact-inner"></div>
                </div>
                <div class="contact-inner">
                    <?php echo do_shortcode('[mc4wp_form id="75"]'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-logo">
        <div class="container-inner">
            <?php echo get_header_image_tag(); ?>
        </div>
    </div>
    <div class="copyright">
        <div class="container-inner">
            <?php echo get_theme_mod('copyright', ''); ?>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
