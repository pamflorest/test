<?php get_header(); ?>
	<div class="container">

		<div class="main-content">

			<!-- Si viene de term -->
			<h2><?php the_terms( $post->ID, 'dificultad' ); ?></h2>

			<!-- Si viene de categoria -->
			<h2><?php echo the_category(' '); ?></h2>

			<?php get_header();
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						// Your loop code
			?>
			<div class="post">

				<div class="left">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>

				<div class="right">
					<h2>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>

					<?php the_excerpt(); ?>

					<p><a href="<?php the_permalink(); ?>"> Ver más...</a></p>
				</div>

			</div> <!-- /.post -->

		<?php endwhile; ?>
		<?php endif; ?>

		</div> <!-- /.main-container -->

		<?php get_sidebar(); ?>

	</div> <!-- /container -->



<?php get_footer(); ?>