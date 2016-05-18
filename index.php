<?php get_header(); ?>

			<div class="main-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1>Blog</h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 post_content'); ?> role="article">
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
          <div class="col-md-4">
            <div class="link-list">
              <h3>Lista de enlaces</h3>
              <ul>
                <li>
                  <a href="http://www.veintemundos.com" target="_blank">veintemundos.com</a>
                </li>
                <li>
                  <a href="http://www.profedeele.es" target="_blank">profedeele.es</a>
                </li>
                <li>
                  <a href="http://www.1001reasonstolearnspanish.com" target="_blank">1001reasonstolearnspanish.com</a>
                </li>
                <li>
                  <a href="http://www.duolingo.com" target="_blank">duolingo.com</a>
                </li>
                <li>
                  <a href="http://www.studyspanish.com" target="_blank">studyspanish.com</a>
                </li>
              </ul>
              <h3>Online Dictionaries</h3>
              <ul>
                <li>
                  <a href="http://www.rae.es" target="_blank">rae.es</a>
                </li>
                <li>
                  <a href="http://www.wordreference.com/es/" target="_blank">wordreference.com</a>
                </li>
              </ul>
              <h3>Dudas y preguntas</h3>
              <ul>
                <li>
                  <a href="http://www.castellanoactual.com" target="_blank">castellanoactual.com</a>
                </li>
              </ul>
              <h3>Conjugator</h3>
              <ul>
                <li>
                  <a href="http://conjugator.reverso.net/conjugation-spanish.html" target="_blank">reverso.net</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>

<?php get_footer(); ?>