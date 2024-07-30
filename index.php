<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title><?php bloginfo('name'); ?></title>
</head>
<body>
    <div class="wrapper">
        <header class="container header">
            <?php the_custom_logo($blog_id); ?>
            <?php wp_nav_menu([
                'theme_location' => 'top',
                'container' => null,
                'menu_class' => 'menu',
            ]); ?>
            <div class="search">
                <input type="text" class="search-input" placeholder="Search">
            </div>
        </header>
        <main class="main">
            <div class="head">
                <h1 class="head__title"><?php the_title(); ?></h1>
                <div class="head__links">
                    <a href="" class="head__link">Home</a>
                    <a href="" class="head__link">Link One</a>
                </div>
            </div>

            <div class="container slider">
                <?php if( have_rows('slider_item') ): ?>
                        <?php while( have_rows('slider_item') ): the_row();
                            $url_image = get_sub_field('slider_image');
                            $user = get_sub_field('post_user');
                        ?>
                        <div class="slider_item">
                            <img src="<?php echo $url_image; ?>" class="slider__img" alt="">
                            <div class="slider__block">
                                <?php echo get_sub_field('sup_text'); ?> <br>
                                <?php echo get_sub_field('slider_title'); ?> <br>
                                <?php echo $user['user_avatar']; ?> <br>
                                <?php echo $user['display_name']; ?> <br>
                                <?php echo get_sub_field('post_date'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>


            <div class="container posts">
                <div class="post__items">
                        <?php
                        $myposts = get_posts( [
                            'numberposts' => 10,
                            'category_name' => 'latest_post',
                            'order' => 'ASC',
                            'post_type' => 'post',
                            'suppress_filters' => true,
                        ] );
                        foreach( $myposts as $post ){ setup_postdata( $post );
                            $user = get_field("post_user");
                            ?>
                                <div class="post__item">
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnail'); 
                                        } else {
                                            echo "<img src='" . get_template_directory_uri() ."/assets/img/no-image.png' . alt=''>";
                                        } 
                                    ?> <br>
                                    <?php the_field('sup_text'); ?> <br>
                                    <?php the_title(); ?> <br>
                                    <?php echo $user['user_avatar']; ?> <br>
                                    <?php echo $user['display_name']; ?> <br>
                                    <?php the_field('post_date'); ?>
                                </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                </div>
            </div>

        </main>
        <footer class="footer">

            <?php the_field('footer__title'); ?> </br>
            <?php the_field('footer_text'); ?> </br>
            <?php the_field('footer_email'); ?> </br>
            <?php the_field('footer_phone'); ?> </br></br>

            <h3 class="footer__title">Quick Link</h3>
            <?php wp_nav_menu([
                'theme_location' => 'bottom',
                'container' => null,
                'menu_class' => 'footer__menu',
                'title' => 'Quick Link',
            ]);
            ?>
            <?php the_widget('WP_Widget_Categories', [
                'title' => 'Category',
            ]); ?>
            <div class="newsletter">
                <div class="newsletter__content">
                    <h3 class="newsletter__title">Weekly Newsletter</h3>
                    <p class="newsletter__text">Get blog articles and offers via email</p>
                </div>
                <div class="newsletter__form">
                    <div class="newsletter__email">
                        <input type="email" class="newsletter__input" placeholder="Enter your email">
                    </div>
                    <button class="newsletter__btn">Subscribe</button>
                </div>
            </div>
            <?php the_custom_logo($blog_id); ?>
            <div class="rights">
                <div class="rights__items">
                    <div class="rights__item">Terms of Use</div>
                    <div class="rights__item">Privacy Policy</div>
                    <div class="rights__item">Cookie Policy</div>
                </div>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>

</html>