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
          <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 post_content'); ?> role="article">
							<?php the_content(); ?>
              <?php
                edit_post_link(
                  sprintf('Edit<span class="screen-reader-text"> "%s"</span>',
                    get_the_title()
                  ),
                  '<span class="edit-link">',
                  '</span>'
                );
              ?>
					</article>
        </div>

      <?php endwhile; endif; ?>

      </div>

      <hr>

      <div class="container-fluid testimonials">

        <?php 
          $args = array(
            'post_type' => 'll_story',
            'orderby'   => 'meta_value',
            'meta_key'  => 'featured',
            'order'     => 'ASC',
            'meta_query' => array(
              array(
                  'key' => 'featured',
                  'value' => 0,
                  'compare' => '>'
              )
            )
          );
          $the_query = new WP_Query( $args );
        ?>
        <?php if ( $the_query->have_posts() ) : ?>
        
        <a href="/testimonials" title="Read the stories" class="blurbs">

          <div class="row">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <div class="col-sm-6 col-md-4">
              <p class="quote">
                <?php the_field( 'blurb' ); ?><br>
                <em class="text-uppercase">– <?php the_field( 'author' ); ?></em>
              </p>
            </div>

            <?php endwhile; wp_reset_postdata(); ?>
          
          </div>

        </a>

        <p class="text-center">
          <a href="/testimonials" class="link">Read the stories</a> - <a href="https://goo.gl/forms/CChmQW3fLdaKb4yU2" class="link" target="_blank">Take our survey</a>
        </p>

        <?php endif; ?>

      </div>

<?php get_footer(); ?>