<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ryancv
 */

?>

<?php
	/* options */
	$portfolio_single = get_field( 'portfolio_single', 'options' );
	$portfolio_qv = get_field( 'portfolio_qv', 'option' );
	$popup_elementor = get_field( 'popup_elementor', 'options' );
	$portfolio_icons = get_field( 'portfolio_icons', 'options' );
	$id = get_the_ID();

	/*get categories*/
	$current_categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
	$categories_string = '';
	if ( $current_categories && ! is_wp_error( $current_categories ) ) {
		$arr_keys = array_keys( $current_categories );
		$last_key = end( $arr_keys );
		foreach ( $current_categories as $key => $value ) {
			if ( $key == $last_key ) {
				$categories_string .= $value->name . ' ';
			} else {
				$categories_string .= $value->name . ', ';
			}
		}
	}

	/*get portfolio type*/
	$type = get_field( 'portfolio_type', $id );
	$popup_url = get_the_post_thumbnail_url( $id, 'full' );
	if ($popup_elementor == 1) {
		$popup_class = 'has-popup-image';
	} else {
		$popup_class = 'has-popup-image';
	}
	if ($portfolio_icons == 1) {
		$preview_icon = 'ion-ios-plus-empty';
	} else {
		$preview_icon = 'fas fa-image';
	}
	$images = false;
	$popup_link_target = false;

	$info = get_field( 'info' );
	$btn_url = get_field( 'button_url' );

	if ( $type == 2 ) {
		$popup_url = get_field( 'music_url' );
		$popup_class = 'has-popup-music';
		if ($portfolio_icons == 1) {
			$preview_icon = 'ion-ios-play-outline';
		} else {
			$preview_icon = 'fas fa-music';
		}
	} elseif ( $type == 3 ) {
		$popup_url = get_field( 'video_url' );
		$popup_class = 'has-popup-video';
		if ($portfolio_icons == 1) {
			$preview_icon = 'ion-ios-videocam-outline';
		} else {
			$preview_icon = 'fas fa-video';
		}
	} elseif ( $type == 4 ) {
		$popup_url = '#popup-' . get_the_ID();
		$popup_class = 'has-popup-media';
		if ($portfolio_icons == 1) {
			$preview_icon = 'ion-ios-eye-outline';
		} else {
			$preview_icon = 'fas fa-plus';
		}
	} elseif ( $type == 5 ) {
		if ($popup_elementor == 1) {
			$popup_url = '#gallery-' . get_the_ID();
			$popup_class = 'has-popup-gallery';
		} else {
			$popup_url = '#gallery-' . get_the_ID();
			$popup_class = 'has-popup-gallery';
		}
		if ($portfolio_icons == 1) {
			$preview_icon = 'ion-ios-plus-empty';
		} else {
			$preview_icon = 'fas fa-images';
		}
		$images = get_field( 'gallery' );
	} elseif ( $type == 6 ) {
		$popup_url = get_field( 'link_url' );
		$popup_link_target = true;
		$popup_class = 'has-popup-link';
		if ($portfolio_icons == 1) {
			$preview_icon = 'ion-link';
		} else {
			$preview_icon = 'fas fa-link';
		}
	} else { }
?>

<!-- work item -->
<div class="col col-d-6 col-t-6 col-m-12 border-line-h grid-item">
	<div class="box-item">
		<div class="image">
			<?php if ( $portfolio_qv ) : ?>
			<?php if ( $portfolio_single ) : ?>
			<a>
				<?php if ( has_post_thumbnail() ) : 
					the_post_thumbnail( 'ryancv_600xauto' );
				endif; ?>
				<span class="info">
					<span class="ion"></span>
				</span>
			</a>
			<?php else : ?>
			<a href="<?php echo esc_url( get_the_permalink() ); ?>">
				<?php if ( has_post_thumbnail () ) : 
					the_post_thumbnail( 'ryancv_600xauto' );
				endif; ?>
				<span class="info">
					<span class="ion ion-ios-book-outline"></span>
				</span>
			</a>
			<?php endif; ?>
			<?php else : ?>
			<a href="<?php echo esc_url( $popup_url ); ?>" class="<?php echo esc_attr( $popup_class ); ?>"<?php if ( $popup_link_target ) : ?> target="_blank"<?php endif; ?>>
				<?php if ( has_post_thumbnail() ) : 
					the_post_thumbnail( 'ryancv_600xauto' );
				?>
				<span class="info">
					<span class="ion <?php echo esc_attr( $preview_icon ); ?>"></span>
				</span>
				<?php endif; ?>
			</a>
			<?php if( $images ) : ?>
				<div id="gallery-<?php echo esc_attr( get_the_ID() ); ?>" class="mfp-hide">
					<?php foreach( $images as $image ): ?>
					<?php $gallery_img_src = wp_get_attachment_image_src( $image['ID'], 'full' ); ?>
					<a href="<?php echo esc_url( $gallery_img_src[0] ); ?>"></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="desc">
			<?php if ( $portfolio_single ) : ?>
				<?php if ( $portfolio_qv ) : ?>
					<a class="name"><?php the_title(); ?></a>
				<?php else : ?>
					<a href="<?php echo esc_url( $popup_url ); ?>" class="name <?php echo esc_attr( $popup_class ); ?>"><?php the_title(); ?></a>
				<?php endif; ?>	
			<?php else : ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="name"><?php the_title(); ?></a>
			<?php endif; ?>
			
			<?php if ( $categories_string ) : ?>
			<div class="category"><?php echo esc_html( $categories_string ); ?></div>
			<?php endif; ?>
		</div>

		<?php if ( $type == 4 ) : ?>
		<div id="popup-<?php echo the_ID(); ?>" class="popup-box mfp-fade mfp-hide">
			<div class="content">
				<div class="content">
					<div class="preloader-popup">
						<div class="centrize full-width">
							<div class="vertical-center">
								<div class="spinner default-circle"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>