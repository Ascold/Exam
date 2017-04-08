<?php
/**
 * Created by PhpStorm.
 * User: ascold
 * Date: 4/8/17
 * Time: 4:19 PM
 */
?>
<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geekhub_exam_medvedev' ),
                'after'  => '</div>',
            ) );
		?>
</div><!-- .entry-content -->