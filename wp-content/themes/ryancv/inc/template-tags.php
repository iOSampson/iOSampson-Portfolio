<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ryancv
 */

if ( ! function_exists( 'ryancv_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ryancv_posted_on() {
		echo '<div class="date">';

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'ryancv' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		echo '</div>';
	}
endif;

if ( ! function_exists( 'ryancv_entry_header' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ryancv_entry_header() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'ryancv' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'ryancv' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			ryancv_posted_by();
		}
	}
endif;

if ( ! function_exists( 'ryancv_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ryancv_entry_footer() {
		// Show share buttons in blog post and portfolio
		if ( 'post' === get_post_type() || 'portfolio' === get_post_type() ) {
			$share_links = '';
			
			$social_share = get_field( 'social_share', 'options' );

			if ( $social_share ) {
				foreach ($social_share as $share) {
					$share_links .= '<a class="share-btn share-btn-'.$share['value'].'" title="'.esc_html__( 'Share on', 'ryancv' ).' '.$share['label'].'"><i class="ion ion-social-'.$share['value'].'"></i></a>';
				}
			}

			if ( $share_links ) {
				echo '<div class="social-share"><span>'.esc_html__( 'Share:', 'ryancv' ).'</span> ' . $share_links .'</div>';
				?>
				<script type="text/javascript">
					jQuery(document).ready(function ($) {
						$('.social-share').rrssb({
							title: '<?php the_title(); ?>',
							url: '<?php the_permalink(); ?>',
						});
					});
				</script>
				<?php
			}
		}

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( '', 'list item separator', 'ryancv' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'ryancv' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ryancv' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ryancv' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'ryancv_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ryancv_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'ryancv' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ryancv_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ryancv_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>
		
			<?php if ( has_post_thumbnail() ) : ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail( 'ryancv_590x330', array(
						'alt' => the_title_attribute( array(
							'echo' => false,
						)),
					));
				?>
				<span class="info">
					<span class="ion ion-document-text"></span>
				</span>
			</a>
			<?php endif; ?>

		<?php
		endif; // End is_singular().
	}
endif;
