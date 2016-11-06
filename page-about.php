<?php

/*
  Template Name: About
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.css" media="screen">
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>


<?php $heroImage = get_field('hero_image'); ?>
<div class="hero" style="background-image: url(<?php echo $heroImage['url'] ?>);">
<div class="overlay"></div>
  <header id="header" class="clearfix">
    <div class="container">
      <div class="logo">
        <?php 
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        ?>
        <img src="<?php echo $image[0]; ?>" alt="">
      </div>
      <nav>
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </nav>
    </div> <!-- /.container -->
  </header><!--/.header-->
  <div class="hero__flex">
    <div class="hero__flex--content">
      <h1><?php the_field('hero_headline'); ?></h1>
      <p><?php the_field('hero_tagline'); ?></p>
      <a href="<?php the_field('button_link'); ?>" class="button">
        <?php the_field('button_text'); ?>
      </a> 
    </div> <!-- /hero__content -->
  </div>
</div> <!-- /hero -->


<div class="main" id="about">

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
        $args = array('post_type' => 'employees', 'orderby' => 'ID', 'order' => 'ASC', 'posts_per_page'=>1000);
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