<?php
/*
  Template Name: Left Sidebar
*/
?>
<!-- home.php is the name for default blogs -->
<?php get_header(); ?>

<section class="two-column row no-max pad">
  <div class="small-12 columns">
    <div class="row">
      <!-- Primary Column -->
      <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
        <div class="primary">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article class="post">
              <!-- automatically figures out what the link should be -->
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

              <ul class="post-meta no-bullet">
                <li class="author">
                    <span class="wpt-avatar small">
                      <!-- sometimes you need to echo out get methods -->
                      <?php echo get_avatar(get_the_author_meta('ID'), 24); ?>
                    </span>
                    by <?php the_author_posts_link(); ?>
                  </a>
                </li>
                <!-- (', ') stops the 'in' from being misplaced -->
                <li class="cat">in <?php the_category(', '); ?></li>
                <!-- displays the date for all posts, even if they're posted on the same day, otherwise date doesn't print -->
                <li class="date">on <?php the_time('F j, Y'); ?></li>
              </ul>

              <?php if( get_the_post_thumbnail() ) : ?>

                <div class="img-container">
                  <?php the_post_thumbnail('large'); ?>
                </div>

              <?php endif; ?>

              <?php the_content(); ?>
              <?php comments_template(); ?>

            </article>

          <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>

        </div>
      </div>

      <?php get_sidebar(); ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>
