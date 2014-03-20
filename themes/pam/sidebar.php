<div class="sidebar">

	<div class= "azul">

		<h3><a href="<?php echo SITEURL . 'category/azul'; ?>">Azul</a></h3>

		<?php
			$args = array('category_name'=>'azul', 'posts_per_page' => 5,'post_status' => 'publish');
			//$query = new WP_Query($args);
			$myposts = get_posts( $args );

			// echo '<pre>';
			// print_r($myposts);
			// echo'</prev>';
		?>

		<ul>
			
			<?php foreach ( $myposts as $post ) : ?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
			<?php endforeach; ?>

		</ul>

	</div> <!-- /.azul --> 

	<div class= "verde">

		<?php
			$args = array('category_name'=>'verde', 'posts_per_page' => 5,'post_status' => 'publish');
			//$query = new WP_Query($args);
			$myposts = get_posts( $args );
		?>

		<h3><a href="<?php echo SITEURL.'category/verde'; ?>">Verde</a></h3>

		<ul>
			
			<?php foreach ( $myposts as $post ) : ?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
			<?php endforeach; ?>

		</ul>

	</div><!-- /.verde --> 

</div>