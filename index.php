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
            <div class="posts">
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
                                    <?php the_post_thumbnail('post-thumbnail'); ?> <br>
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