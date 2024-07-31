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