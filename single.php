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
          <div class="col-lg-12">
            <div class="story-meta">
              <p class="meta">Written on <span class="date"><?php echo get_the_date(); ?></span> by <span><?php the_author(); ?></span></p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-9">
            <article id="post-<?php the_ID(); ?>" <?php post_class('post_content'); ?> role="article">
  							<?php the_content(); ?>
  					</article>
          </div>
          <div class="col-md-3">
          <?php get_sidebar(); // sidebar 1 ?>
          </div>
        </div>

      <?php endwhile; endif; ?>

      </div>

<?php get_footer(); ?>