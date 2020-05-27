<?php
/**
 * Footer
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */
?>
            <footer id="footer" class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
                <div class="site-copyright">
                    &copy; <?php echo date( 'Y' ) . ' ' . get_bloginfo( 'name' ); ?>. All rights reserved.
                    <?php
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
