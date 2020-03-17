<?php get_header(); ?>

	<div class="content-area">

		<main class="site-main" >

			<?php while ( have_posts() ) : the_post(); ?>

				<article  <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>

					<div class="entry-content">
						<p class="about-info">
							Quotes on Dev is a project site for the RED Academy Web Developer Professional program. 
                            It’s used to experiment with Ajax, WP API, jQuery, and other cool things. 🙂
						</p>
						<p class="about-quotes">This site is heavily inspired by Chris Coyler's
							<a href="<?php echo esc_url( 'https://quotesondesign.com/' ); ?>">
                            <?php printf( esc_html('Quotes on Design') ); ?></a>
						</p>

					</div>
				</article>

			<?php endwhile; ?>

		</main>
        
	</div>

<?php get_footer(); ?>
