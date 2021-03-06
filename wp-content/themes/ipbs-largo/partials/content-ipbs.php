<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hnews item' ); ?> itemscope itemtype="https://schema.org/Article">

	<?php do_action('largo_before_post_header'); ?>

	<header>

		<?php largo_maybe_top_term(); ?>

		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

		<?php
			if ( $subtitle = get_post_meta( $post->ID, 'subtitle', true ) ) {
				printf(
					'<h2 class="subtitle">%1$s</h2>',
					wp_kses_post( $subtitle )
				);
			}

			if ( is_single() ) {
				?>
					<h5 class="byline"><?php largo_byline( true, false, get_the_ID() ); ?></h5>
				<?php
			}

			if ( is_single() && ! of_get_option( 'single_social_icons' ) == false ) {
				largo_post_social_links();
			}
		?>

<?php largo_post_metadata( $post->ID ); ?>

	</header><!-- / entry header -->

	<?php
		do_action('largo_after_post_header');

		largo_hero(null,'span12');

		do_action('largo_after_hero');
	?>

	<section class="entry-content clearfix" itemprop="articleBody">
		
		<?php largo_entry_content( $post ); ?>
		
	</section>

	<?php do_action('largo_after_post_content'); ?>

</article>
