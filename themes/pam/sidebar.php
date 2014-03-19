<<<<<<< HEAD
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

=======
<div class="sidebar"> 

	<div class= "azul">
		<?php

			$args = array( 'posts_per_page' => 5,  'category' => 'azul' );

			$myposts = new WP_Query( $args );

			echo '<pre>';
			print_r($myposts);
			echo'</prev>';
		?>

		<h3><?php the_category(' '); ?></h3>
		<?php foreach ( $myposts as $post ) : ?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
		<?php endforeach; ?>
	</div>

	<div class= "verde">
		<h3>Verde</h3>
>>>>>>> f53fec6c06dc7c962242055129a4df33c78e5bca
	</div>

</div>