<?php
/**
 * Footer
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

?>
			<footer id="footer" class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
				<div class="site-copyright">
					&copy; <?php echo esc_html( date_i18n( 'Y' ) . ' ' . get_bloginfo( 'name' ) ); ?>.
					<?php
					_e( 'All rights reserved.', 'wp-boilerplate' );

					if ( function_exists( 'the_privacy_policy_link' ) ) {
						the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
					}
					?>
				</div><!-- .site-copyright -->
			</footer><!-- #footer -->
		</div><!-- #wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>
