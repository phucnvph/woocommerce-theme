<?php get_header(); ?>
        <!-- Page content-->
        <div class="container">
                    <div class="row">
                    <!-- Blog entries-->
                    <div class="col-12">
                        <?php
                            if(have_posts()) {
                                while(have_posts()){
                                    the_post();
                                    ?>
                                        <!-- Blog post-->
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h2 class="card-title h4"><?php the_title(); ?></h2>
                                                <p class="card-text"><?php the_content(); ?></p>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
            </div>
        </div>
<?php get_footer(); ?>
