<?php
/* Template Name: Карьера */

get_header();
$post_id = get_the_ID();
?>

    <main id="main" class="main">

        <section class="banner">
            <div class="banner__lb banner_absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="1000">
                <div class="swiper-container mouse-parallax-bg" id="swiper__lb" data-xset="20" data-yset="20">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="<?php echo get_template_directory_uri() . '/img/banner/lb.jpg' ?>" alt="bottom">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__lt banner_absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="1200">
                <div class="swiper-container mouse-parallax-bg" id="swiper__lt" data-xset="15" data-yset="15">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="<?php echo get_template_directory_uri() . '/img/banner/lt.jpg' ?>" alt="top">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__rt banner_absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="1400">
                <div class="swiper-container mouse-parallax-bg" id="swiper__rt" data-xset="10" data-yset="10">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="<?php echo get_template_directory_uri() . '/img/banner/rt.jpg' ?>" alt="rt">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__button rotation">
                <a href="<?php echo get_home_url() . '/products'; ?>">
                    <img src="<?php echo get_template_directory_uri() . '/img/banner/button.svg' ?>" alt="center">
                </a>
            </div>
            <div class="banner__center" data-aos="zoom-out" data-aos-duration="1500" data-aos-delay="300">
                <div class="swiper-container mouse-parallax-bg" id="swiper__ct" data-xset="5" data-yset="5">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="<?php echo get_template_directory_uri() . '/img/banner/center.jpg' ?>" alt="center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__container main-container">
                <div class="banner__title" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="700">
                    <h1><span>А</span>вгус<span>т</span></h1>
                </div>
            </div>
            <div class="banner__desc" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="900">
                <?php echo the_field('opysanye_sprava', $post_id) ?>
            </div>
        </section>

        <section class="about">
            <div class="about__container main-container">
                <div class="about__left">
                    <div class="about__marker" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                        <?php echo the_field('nadpys_perevagy', $post_id) ?>
                    </div>
                </div>
                <div class="about__right">
                    <h2 class="about__title section-title">
                        <?php echo the_field('zagolovok_opysnanyya', $post_id) ?>
                    </h2>
                    <div class="product-about__block product__block-column">
                        <?php echo the_field('opysanye_stranycz', $post_id) ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="video">
            <div class="video__player">
                <img src="<?php echo the_field('bolshaya_kartynka_stranycz', $post_id) ?>" alt="center">
            </div>
        </section>
        <section class="vacancies">
            <div class="vacancies__container main-container">
                <h2 class="about__title section-title">
                    Вакансії
                </h2>
                <div class="vacancies__list">
                    <a href="#" class="vacancies__item" target="_blank">Оператор линии</a>
                    <a href="#" class="vacancies__item" target="_blank">Кондитеры</a>
                    <a href="#" class="vacancies__item" target="_blank">Пекари</a>
                    <a href="#" class="vacancies__item" target="_blank">Тестомесы</a>
                    <a href="#" class="vacancies__item" target="_blank">Лаборанты</a>
                    <a href="#" class="vacancies__item" target="_blank">Электрик</a>
                    <a href="#" class="vacancies__item" target="_blank">Слесарь КИПиА</a>
                    <a href="#" class="vacancies__item" target="_blank">Слесарь</a>
                    <a href="#" class="vacancies__item" target="_blank">Электрик</a>
                    <a href="#" class="vacancies__item" target="_blank">Слесарь-ремонтник</a>
                    <a href="#" class="vacancies__item" target="_blank">Грузчик</a>
                    <a href="#" class="vacancies__item" target="_blank">Менеджер по работе с национальными сетями</a>
                </div>
            </div>
            <div class="news__bottom">
                <div class="news__button rotation">
                    <a href="<?php echo get_home_url() . '/products'; ?>">
                        <img src="<?php echo get_template_directory_uri() . '/img/news/shtamp.svg' ?>" alt="center">
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php

get_footer();
