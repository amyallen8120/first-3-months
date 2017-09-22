<?php get_header(); ?>

<div class="page-content">
    
    <div class="course-ctn">

        <a href="<?php echo get_home_url(); ?>/your-terminal" class="course__back-link link--pink-hover">&larr; Back to All Courses</a>

        <?php
        global $post;
        $parent_courses = get_pages( array(
            'post_type'    => 'courses',
            'parent'       => 0
        ) );

        $parent_courses_ids = array();

        foreach ( $parent_courses as $parent_course ) {
            $parent_courses_ids[] = $parent_course->ID;
        }

        $child_courses = get_pages( array(
            'post_type'    => 'courses',
            'exclude'      => $parent_courses_ids,
            'hierarchical' => false
        ) );


        if ( $post->post_parent ) : ?> <!-- Post page -->
        
        <h2><?php echo the_title(); ?></h2>

        <section class="course-post">

            <div class="course-post__sidebar-mobile">

                <p>See More in <?php echo get_the_title($post->post_parent); ?></p>

                <div>


                </div>

            </div>

            <div class="course-post__sidebar">

                





            <div class="course-post__sidebar-month-ctn">
                
                    <h6>Month One</h6>

                    <?php

                    $args = array(
                        'post_type'      => 'courses',
                        'posts_per_page' => -1,
                        'post_parent'    => $post->post_parent,
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order',
                        'meta_key'       => 'month',
                        'meta_value'     => 'monthOne'
                     );


                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : ?>

                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                            <?php $month = get_field('month'); ?>
                            
                            <a href="<?php the_permalink(); ?>" class="link--pink-hover"><?php echo the_title() . '<br>'; ?></a>


                        <?php endwhile; ?>

                    <?php endif; wp_reset_query(); ?>

                </div>

                <div class="course-post__sidebar-month-ctn">
                
                    <h6>Month Two</h6>

                    <?php

                    $args = array(
                        'post_type'      => 'courses',
                        'posts_per_page' => -1,
                        'post_parent'    => $post->post_parent,
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order',
                        'meta_key'       => 'month',
                        'meta_value'     => 'monthTwo'
                     );


                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : ?>

                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                            <?php $month = get_field('month'); ?>
                            
                            <a href="<?php the_permalink(); ?>" class="link--pink-hover"><?php echo the_title() . '<br>'; ?></a>


                        <?php endwhile; ?>

                    <?php endif; wp_reset_query(); ?>

                </div>

                <div class="course-post__sidebar-month-ctn">
                
                    <h6>Month Three</h6>

                    <?php

                    $args = array(
                        'post_type'      => 'courses',
                        'posts_per_page' => -1,
                        'post_parent'    => $post->post_parent,
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order',
                        'meta_key'       => 'month',
                        'meta_value'     => 'monthThree'
                     );


                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : ?>

                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                            <?php $month = get_field('month'); ?>
                            
                            <a href="<?php the_permalink(); ?>" class="link--pink-hover"><?php echo the_title() . '<br>'; ?></a>


                        <?php endwhile; ?>

                    <?php endif; wp_reset_query(); ?>

                </div>

            </div> <!-- end of sidebar -->
            
            <div class="course-post__content">

                <?php echo the_content(); ?>

            </div>

        </section>

        <?php elseif ( count( $parent_courses_ids ) > 0 ) : ?> <!-- Course page with list of posts -->
        
        <?php echo the_content(); ?>

        <div class="course-content__month-ctn">
            
            <h3>Month One</h3>

            <div class="course-content__courses-ctn">

            <?php

            $args = array(
                'post_type'      => 'courses',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
                'meta_key'       => 'month',
                'meta_value'     => 'monthOne'
             );


            $parent = new WP_Query( $args );

            if ( $parent->have_posts() ) : ?>

                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                    
                    <div class="course-content__post-card-wrapper">
                        
                        <a href="<?php the_permalink(); ?>" class="course-content__post-card-link link--pink-hover"><h5><?php echo the_title() . '<span>.</span>'; ?></h5></a>
                        <p><?php echo get_the_excerpt(); ?></p>

                        <div class="course-content__post-card-details">

                            <p class="course-content__post-card-details--small-text"><span>Author:</span>  <?php echo get_the_author(); ?></p>
                            <p class="course-content__post-card-details--small-text"><span>Post Date:</span>  <?php echo get_the_date( 'M j, Y' ); ?></p>
                            <p class="course-content__post-card-details--small-text"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></p>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php endif; wp_reset_query(); ?>

            </div>

        </div>

        <div class="course-content__month-ctn">
            
            <h3>Month Two</h3>

            <div class="course-content__courses-ctn">

            <?php

            $args = array(
                'post_type'      => 'courses',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
                'meta_key'       => 'month',
                'meta_value'     => 'monthTwo'
             );


            $parent = new WP_Query( $args );

            if ( $parent->have_posts() ) : ?>

                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                    
                    <div class="course-content__post-card-wrapper">
                        
                        <a href="<?php the_permalink(); ?>" class="course-content__post-card-link link--pink-hover"><h5><?php echo the_title() . '<span>.</span>'; ?></h5></a>
                        <p><?php echo get_the_excerpt(); ?></p>

                        <div class="course-content__post-card-details">

                            <p class="course-content__post-card-details--small-text"><span>Author:</span>  <?php echo get_the_author(); ?></p>
                            <p class="course-content__post-card-details--small-text"><span>Post Date:</span>  <?php echo get_the_date( 'M j, Y' ); ?></p>
                            <p class="course-content__post-card-details--small-text"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></p>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php endif; wp_reset_query(); ?>

            </div>

        </div>

        <div class="course-content__month-ctn">
            
            <h3>Month Three</h3>

            <div class="course-content__courses-ctn">

            <?php

            $args = array(
                'post_type'      => 'courses',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
                'meta_key'       => 'month',
                'meta_value'     => 'monthThree'
             );


            $parent = new WP_Query( $args );

            if ( $parent->have_posts() ) : ?>

                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                    
                    <div class="course-content__post-card-wrapper">
                        
                        <a href="<?php the_permalink(); ?>" class="course-content__post-card-link link--pink-hover"><h5><?php echo the_title() . '<span>.</span>'; ?></h5></a>
                        <p><?php echo get_the_excerpt(); ?></p>

                        <div class="course-content__post-card-details">

                            <p class="course-content__post-card-details--small-text"><span>Author:</span>  <?php echo get_the_author(); ?></p>
                            <p class="course-content__post-card-details--small-text"><span>Post Date:</span>  <?php echo get_the_date( 'M j, Y' ); ?></p>
                            <p class="course-content__post-card-details--small-text"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></p>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php endif; wp_reset_query(); ?>

            </div>

        </div>

        <?php else : ?>
        <!-- This is a parent page without children. -->

        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>
