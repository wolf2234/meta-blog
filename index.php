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
        <?php include 'includes/header.php';?>

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
                            'numberposts' => -1,
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
                                        $p = get_post($post);
                                        $url = get_site_url();
                                    ?>
                                    <a href=<?php echo $url . "/" . $p->post_name; ?> class="post__link">
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('thumbnail',[
                                                    'class' => 'post__img',
                                                ]); 
                                            } else {
                                                echo "<img src='" . get_template_directory_uri() ."/assets/img/no-image.png' . alt=''>";
                                            } 
                                        ?>
                                        <div class="post__block">
                                            <sup class="post__sup-text post__sup-text_color"><?php the_field('sup_text'); ?></sup>
                                            <h2 class="post__title"><?php the_title(); ?></h2>
                                            <div class="post__bottom">
                                                <div class="post__user">
                                                    <?php echo $user['user_avatar']; ?>
                                                    <sup class="display_name"><?php echo $user['display_name']; ?></sup>
                                                    <sup class="post_date"><?php the_field('post_date'); ?></sup>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php
                        }
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="post__button"><button class="load">load more</button></div>
            </div>
        </main>
        <?php include 'includes/footer.php' ?>
    </div>
    <?php wp_footer(); ?>
</body>

</html>