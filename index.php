<?php get_header(); ?>
        <!-- Page content-->
        <div class="container">
            <?php
                if (is_home()) {
                    echo "<h1>This is Home page</h1>";
                }

                if (is_front_page()) {
                    echo "<h1>This is Front page</h1>";
                }

                if (is_404()) {
                    echo "<h1>This is 404 page</h1>";
                }

                if (is_page()) {
                    echo "<h1>This is a Page Template</h1>";
                }

                if (is_single()) {
                    echo "<h1>This is a Single Post Template</h1>";
                }
            ?>
                    <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-8">
                        
                        <div id="product-new-arrivals">
                            <?php echo do_shortcode('[products limit="4" columns="4"]')?>
                        </div>
                    </div>
                    <!-- Side widgets-->
                    <div class="col-lg-4">
                        <?php get_sidebar(); ?>
                        
                    </div>
            </div>
        </div>
<?php get_footer(); ?>
