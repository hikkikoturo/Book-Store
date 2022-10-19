<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
    </div><!-- .site-content -->
    <footer class="site-footer">
        <?php book_junky_footer_top(); ?>

        <div id="footer-bottom">
            <div class="container">
                <div class="row">
                <div class="col-xs-12">

                    <?php book_junky_footer_bottom(); ?>
                </div>
                </div>
            </div>
        </div><!-- #footer-bottom -->

    </footer><!-- .site-footer -->

</div><!-- .site -->

<?php book_junky_end_boxed(); ?>
<?php book_junky_back_to_top(); ?>
<?php wp_footer(); ?>
</body>
</html>












