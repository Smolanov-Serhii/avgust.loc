<?php

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <section class="recipes-single">
            <div class="recipes-single__container">
                <div class="recipes-single__header main-container">
                    <div class="product__w50">
                        <a class="about__marker" href="<?php echo get_home_url() . '/products'; ?>">
                            <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.21097 11L6.05729 10.1067L2.29119 6.13165L19 6.13165L19 4.86831L2.29119 4.86831L6.05729 0.893307L5.21097 1.20547e-06L-4.80823e-07 5.50002L5.21097 11Z" fill="#B78D41"/>
                            </svg>
                            Всі рецепти
                        </a>
                    </div>
                    <h1 class="recipes-single__title section-title product__w50">
                        <?php echo the_field("zagolovok_stranycz", $post_id); ?>
                    </h1>
                </div>

                <div class="recipes__banner big-container">
                    <?php the_post_thumbnail();?>
                    <a href="<?php echo get_home_url() . '/products'; ?>" class="recipes__lnk rotation">
                        <img src="<?php echo get_template_directory_uri() . '/img/page-recipes/shtamp.svg' ?>" alt="center">
                    </a>
                </div>
                <div class="recipes-single__content main-container">
                    <div class="recipes-single__content-left product__w50">

                    </div>
                    <div class="recipes-single__content-right product__w50">
                        <div class="recipes-single__content-title block-title">
                            Вкусная начинка – вкусный <i>продукт</i>
                        </div>
                        <div class="recipes-single__content-column">
                            <?php echo the_field("opysanye_stranycz", $post_id); ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="interest recipes-single__interest">
            <div class="interest__container main-container">
                <div class="interest__header">
                    <h2 class="interest__title section-title">
                        Цікаві Рецепти
                    </h2>
                    <div class="interest__marker">
                        молочні термостабільні
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                        </svg>
                    </div>
                </div>
                <div class="interest__list">
                    <?php
                    $post_objects = get_field('ynteresne_reczept');
                    if( $post_objects ): ?>
                        <?php foreach( $post_objects as $post): ?>
                            <?php setup_postdata($post); ?>
                            <?php
                            $postpers_id = get_the_ID();
                            $image = get_field('kvadratne_zobrazhennya_dlya_czikavi_reczepty', $postpers_id);
                            $name = get_field('produkt_dlya_reczeptu', $postpers_id);
//                            $services = get_the_terms( $postpers_id, 'trenirovki' );
                            ?>
                            <div class="interest__item">
                                <div class="interest__item-image">
                                    <img src="<?php echo $image;?>" alt="<?php echo $name;?>">
                                </div>
                                <div class="interest__item-content">
                                    <h3 class="interest__item-title">
                                        <?php echo $name;?>
                                    </h3>
                                    <p class="interest__item-desc">
                                        Компанія август пропонує високоякісні інгредієнти власного виробництва для наступних галузей харчової промисловості:
                                    </p>
                                    <a href="<?php the_permalink();?>" class="interest__item-lnk">
                                        Читати далі
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                    <?php endif;
                    ?>
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

