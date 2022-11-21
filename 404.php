<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package avgust
 */

get_header();
?>

	<main id="main" class="main">
		<section class="page-404">
            <img class="page-404__tr" src="<?php echo get_template_directory_uri() . '/img/page-404/tr.jpg' ?>" alt="page-404">
            <img class="page-404__bc" src="<?php echo get_template_directory_uri() . '/img/page-404/bc.jpg' ?>" alt="page-404">
            <img class="page-404__tl" src="<?php echo get_template_directory_uri() . '/img/page-404/tl.jpg' ?>" alt="page-404">
            <img class="page-404__bl" src="<?php echo get_template_directory_uri() . '/img/page-404/bl.jpg' ?>" alt="page-404">
            <h1 class="page-404__title">404</h1>
            <p>Нажаль такої сторінки не існує... Вас буде автоматично перенаправлено на <a href="<?php echo get_home_url(); ?>">Головну</a> сторінку через <span>5</span> секунд.</p>
            <div class="page-404__bottom">
                <div class="page-404__button rotation">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri() . '/img/page-404/shtamp.svg' ?>" alt="center">
                    </a>
                </div>
            </div>
		</section>
	</main>

<?php
get_footer();
