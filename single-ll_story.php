<?php get_header(); ?>

			<div class="main-section">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 class="page-title screen-reader-text"><?php the_title(); ?></h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class('post_content'); ?> role="article">
  							<?php the_content(); ?>
  					</article>
          </div>
        </div>

      <?php endwhile; endif; ?>

      </div>

<?php get_footer(); ?>