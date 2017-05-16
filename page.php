<?php get_header(); ?>

			<div class="main-section">

      <?php
        $alt_query = get_posts( array( 'name' => 'individual-needs', 'post_type' => 'page' ) );
        if ($page = $alt_query[0]) {
          $footnote = $page->post_content;
        }
      ?>

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

        <div class="row">
          <div class="col-lg-12">
              <?php
                $classes_page_ID = 298;
                $parent_id = wp_get_post_parent_id( get_the_ID() );
                if ($parent_id == $classes_page_ID && $footnote) {
                  echo "<hr><div class='footnote'><h5>Individual needs:</h5><p class='small'>" . $footnote . "</p></div>";
                }
              ?>
          </div>
        </div>

      <?php endwhile; endif; ?>

      </div>

<?php get_footer(); ?>