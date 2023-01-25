<?php

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <section class="recipes-single">
            <div class="recipes-single__container">
                <div class="recipes-single__header main-container">
                    <div class="product__w50">
                        <a class="about__marker" href="https://avgust.front-end-dev.com.ua/ru/novyny/">
                            <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.21097 11L6.05729 10.1067L2.29119 6.13165L19 6.13165L19 4.86831L2.29119 4.86831L6.05729 0.893307L5.21097 1.20547e-06L-4.80823e-07 5.50002L5.21097 11Z" fill="#B78D41"/>
                            </svg>
                            Всі новини
                        </a>
                    </div>
                    <h1 class="recipes-single__title section-title product__w50">
                        <?php echo the_field("zagolovok_stranycz", $post_id); ?>
                    </h1>
                </div>
                <div class="recipes__banner big-container">
                    <img src="<?php echo the_field("yzobrazhenye_na_stranycze", $post_id)?>" alt="<?php echo the_field("zagolovok_stranycz", $post_id); ?>">
                </div>
                <div class="recipes-single__content main-container">
                    <div class="recipes-single__content-left product__w50">

                    </div>
                    <div class="recipes-single__content-right product__w50">
                        <div class="recipes-single__content-title block-title">
                            <?php echo the_field("produkt_dlya_reczeptu", $post_id); ?>
                        </div>
                        <div class="recipes-single__content-column recipes-single__first-block">
                            <?php echo the_field("opysanye_stranycz", $post_id); ?>
                        </div>
                        <img src="<?php echo the_field("vtoroe_yzobrazhenye", $post_id)?>" alt="<?php echo the_field("zagolovok_stranycz", $post_id); ?>">
                        <div class="recipes-single__content-column">
                            <?php echo the_field("vtoroj_blok_opysanye", $post_id); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="news">
            <div class="news__container main-container">
                <div class="news__header">
                    <h2 class="news__title">
                        Останні <i>новини</i>
                    </h2>
                    <div class="news__lnk">
                        <a href="#" class="name-gold">
                            Всі новини
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="news__content">
                    <ul class="news__list">
                        <li class="news__item">
                            <h3 class="news__item-title">
                                <a href="#">Виробляємо великий асортимент</a>
                            </h3>
                            <div class="news__item-excerpt">
                                ТМ АВГУСТ — український виробник широкого асортименту харчових інгредієнтів...
                            </div>
                            <div class="news__item-param">
                                <div class="news__item-date">
                                    15 квітня
                                </div>
                                <div class="news__item-tag">
                                    Новини
                                </div>
                            </div>
                            <img class="news__prev" src="<?php echo get_template_directory_uri() . '/img/news/prev.jpg' ?>" alt="Виробляємо великий асортимент">
                        </li>
                        <li class="news__item">
                            <h3 class="news__item-title">
                                <a href="#">Асортимент</a>
                            </h3>
                            <div class="news__item-excerpt">
                                ТМ АВГУСТ — український виробник широкого асортименту харчових інгредієнтів...
                            </div>
                            <div class="news__item-param">
                                <div class="news__item-date">
                                    15 квітня
                                </div>
                                <div class="news__item-tag">
                                    Новини
                                </div>
                            </div>
                            <img class="news__prev" src="<?php echo get_template_directory_uri() . '/img/news/prev.jpg' ?>" alt="Виробляємо великий асортимент">
                        </li>
                        <li class="news__item">
                            <h3 class="news__item-title">
                                <a href="#">Ми виробляємо великий </a>
                            </h3>
                            <div class="news__item-excerpt">
                                ТМ АВГУСТ — український виробник широкого асортименту харчових інгредієнтів...
                            </div>
                            <div class="news__item-param">
                                <div class="news__item-date">
                                    15 квітня
                                </div>
                                <div class="news__item-tag">
                                    Новини
                                </div>
                            </div>
                            <img class="news__prev" src="<?php echo get_template_directory_uri() . '/img/news/prev.jpg' ?>" alt="Виробляємо великий асортимент">
                        </li>
                        <li class="news__item">
                            <h3 class="news__item-title">
                                <a href="#">Ми виробляємо великий асортимент</a>
                            </h3>
                            <div class="news__item-excerpt">
                                ТМ АВГУСТ — український виробник широкого асортименту харчових інгредієнтів...
                            </div>
                            <div class="news__item-param">
                                <div class="news__item-date">
                                    15 квітня
                                </div>
                                <div class="news__item-tag">
                                    Новини
                                </div>
                            </div>
                            <img class="news__prev" src="<?php echo get_template_directory_uri() . '/img/news/prev.jpg' ?>" alt="Виробляємо великий асортимент">
                        </li>
                        <li class="news__item">
                            <h3 class="news__item-title">
                                <a href="#">Великий асортимент</a>
                            </h3>
                            <div class="news__item-excerpt">
                                ТМ АВГУСТ — український виробник широкого асортименту харчових інгредієнтів...
                            </div>
                            <div class="news__item-param">
                                <div class="news__item-date">
                                    15 квітня
                                </div>
                                <div class="news__item-tag">
                                    Новини
                                </div>
                            </div>
                            <img class="news__prev" src="<?php echo get_template_directory_uri() . '/img/news/prev.jpg' ?>" alt="Виробляємо великий асортимент">
                        </li>
                    </ul>
                    <div class="news__bottom">
                        <div class="news__button rotation">
                            <a href="<?php echo get_home_url() . '/products'; ?>">
                                <img src="<?php echo get_template_directory_uri() . '/img/news/shtamp.svg' ?>" alt="center">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	</main>

<?php

get_footer();

