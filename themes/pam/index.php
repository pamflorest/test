<?php get_header(); ?>
	<div class="container">

		<div class="main-content">

			<?php
			$branding = new WP_Query( array(
							'posts_per_page' => 5,
							'post_type' =>array('post', 'recetas'),
				));
			?>

			<div id="slider3">

                <a class="buttons prev" href="#">&#60;</a>

                <div class="viewport">

                    <ul class="overview">
                    	<?php
	               			while ( $branding->have_posts() ) : $branding->the_post();
	               		?>
                        <li>
                        	<a href="<?php the_permalink();?>" rel="nofollow">
                        		<?php the_post_thumbnail();?>
                        	</a>
                        </li>
                        <?php endwhile;?>
                    </ul><!--overview-->

                </div><!--viewport-->

                <a class="buttons next" href="#">&#62;</a>

                <ul class="bullets">
		        	<?php for($i = 0; $i<$branding->post_count; $i++):?>
		            	<li><a href="#" class="bullet <?php ($i==0 ? 'active' : ''); ?>" data-slide="<?php echo $i;?>"></a></li>
		        	<?php endfor;?>
	        	</ul>

            </div><!-- end slider3-->


			<h2>Los últimos 10 posts</h2>

			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
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
			<?php endif;   ?>

		</div> <!-- /.main-container -->

		<?php get_sidebar(); ?>

	</div> <!-- /container -->



<?php get_footer(); ?>