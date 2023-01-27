<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package avgust
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<script>
    window.onload = function () {
        document.body.classList.add('loaded_hiding');
        window.setTimeout(function () {
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
        }, 2000);
    }
</script>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="preloader">
    <div class="news__button rotation">
        <img src="<?php echo get_template_directory_uri() . '/img/news/shtamp.svg' ?>" alt="center">
    </div>
</div>
<header id="header" class="header default">
    <div class="header__container big-container">
        <div class="header__logo">
            <?php
            the_custom_logo();
            ?>
        </div>
        <nav id="header__nav" class="header__nav">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main-menu',
                    'menu_id'        => 'main-menu',
                )
            );
            ?>
        </nav>
        <div class="header__search">
            <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">
                <div class="header__search-group">
                    <input type="search" class="form-control border-0" placeholder="<?php echo the_field('slovo_poysk', 'option') ?>" aria-label="search nico" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
                    <button>
                        <img class="content-company-2col__img" src="<?php echo get_template_directory_uri() . '/img/header/search.svg' ?>" alt="search">
                    </button>
                </div>
            </form>
        </div>
        <div class="header__right">
            <a class="header__phone" href="tel:<?php echo the_field('telefon', 'option') ?>">
                <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.789 0L12.9427 0.893305L16.7088 4.86835H0V6.13169H16.7088L12.9427 10.1067L13.789 11L19 5.49998L13.789 0Z" fill="#B78D41"/>
                </svg>
                <span><?php echo the_field('telefon', 'option') ?></span>
            </a>
            <div class="header__language">
                <?php
                qtranxf_generateLanguageSelectCode('dropdown');
                ?>
            </div>
        </div>
        <div class="header__burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
<div class="header__mob-menu">
    <nav id="header__nav" class="header__nav">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu_id'        => 'main-menu',
            )
        );
        ?>
    </nav>
    <div class="header__search">
        <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">
            <div class="header__search-group">
                <input type="search" class="form-control border-0" placeholder="Пошук" aria-label="search nico" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
                <button>
                    <img class="content-company-2col__img" src="<?php echo get_template_directory_uri() . '/img/header/search.svg' ?>" alt="search">
                </button>
            </div>
        </form>
    </div>
    <div class="header__right">
        <a class="header__phone" href="tel:<?php echo the_field('telefon', 'option') ?>">
            <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.789 0L12.9427 0.893305L16.7088 4.86835H0V6.13169H16.7088L12.9427 10.1067L13.789 11L19 5.49998L13.789 0Z" fill="#B78D41"/>
            </svg>
            <span><?php echo the_field('telefon', 'option') ?></span>
        </a>
        <div class="header__language">
            <?php
            qtranxf_generateLanguageSelectCode('text');
            ?>
        </div>
    </div>
</div>
