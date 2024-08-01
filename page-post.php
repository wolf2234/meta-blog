<?php
/*
Template Name: Post
Template Post Type: page, post
*/
?>
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
            <div class="container post-head">
                <?php $user = get_field("post_user"); ?>
                <sup class="post__sup-text"><?php the_field('sup_text'); ?></sup>
                <h1 class="post__title post-head__title_size"><?php the_title(); ?></h1>
                <div class="post__bottom">
                    <div class="post__user">
                        <?php echo $user['user_avatar']; ?>
                        <sup class="display_name"><?php echo $user['display_name']; ?></sup>
                    </div>
                    <sup class="post_date"><?php the_field('post_date'); ?></sup>
                </div>
            </div>


            <div class="container content">

                <?php the_post_thumbnail('large', [
                    'class' => 'content__img',
                ]); ?>

                <?php the_field('current_post'); ?>
            </div>
        </main>
        <?php include 'includes/footer.php' ?>
    </div>
    <?php wp_footer(); ?>
</body>

</html>