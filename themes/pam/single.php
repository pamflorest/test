<?php
	get_header();
	while ( have_posts() ) : the_post();
?>
	<!-- Insert content here -->
	<div class="container">

		<div class="main-content">

			<h2 class="text-center"><?php the_title(); ?></h2>

			<div class ="single">

				<?php the_content();?>

				<?php the_post_thumbnail(); ?>

			</div>


		</div> <!-- main content -->

		<?php get_sidebar(); ?>

	</div> <!-- container -->

<?php  endwhile; get_footer(); ?>