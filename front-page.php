<?php get_header();  ?>

<div class="main" id="homepage">
  <?php $heroImage = get_field('hero_image'); ?>
  <section class="hero" style="background-image: url(<?php echo $heroImage['url'] ?>);">
    <div class="hero__content">
      <h1><?php the_field('hero_headline'); ?></h1>
      <p><?php the_field('hero_tagline'); ?></p>
      <a href="<?php the_field('button_link'); ?>" class="button">
        <?php the_field('button_text'); ?>
      </a> 
    </div> <!-- /hero__content -->
  </section> <!-- /hero -->
  <section class="process">
    <div class="container">
      <h2><?php the_field('our_process'); ?></h2>
        <div class="process__types">
          <?php 
            while(have_rows('process_repeater')) : the_row();
          ?>
            <?php 
               // vars
              $title = get_sub_field('process_title');
              $icon = get_sub_field('process_icon');
              $content = get_sub_field('process_description');
            ?>
            
            <div class="process__types--item">
              <i class="fa <?php echo $icon ?> fa-2x" aria-hidden="true"></i>
              <p class="process__title"><?php echo $title ?></p>
              <p><?php echo $content ?></p>
            </div>

          <?php endwhile ?> 
        </div> <!-- /process repeater -->
    </div> <!-- /.container -->
  </section> <!-- /process -->

  <section class="team">
    <div class="container team__flex">
        <?php 
        $args = array('post_type' => 'employees', 'orderby' => 'ID', 'order' => 'ASC');
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <div class="team__flex--profiles">
          <?php $employeePhoto = get_field('employee_headshot') ?>
          <img src="<?php echo $employeePhoto['url'] ?>" alt="<?php echo $employeePhoto['alt'] ?>">
          <h4><?php the_title(); ?></h4>
          <p><?php the_field('employee_job_title'); ?>, 
          <?php the_field('employee_location'); ?></p>
        </div>

      <?php endwhile;?> <!-- ends team section -->
      <?php  wp_reset_postdata(); ?>
    </div> <!-- /.container -->
  </section> <!-- /team -->

  <?php $clientImage = get_field('client_background_image'); ?>
  <section class="clients" style="background-image: url(<?php echo $clientImage['url'] ?>)">
    <div class="container">
      <h2><?php the_field('client_testimonials'); ?></h2>
      <div class="clients__testimonials carousel" data-flickity='{ "wrapAround": true }'>
        <?php 
          while(have_rows('client_repeater')) : the_row();
        ?>
          <?php 
             // vars
            $clientname = get_sub_field('client_name');
            $testimonial = get_sub_field('testimonial');
          ?>
          
          <div class="item carousel-cell">
            <div class="clients__quote">
              <p><?php echo $testimonial ?></p>
                <p class="clients__quote--name"><?php echo $clientname ?></p>
            </div>
          </div>

        <?php endwhile ?> 
      </div> <!-- /testimonials repeater -->
    </div> <!-- /.container -->
  </section> <!-- /clients -->

</div> <!-- /.main -->

<?php get_footer(); ?>


