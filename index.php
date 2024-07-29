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
                <div class="slider__item">
                    <img src="<?php echo the_field('slider_image'); ?>" class="slider__img" alt="">
                    <div class="slider__block">
                        <?php
                            $user = get_field("post_user");
                        ?>
                        <?php the_field('sup_text'); ?> <br>
                        <?php the_field('slider_title'); ?> <br>
                        <?php echo $user['user_avatar']; ?> <br>
                        <?php echo $user['display_name']; ?> <br>
                        <?php the_field('post_date'); ?>
                    </div>
                </div>
                <div class="slider__item">
                    <img src="<?php echo the_field('slider_image'); ?>" class="slider__img" alt="">
                </div>
                <div class="slider__item">
                    <img src="<?php echo the_field('slider_image'); ?>" class="slider__img" alt="">
                </div>
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

    </div>
    <?php wp_footer(); ?>
</body>

</html>