<?php

/*
  Template Name: About
*/

get_header();  ?>

<div class="main" id="about">
  <?php $heroImage = get_field('hero_image'); ?>
  <section class="hero" style="background-image: url(<?php echo $heroImage['url'] ?>);">
    <div class="hero__content">
      <h1><?php the_field('hero_headline'); ?></h1>
      <p><?php the_field('hero_tagline'); ?></p>
      <a href="<?php the_field('button_link'); ?>" class="button"><?php the_field('button_text'); ?></a> 
    </div> <!-- hero__content -->
  </section> <!-- /hero -->

  <section class="whatwedo">
    <div class="container">
      <h2><?php the_field('what_we_do'); ?></h2>
      <h3><?php the_field('what_we_do_tagline'); ?></h3>
      <p><?php the_field('what_we_do_content'); ?></p>
    </div> <!-- /.container -->
  </section> <!-- whatwedo -->

  <section class="services">
    <div class="container">
      <h2><?php the_field('our_services'); ?></h2>
      <p><?php the_field('services_content'); ?></p>
      <div class="services__types">
        <?php 
          while(have_rows('services_repeater')) : the_row();
        ?>
          <?php 
             // vars
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');
          ?>
          
          <div class="item">
            <i class="fa <?php echo $icon ?> fa-2x" aria-hidden="true"></i>
            <p class="services__types--title"><?php echo $title ?></p>
          </div>

        <?php endwhile ?> <!-- /services repeater -->
      </div>
    </div> <!-- /.container -->
  </section> <!-- /services -->

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

      <?php endwhile; ?> <!-- ends team section -->
      <?php  wp_reset_postdata(); ?>
    </div> <!-- /.container -->
  </section> <!-- /team -->
    
  <?php $contactusImage = get_field('contact_background_imge'); ?>
  <section class="contactus" style="background-image: url(<?php echo $contactusImage['url'] ?>)">
    <div class="container">
      <h2><?php the_field('call_out') ?></h2>
      <a href="<?php the_field('contact_button_link'); ?>" class="button"><?php the_field('contact_button_text'); ?></a>
    </div> <!-- /.container -->
  </section> <!-- /contactus -->
</div> <!-- /.main -->

<?php get_footer(); ?>