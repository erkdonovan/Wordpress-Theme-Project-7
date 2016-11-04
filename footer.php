<footer class="footer">
  <div class="container footer__flex">
    <section class="footer__newsletter">
      <h4><i class="fa fa-envelope-o" aria-hidden="true"></i> Newsletter Signup</h4>
      <?php $newsLetter = get_field('newsletter_form', 'option');
          $newsLetter = trim($newsLetter);
       ?>
      <?php echo do_shortcode($newsLetter); ?>
      <nav>
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'footer'
        )); ?>
      </nav>
    </section>

    <section class="footer__tweets">
      <h4><i class="fa fa-twitter" aria-hidden="true"></i> Recent Tweets</h4>
      <!-- twitter_handle -->
    </section>

    <section class="footer__posts">
      <h4><i class="fa fa-pencil" aria-hidden="true"></i> Recent Posts</h4>
      <ul>
        <!-- Define our WP Query Parameters -->
        <?php $the_query = new WP_Query( 'posts_per_page=4' ); ?>

        <!-- Start our WP Query -->
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

        <!-- Display the Post Title with Hyperlink -->
        <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>
    </section>

    <section class="contact-section">
      <h4><i class="fa fa-building-o" aria-hidden="true"></i> Main Office</h4>
      <article>
        <div>
          <i class="fa fa-map-marker" aria-hidden="true"></i>
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
  </div>
  <div class="container">
    <div class="social">
      <?php 
        while(have_rows('social_repeater', 'option')) : the_row();
      ?>
        <?php 
           // vars
          $link = get_sub_field('social_link', 'option');
          $icon = get_sub_field('social_icon', 'option');
          $alt = get_sub_field('social_alt', 'option');
        ?>
        
        <div class="social__types--item">
          <a href="</a> <?php echo $link ?>" alt="<?php echo $alt ?>"><i class="fa <?php echo $icon ?>" aria-hidden="true"></i></a>
        </div>

      <?php endwhile ?> 
    </div>
  </div>
</footer>

<script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>
<script>
// scripts.js, plugins.js and jquery are enqueued in functions.php
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</body>
</html>