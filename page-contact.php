<?php

/*
  Template Name: Contact
*/

get_header();  ?>

<div class="main" id="contact">
  <section class="hero-map">
    
  </section>
  <div class="container">

    <section class="form">
      <h4><?php the_field('contact_us'); ?></h4>
      <div>
        <?php the_content(); ?>
        <?php the_field('newsletter_code'); ?>
      </div>
    </section>

    <section class="contactinfo">
      <h4><?php the_field('contact_info'); ?></h4>
      <p class="contactinfo--headline"><?php the_field('info_headline'); ?></p>
      <p><?php the_field('content'); ?></p>
      <section class="contact-section">
        <article>
          <div>
            <i class="fa fa-map-marker" aria-hidden="true">      </i>
          </div>
          <div>
            <p>
              <?php the_field('address', 'option'); ?>
            </p>
          </div>
        </article>
        <article>
          <div>
            <i class="fa fa-phone" aria-hidden="true"></i>
          </div>
          <div>
            <p>
              <?php the_field('phone_number', 'option'); ?>
            </p>
          </div>
        </article>
        <article>
          <div>
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
          </div>
          <div>
            <p>
              <?php the_field('email_address', 'option'); ?>
            </p>
          </div>
        </article>
      </section>
    </section>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>