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