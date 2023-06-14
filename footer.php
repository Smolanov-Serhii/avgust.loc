<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package avgust
 */

?>
	<footer id="footer" class="footer">
        <div class="footer__container big-container">
            <div class="footer__branding">
                <a class="footer__logo" href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri() . '/img/footer/logo.png'?>" alt="footer logo">
                </a>
                <p class="footer__desc"><?php echo the_field('opysanye_v_futere', 'option'); ?></p>
                <p class="footer__done"><?php echo the_field('nadpys_rozrobleno_v_th', 'option'); ?></p>
                <p class="footer__copyright"><?php echo the_field('nadpys_tm_avgust_all_right_reserved', 'option'); ?> <?php echo date('Y'); ?></p>
            </div>
            <nav class="footer__nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu',
                    )
                );
                ?>
            </nav>
            <div class="footer__contacts">
                <a class="footer__phone footer__link" href="tel:<?php echo the_field('telefon', 'option'); ?>"><?php echo the_field('telefon', 'option') ?></a>
                <p><?php echo the_field('grafyk_rabot', 'option') ?></p>
                <a class="footer__mail footer__link" href="mailto:<?php echo the_field('e-mail', 'option'); ?>"><?php echo the_field('e-mail', 'option') ?></a>
                <p><?php echo the_field('adress', 'option') ?></p>
            </div>
        </div>
        <div class="footer__fade" style="display: none">
            <div class="footer__fade-modal" id="modal-text" style="display: none">
                <div class="footer__fade-container">
                    <div class="modal-close">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8984 1L0.999584 16.8989" stroke="black" stroke-width="1.3" stroke-linecap="square"/>
                            <path d="M1 1L16.8989 16.8989" stroke="black" stroke-width="1.3" stroke-linecap="square"/>
                        </svg>
                    </div>
                    <div class="modal-text">
                        <?php echo do_shortcode( '[contact-form-7 id="383" title="Заявка"]' ); ?>
                    </div>
                </div>
            </div>
            <div class="footer__fade-modal" id="modal-file" style="display: none">
                <div class="footer__fade-container">
                    <div class="modal-close">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8984 1L0.999584 16.8989" stroke="black" stroke-width="1.3" stroke-linecap="square"/>
                            <path d="M1 1L16.8989 16.8989" stroke="black" stroke-width="1.3" stroke-linecap="square"/>
                        </svg>
                    </div>
                    <div class="modal-text">
                        <?php echo do_shortcode( '[contact-form-7 id="388" title="Заявка с файлом"]' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="success-send" id="success-send" style="display: none">
            <div class="success-send__container">
                Сообщение отправлено
            </div>
        </div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
