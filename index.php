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
                                <div class="post__sup-text"><?php echo get_sub_field('sup_text'); ?></div>
                                <h2 class="slider_title"><?php echo get_sub_field('slider_title'); ?></h2>
                                <div class="slider_bootom">
                                    <div class="slider_user">
                                        <?php echo $user['user_avatar']; ?>
                                        <sup class="display_name"><?php echo $user['display_name']; ?></sup>
                                    </div>
                                    <div class="post_date"><?php echo get_sub_field('post_date'); ?></div>
                                </div>
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
                                            the_post_thumbnail([360, 240]); 
                                        } else {
                                            echo "<img src='" . get_template_directory_uri() ."/assets/img/no-image.png' . alt=''>";
                                        } 
                                    ?>
                                    <div class="post__block">
                                        <sup class="post__sup-text post__sup-text_color"><?php the_field('sup_text'); ?></sup>
                                        <h2 class="post__title"> <?php the_title(); ?></h2>
                                        <div class="post__bottom">
                                            <div class="post__user">
                                                <?php echo $user['user_avatar']; ?>
                                                <sup class="display_name"><?php echo $user['display_name']; ?></sup>
                                            </div>
                                            <sup class="post_date"><?php the_field('post_date'); ?></sup>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                </div>
            </div>

        </main>
        <footer class="footer">

            <div class="container footer__content">
                <div class="footer__top">
                    <div class="footer__about">
                        <h3 class="footer__title"><?php the_field('footer_title'); ?></h3>
                        <p class="footer__text"><?php the_field('footer_text'); ?></p>
                        <div class="footer__contacts">
                            <div class="footer__row">
                                <sup class="footer__sub-text">Email:</sup>
                                <sup class="footer__email"><?php the_field('footer_email'); ?></sup>
                            </div>
                            <div class="footer__row">
                                <sup class="footer__sub-text">Phone:</sup>
                                <sup class="footer__phone"><?php the_field('footer_phone'); ?></sup>
                            </div>
                        </div>
                    </div>
        
                    <div class="footer__nav">
                        <div class="footer__quick-link">
                            <h3 class="footer__title">Quick Link</h3>
                            <div class="footer__links">
                                <?php wp_nav_menu([
                                    'theme_location' => 'bottom',
                                    'container' => null,
                                    'menu_class' => 'footer__menu',
                                    'title' => 'Quick Link',
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="footer__category">
                            <?php the_widget('WP_Widget_Categories', [
                                'title' => 'Category',
                            ]); ?>
                        </div>
                    </div>
        
        
                    <div class="newsletter">
                        <div class="newsletter__content">
                            <div class="newsletter__info">
                                <h3 class="newsletter__title">Weekly Newsletter</h3>
                                <p class="newsletter__text">Get blog articles and offers via email</p>
                            </div>
                            <div class="newsletter__form">
                                <div class="newsletter__email">
                                    <input type="email" class="newsletter__input" placeholder="Your Email">
                                </div>
                                <button class="newsletter__btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="footer__bottom">
                    <div class="footer__block">
                        <img src=" <?php the_field('footer_logo'); ?>" class="footer__logo" alt="">
                        <div class="footer__rights">
                            <div>
                                <sup class="footer__logo-text">Meta</sup><sup class="footer__bold">Blog</sup>
                            </div>
                            <sup class="footer__rights-text">© JS Template 2023. All Rights Reserved.</sup>
                        </div>
                    </div>
                    <div class="rights">
                        <div class="rights__items">
                            <div class="rights__item">Terms of Use</div>
                            <div class="rights__item">Privacy Policy</div>
                            <div class="rights__item">Cookie Policy</div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </div>
    <?php wp_footer(); ?>
</body>

</html>