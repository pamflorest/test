<?php
	get_header();
	while ( have_posts() ) : the_post();
?>

	<!-- Insert content here -->
	<div class="container">

		<div class="main-content">

			<h2 class="text-center"><?php the_title(); ?></h2>
			<?php
				$time = get_post_meta($post->ID, 'tiempo', true);
				$keys = get_post_custom_keys($post->id);
				$ingrediente = 'PAM';

				foreach ($keys as $key) {
					if($key == 'Ingrediente'){
						$ingrediente = $key;
					}
				}

				$values = get_post_custom_values($ingrediente, $post->id);

				if ( 'recetas' == get_post_type()):
			?>
				<p>
					<?php
						the_terms( $post->ID, 'dificultad', 'Dificultad: ' );
					?>
				</p>

				<p>Tiempo de preparación: <?php echo $time; ?> </p>

				<p> Ingredientes </p>

				<ul>
					<?php foreach ($values as $value) : ?>
						<li><?php echo $value; ?></li>
					<?php endforeach; ?>
				</ul>

				<!-- <p>Meta information for this post:</p>
				<?php //the_meta(); ?> -->

			<?php endif; ?>


			<div class ="single">

				<?php the_content();?>

				<?php the_post_thumbnail(); ?>

			</div>


		</div> <!-- main content -->

		<?php get_sidebar(); ?>

	</div> <!-- container -->

<?php  endwhile; get_footer(); ?>