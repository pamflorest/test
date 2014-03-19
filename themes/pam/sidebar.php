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
	</div>

</div>