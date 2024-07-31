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
            <h2 class="post__title"><?php the_title(); ?></h2>
        </main>
        <?php include 'includes/footer.php' ?>
    </div>
    <?php wp_footer(); ?>
</body>

</html>