<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<div class="main" id="blog">
  <div class="container clearfix">

    <div class="blog">
    	<?php 
          if(have_posts()) while(have_posts()) : the_post();
         ?>

        <div class="blog__posts">
          <div class="blog__posts--image" style="background-image: url(<?php echo edonovan_featured_image_url($post) ?>);">
          </div>
          <div class="blog__posts--content">
            <a href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
            </a>
            <?php the_excerpt(); ?>
          </div>
          <div class="blog-section-border blog__posts--stats">
            <div class="stat-items blog-stat-border">
              <p><i class="fa fa-user" aria-hidden="true"></i></p> 
              <p>Posted by: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></p>
            </div>
            <div class="stat-items blog-stat-border">
              <p><i class="fa fa-tag" aria-hidden="true"></i></p>
              <p> <?php the_tags( '', ', ', '<br />' ); ?> </p>
            </div>
            <div class="stat-items blog-stat-border">
              <p><i class="fa fa-calendar" aria-hidden="true"></i></p>
              <p><?php the_time(get_option('date_format')); ?></p>
            </div>
            <div class="stat-items blog-stat-border">
              <p><i class="fa fa-list" aria-hidden="true"></i></p>
              <p><?php the_category( ', ' ); ?></p>
            </div>
            <div class="stat-items blog-stat-border">
              <p><i class="fa fa-comments" aria-hidden="true"></i></p>
              <p><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?> </p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>


      <div class="pagination">
        <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
      </div>
    </div> <!--/.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>