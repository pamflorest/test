<div class="sidebar">

	<div class= "azul">

		<?php
			$args = array('category_name'=>'azul', 'posts_per_page' => 5,'post_status' => 'publish');
			$query = new WP_Query($args);

			// echo '<pre>';
			// print_r($categories);
			// echo'</prev>';
		?>

		<h3><a href="<?php echo SITEURL.'category/azul'; ?>">Azul</a></h3>

		<ul>

			<?php
				if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();
			?>

			<li>
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</li>

			<?php endwhile; endif;?>

		</ul>

	</div>

	<div class= "verde">

		<?php
			$args = array('category_name'=>'verde', 'posts_per_page' => 5,'post_status' => 'publish');
			$query = new WP_Query($args);

			// echo '<pre>';
			// print_r($categories);
			// echo'</prev>';
		?>

		<h3><a href="<?php echo SITEURL.'category/verde'; ?>">Verde</a></h3>

		<ul>

			<?php
				if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();
			?>

			<li>
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</li>

			<?php endwhile; endif;?>

		</ul>

	</div>

</div>