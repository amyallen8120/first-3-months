<?php get_header(); ?>

<div class="page-content">
  
	<?php if( have_rows('icon_module_container') ): ?>

	<section class="front-page-icon-module">
		
		<h2>About First 3 Months</h2>
		
		<div class="front-page-image-module__icon-ctn">

	 	<?php while ( have_rows('icon_module_container') ) : the_row(); ?>

	        <div class="front-page-icon-module__item">

	        	<?php
				$icon = get_sub_field('icon_module_icon');
				$iconUrl = $icon['url'];

				if( $iconUrl != '' ) { ?>

					<img src="<?php echo $iconUrl; ?>" class="front-page-icon-module__icon">

				<?php } ?>

				<h3><?php the_sub_field('icon_module_heading'); ?></h3>
				<p><?php the_sub_field('icon_module_text'); ?></p>
			</div>

	    <?php endwhile; ?>

		</div>

	</section> <!-- end of front page icon module -->

	<?php endif; ?>

</div> <!-- end of page content -->


<section class="front-page-image-module">

	<h2>Featured Courses</h2>

	<div class="front-page-image-module__courses-ctn">

	<?php 
	$args = array( 'post_type' => 'courses', 'category_name'  => 'featured' );
	$loop = new WP_Query( $args );
	$i = 0;
	while ( $loop->have_posts() && ( $i < 2 ) ) : $loop->the_post(); ?>
		
		<?php

		$args = array(
		    'post_type'      => 'courses',
		    'posts_per_page' => -1,
		    'post_parent'    => $post->ID,
		    'order'          => 'ASC',
		    'orderby'        => 'menu_order'
		 );


		$parent = new WP_Query( $args );

		if ( $parent->have_posts() ) : ?>
		
		<?php
		$image = get_field('home_page_featured_course_image');
		$imageUrl = $image['url'];
		?>
		
		<div class="front-page-image-module__course-ctn">

			<div class="front-page-image-module__overlay"></div>
			
			<div class="front-page-image-module__course-wrapper" style="background-image: url('<?php echo $imageUrl; ?>');">

				<svg viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
			      <path d="M0,0 150,0 500,405 0,405" />
			    </svg>

			    <div class="front-page-image-module__content">
				    <h3 class="front-page-image-module__heading"><?php the_title(); ?></h3>
				    <div class="front-page-image-module__description"><?php the_content(); ?></div>
				    <a href="<?php the_permalink(); ?>" class="front-page-image-module__link">See Course</a>
			    </div>

			</div>

		</div>

		<?php
		$i++;
		endif; 
		wp_reset_query(); 
		?>

	<?php endwhile; ?>
	</div>
</section> <!-- end of front page image module -->

<?php get_footer(); ?>