<?php get_header(); ?>

<div class="main" id="blog">
  <div class="container">
    <div class="blog">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div id="nav-below" class="navigation">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
        </div><!-- #nav-below -->

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2 class="entry-title"><?php the_title(); ?></h2>

          <div class="entry-content">
            <div class="blog__posts">
              <div class="single-section-border blog__posts--stats">
                <div class="stat-items single-stat-border">
                  <p><i class="fa fa-user" aria-hidden="true"></i></p>
                  <p>Posted by: <?php the_author_meta('nickname'); ?></p>
                </div>
                <div class="stat-items single-stat-border">
                  <p><i class="fa fa-tag" aria-hidden="true"></i></p>
                  <p> <?php the_tags( '', ', ', '<br />' ); ?> </p>
                </div>
                <div class="stat-items single-stat-border">
                  <p><i class="fa fa-calendar" aria-hidden="true"></i></p>
                  <p><?php the_time(get_option('date_format')); ?></p>
                </div>
                <div class="stat-items single-stat-border">
                  <p><i class="fa fa-list" aria-hidden="true"></i></p>
                  <p><?php the_category( ', ' ); ?></p>
                </div>
                <div class="stat-items single-stat-border">
                  <p><i class="fa fa-comments" aria-hidden="true"></i></p>
                  <p><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?> </p>
                </div>
              </div>
              <div class="blog__posts--image" style="background-image: url(<?php echo edonovan_featured_image_url($post) ?>);">
              </div>
            </div>
            <div class="single-content-section">
              <?php the_content(); ?>
            </div>

          </div><!-- .entry-content -->
        </div><!-- #post-## -->


        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>