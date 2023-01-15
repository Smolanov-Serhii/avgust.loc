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

	<footer id="footer" class="footer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
        <div class="footer__container big-container">
            <div class="footer__branding">
                <a class="footer__logo" href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri() . '/img/footer/logo.png'?>" alt="footer logo">
                </a>
                <p class="footer__desc">ТМ АВГУСТ — український виробник широкого асортименту харчових інгредієнтів для кондитерської, хлібопекарської, молочної промисловості та виробництва морозива.</p>
                <p class="footer__done">Розроблено в TH</p>
                <p class="footer__copyright">ТМ «Август». All right reserved. 2021</p>
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
                <a class="footer__phone footer__link" href="tel:+38 (099) 782-73-20">+38 (099) 782-73-20</a>
                <p>Пн - Пт 09:00 - 18:00</p>
                <a class="footer__mail footer__link" href="mailto:tm.avgust@gmail.com">tm.avgust@gmail.com</a>
                <p>61017, Україна, м. Харків, вул. Лозівська 5</p>
            </div>
        </div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
