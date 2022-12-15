<?php

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <section class="products-single">
            <div class="products-single__container">
                <div class="products-single__header">
                    <div class="products-single__desc padding-left">
                        <a class="about__marker" href="<?php echo get_home_url() . '/products'; ?>">
                            <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.21097 11L6.05729 10.1067L2.29119 6.13165L19 6.13165L19 4.86831L2.29119 4.86831L6.05729 0.893307L5.21097 1.20547e-06L-4.80823e-07 5.50002L5.21097 11Z" fill="#B78D41"/>
                            </svg>
                            До каталогу
                        </a>
                        <h1 class="products-single__title section-title">
                            <?php echo the_field("zagolovok_produktu", $post_id); ?>
                        </h1>
                        <div class="products-single__list">
                            <?php echo the_field("perechen_typov", $post_id); ?>
                        </div>
                        <div class="products-single__sostav">
                            <?php
                            if( have_rows('sostav') ):
                                while( have_rows('sostav') ) : the_row();
                                    $name = get_sub_field('naymenovanye');
                                    $value = get_sub_field('kollychestvo_yly_opysanye');
                                    ?>
                                    <p class="products-single__sostav-item">
                                        <strong>
                                            <?php echo $name; ?>
                                        </strong>
                                        <?php echo $value; ?>
                                    </p>
                                <?php
                                endwhile;
                            else :
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="products-single__img">
                        <a href="<?php echo get_home_url() . '/products'; ?>" class="products-single__lnk rotation">
                            <img src="<?php echo get_template_directory_uri() . '/img/single-product/shtamp.svg' ?>" alt="center">
                        </a>
                        <?php
                        $image = get_field('yzobrazhenye_produkta');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-else">
            <div class="product-else__container main-container">
                <div class="product__w50">
                    <a href="" class="about__marker">
                        Про компанію
                    </a>
                </div>
                <div class="product-else__wrapper product__w50">
                    <h2 class="product__block-title block-title">
                        Смаки Наповнювачів з натуральними ягодами або фруктами
                    </h2>
                    <div class="product__block">
                        <?php
                        if( have_rows('perelik_smakiv') ):
                            while( have_rows('perelik_smakiv') ) : the_row();
                                $title = get_sub_field('nazva_produktu');
                                $img = get_sub_field('zobrazhennya_produktu');
                                $lnk = get_sub_field('posylannya_na_zapys');
                                ?>
                                <p class="product__block-item">
                                    <?php
                                        if($lnk){
                                            ?>
                                            <a href="#">
                                                <?php echo $title; ?>
                                            </a>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <?php echo $title; ?>
                                            <?php
                                        }
                                    ?>
                                </p>
                            <?php
                            endwhile;
                        else :
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-about">
            <div class="product-about__container main-container">
                <div class="product__w50">
                    <a href="" class="about__marker">
                        Про компанію
                    </a>
                </div>
                <div class="product-else__wrapper product__w50">
                    <h2 class="product__block-title block-title">
                        <?php echo the_field("zagolovok_opys_produktu", $post_id); ?>
                    </h2>
                    <div class="product-about__block product__block-column">
                        <?php echo the_field("opys_v_dvi_kolonky_opys_produktu", $post_id); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-bottom">
            <div class="product-bottom__container main-container">
                <h2 class="product-bottom__title">
                    <?php echo the_field("zagolovok_opys_vnyzu", $post_id); ?>
                </h2>
                <div class="product-bottom__wrapper">
                    <div class="product-bottom__block product__w50 product__block-column">
                        <?php echo the_field("opys_v_2_kolonky_opys_vnyzu", $post_id); ?>
                    </div>
                    <div class="product-bottom-pluses product__w50">
                        <?php echo the_field("perelik_perevag", $post_id); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="interest">
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
                    <div class="interest__item">
                        <div class="interest__item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/interest/img1.jpg' ?>" alt="Сирний наповнювач">
                        </div>
                        <div class="interest__item-content">
                            <h3 class="interest__item-title">
                                Сирний наповнювач
                            </h3>
                            <p class="interest__item-desc">
                                Компанія август пропонує високоякісні інгредієнти власного виробництва для наступних галузей харчової промисловості:
                            </p>
                            <a href="" class="interest__item-lnk">
                                Читати далі
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="interest__item">
                        <div class="interest__item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/interest/img2.jpg' ?>" alt="Сирний наповнювач">
                        </div>
                        <div class="interest__item-content">
                            <h3 class="interest__item-title">
                                Сирний наповнювач
                            </h3>
                            <p class="interest__item-desc">
                                Компанія август пропонує високоякісні інгредієнти власного виробництва для наступних галузей харчової промисловості:
                            </p>
                            <a href="" class="interest__item-lnk">
                                Читати далі
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="interest__item">
                        <div class="interest__item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/interest/img3.jpg' ?>" alt="Сирний наповнювач">
                        </div>
                        <div class="interest__item-content">
                            <h3 class="interest__item-title">
                                Сирний наповнювач
                            </h3>
                            <p class="interest__item-desc">
                                Компанія август пропонує високоякісні інгредієнти власного виробництва для наступних галузей харчової промисловості:
                            </p>
                            <a href="" class="interest__item-lnk">
                                Читати далі
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="interest__item">
                        <div class="interest__item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/interest/img4.jpg' ?>" alt="Сирний наповнювач">
                        </div>
                        <div class="interest__item-content">
                            <h3 class="interest__item-title">
                                Сирний наповнювач
                            </h3>
                            <p class="interest__item-desc">
                                Компанія август пропонує високоякісні інгредієнти власного виробництва для наступних галузей харчової промисловості:
                            </p>
                            <a href="" class="interest__item-lnk">
                                Читати далі
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular">
            <div class="popular__container full-container">
                <div class="popular__header main-container">
                    <div class="about__marker product__w50">
                        Про компанію
                    </div>
                    <h2 class="popular__title section-title product__w50">
                        популярна <i>продукція</i>
                    </h2>
                </div>
                <div class="popular__list swiper-container main-container">
                    <div class="popular__wrapper swiper-wrapper">
                        <div class="popular__item swiper-slide">
                            <a href="#">
                                <img class="popular__item-img" src="<?php echo get_template_directory_uri() . '/img/popular/img1.jpg' ?>" alt="Сирний наповнювач">
                                <h3 class="popular__item-title">Гелі для декорування (Декогелі)</h3>
                            </a>
                        </div>
                        <div class="popular__item swiper-slide">
                            <a href="#">
                                <img class="popular__item-img" src="<?php echo get_template_directory_uri() . '/img/popular/img2.jpg' ?>" alt="Сирний наповнювач">
                                <h3 class="popular__item-title">Гелі для декорування (Декогелі)</h3>
                            </a>
                        </div>
                        <div class="popular__item swiper-slide">
                            <a href="#">
                                <img class="popular__item-img" src="<?php echo get_template_directory_uri() . '/img/popular/img1.jpg' ?>" alt="Сирний наповнювач">
                                <h3 class="popular__item-title">Гелі для декорування (Декогелі)</h3>
                            </a>
                        </div>
                        <div class="popular__item swiper-slide">
                            <a href="#">
                                <img class="popular__item-img" src="<?php echo get_template_directory_uri() . '/img/popular/img2.jpg' ?>" alt="Сирний наповнювач">
                                <h3 class="popular__item-title">Гелі для декорування (Декогелі)</h3>
                            </a>
                        </div>
                        <div class="popular__item swiper-slide">
                            <a href="#">
                                <img class="popular__item-img" src="<?php echo get_template_directory_uri() . '/img/popular/img1.jpg' ?>" alt="Сирний наповнювач">
                                <h3 class="popular__item-title">Гелі для декорування (Декогелі)</h3>
                            </a>
                        </div>
                        <div class="popular__item swiper-slide">
                            <a href="#">
                                <img class="popular__item-img" src="<?php echo get_template_directory_uri() . '/img/popular/img2.jpg' ?>" alt="Сирний наповнювач">
                                <h3 class="popular__item-title">Гелі для декорування (Декогелі)</h3>
                            </a>
                        </div>
                    </div>
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







