<?php get_header(); ?>

			<div class="main-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1>Testimonials!</h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('post_content'); ?> role="article">
                <header>
                  <?php the_title( sprintf( '<h2 class="page-title screen-reader-text"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                </header>
                <section>
                  <?php the_excerpt(); ?>
                </section>
                <footer></footer>
    					</article>
            <?php endwhile; endif; ?>
          </div>
        </div>

      </div>

<?php get_footer(); ?>