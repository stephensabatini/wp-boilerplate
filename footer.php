<?php
/**
 * Footer
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

?>
			<footer id="site-footer" class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
				&copy; <?php echo esc_html( date_i18n( 'Y' ) . ' ' . get_bloginfo( 'name' ) ); ?>.
				<?php
				esc_html_e( 'All rights reserved.', 'wp-boilerplate' );
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
				?>
			</footer><!-- #site-footer -->
		</div><!-- #site-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>
