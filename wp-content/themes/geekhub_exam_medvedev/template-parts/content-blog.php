<?php
/**
 * Created by PhpStorm.
 * User: ascold
 * Date: 4/8/17
 * Time: 5:03 PM
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
<div class="entry-content">
    <a href="<?php the_permalink(); ?>" ?>
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        } ?>
    </a>
    <h3>
        <?php
        the_title();
        ?>
    </h3>
    <div class="time">
        <div>
            <?php
            the_time('M. j, Y');
            ?>
        </div>
    </div>
    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'theme-tsarenko'),
        'after' => '</div>',
    ));
    ?>
</div>
</article>