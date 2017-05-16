<?php get_header(); ?>

			<div class="main-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1><small>Our students own stories</small></h1>
            </div>
          </div>
        </div>

        <?php $reverse = TRUE; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="row">
            <div class="col-md-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class('post_content'); ?> role="article">
              <?php $reverse = !$reverse; if ($reverse) : ?>
                <blockquote>
              <?php else : ?>
                <blockquote class="blockquote-reverse">
              <?php endif; ?>
                <?php the_field('content'); ?>
                <?php if (get_field( 'author' )) : ?>
                  <footer>
                     <?php the_field('author'); ?>
                  </footer>
                <?php endif; ?>
              </blockquote>
  					 </article>
            </div>
          </div>
        <?php endwhile; endif; ?>

      </div>

<?php get_footer(); ?>