<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php get_bloginfo('charset');?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php get_bloginfo('title'); ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php bloginfo( 'template_directory' ) ?>/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <?php wp_head();?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo home_url('/');?>">
                    <?php 
                        if( has_custom_logo()){
                            the_custom_logo();
                        } else {
                            echo bloginfo('title');
                        }
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'sbt_primary_menu_id',
                                'container' => false,
                                'items_wrap' => '<ul class="navbar-nav ms-auto mb-2 mb-lg-0">%3$s</ul>',
                            )
                        );
                    ?>
                    <?php if(class_exists('WooCommerce')) : ?>
                        <?php if(is_user_logged_in()) : ?>
                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="btn btn-sm btn-primary">My Account</a>
                            <a href="<?php echo wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id')));?>" class="btn btn-sm btn-warning">Logout</a>
                        <?php else : ?>
                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="btn btn-sm btn-primary">Login</a>
                        <?php endif?>
                            <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-sm btn-primary">
                                Cart(<span class="items-count"><?php echo wc()->cart->get_cart_contents_count(); ?></span>)
                        </a>
                    <?php endif?>
                    <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder"><?php  bloginfo("title"); ?></h1>
                </div>
            </div>
        </header>