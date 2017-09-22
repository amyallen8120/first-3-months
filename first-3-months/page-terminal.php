<?php /* Template Name: Courses */ ?>

<?php get_header(); ?>

<div class="page-content">
	
	<?php echo the_content(); ?>

	<div class="courses-wrapper">

	<?php 
	$args = array( 'post_type' => 'courses', 'posts_per_page' => 10 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
		
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

		<?php $children = get_children( $args ); ?>

		    <div class="courses_course-card-ctn">
			    <div class="course-card">
			      <a href="<?php echo get_permalink(); ?>">
				      <div class="course-card__image">
				        <?php echo get_the_post_thumbnail( null, $size, $attr ); ?>
				      </div>
			      </a>

			      <!-- Post Content-->
			      <div class="card-content">

					<?php 
					if ( get_the_category() ) {
						$i = 0;
						$catLength = count( get_the_category() );

						echo '<div class="course-card__categories">';

						foreach( get_the_category() as $category) {

						if ( $category->cat_name != 'Featured' ) {

							if ($i == $catLength - 1) {
						        echo $category->cat_name;

						    } else {
						    	echo $category->cat_name . ', ';
						    }
					    
						}
					     
					     $i++;

						 }
						 echo '</div>';
					}
					?>

					<h4 class="course-card__name"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div class="course-card__description"><?php the_content(); ?></div>
					
					<?php
					if ( get_the_tags() ) {
					$i = 0;
					$tagLength = count( get_the_tags() );
					echo '<div class="course-card__tags"><p><strong>Tags: </strong>';
					  foreach( get_the_tags() as $tag ) {

					  	if ($i == $tagLength - 1) {
					        echo $tag->name;
					    } else {
					    	echo $tag->name . ', ';
					    }
					     
					     $i++;

					  }
					echo '</p></div>';
					}
					?>

			      </div>

			      <div class="course-card__stats clearfix">
			        <div class="one-third">
			          <div class="stat"><?php the_field('estimated_hours'); ?></div>
			          <div class="stat-value">Hours</div>
			        </div>

			        <div class="one-third">
			          <div class="stat">
			          	<?php echo count( $children ); ?>
			          </div>
			          <div class="stat-value">
			          <?php if( count( $children ) == 1 ) { ?>
			          		Post
			          <?php } else { ?>
			          		Posts
			          <?php } ?>
			          </div>
			        </div>

			        <div class="one-third">
			          <div class="stat"><?php the_field('number_contributors'); ?></div>
			          <div class="stat-value">Contributors</div>
			        </div>

			      </div>

			    </div> <!-- end course-card -->
			  
			</div> <!-- end container --> 

		<?php endif; wp_reset_query(); ?>

	<?php endwhile; ?>


	</div> <!-- end courses wrapper -->

</div>
<?php get_footer(); ?>
