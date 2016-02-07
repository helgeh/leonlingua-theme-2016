			<footer class="row">
			  <hr />
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
        <?php endif; ?>
        <?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
        <?php //endif; ?>
        <?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
        <?php //endif; ?>

			  <div class="col-lg-12">
						<p class="attribution">&copy; <?php bloginfo('name'); ?></p>
				</div>
			</footer>

		</div> <!-- .container -->
		
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>