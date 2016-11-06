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


<div class="main" id="homepage">
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
        $args = array('post_type' => 'employees', 'employees-category' => 'higher-management', 'posts_per_page'   => 4);
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


