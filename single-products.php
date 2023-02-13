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
                            <?php echo the_field("nadpis_v_katalog", 'option'); ?>
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
        <?php
            if(get_field('otobrazyt_blok_smaky', $post_id) == 'Да'){
               ?>
                <section class="product-else">
                    <div class="product-else__container main-container">
                        <div class="product__w50">
                            <a href="" class="about__marker">
                                <?php echo the_field("nadpis_sleva_ot_bloka", $post_id); ?>
                            </a>
                        </div>
                        <div class="product-else__wrapper product__w50">
                            <h2 class="product__block-title block-title">
                                <?php echo the_field("zagolovok_bloku_smaky", $post_id); ?>
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
                                                <a href="<?php echo $lnk; ?>">
                                                    <?php echo $title; ?>
                                                </a>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <?php echo $title; ?>
                                                <?php
                                            }
                                            if($img){
                                                ?>
                                                <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
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
               <?php
            }
        ?>
        <?php
        if(get_field('otobrazyt_blok_opysanye', $post_id) == 'Да'){
            ?>
                <section class="product-about">
                    <div class="product-about__container main-container">
                        <div class="product__w50">
                            <a href="" class="about__marker">
                                <?php echo the_field("zagolovok_bloku_smaky", $post_id); ?>
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
            <?php
        }
        ?>
            <?php
            if(get_field('fajl_video', $post_id)){
                ?>
                <section class="product-video main-container">
                    <div class="product-video__container">
                        <video autoplay="" muted="" loop="" id="myVideo">
                            <source src="<?php echo the_field('fajl_video', $post_id) ?>" type="video/mp4">
                        </video>
                    </div>
                </section>
                <?php
            }
            ?>
        <?php
            if(get_field('otobrazyt_opysanye_vnyzu', $post_id) == 'Да'){
               ?>
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
               <?php
            }
        ?>

        <?php
        if(get_field('otobrazyt_ynteresne_reczept', $post_id) == 'Да'){
            ?>
            <section class="interest">
                <div class="interest__container main-container">
                    <div class="interest__header">
                        <h2 class="interest__title section-title">
                            <?php echo the_field("zagolovok_interesnye_reczepty", $post_id); ?>
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
                        $post_objects = get_field('interesnye_reczepty_perechen', $post_id);
                        if( $post_objects ): ?>
                            <?php foreach( $post_objects as $post): ?>
                                <?php setup_postdata($post); ?>
                                <?php
                                $postpers_id = get_the_ID();
                                $image = get_field('kvadratne_zobrazhennya_dlya_czikavi_reczepty', $postpers_id);
                                $desc = get_field('kratkoe_opysanye_na_rozvodyashhuyu', $postpers_id);
                                ?>
                                <div class="interest__item">
                                    <div class="interest__item-image">
                                        <img src="<?php echo $image; ?>" alt="<?php the_title();?>">
                                    </div>
                                    <div class="interest__item-content">
                                        <h3 class="interest__item-title">
                                            <?php the_title();?>
                                        </h3>
                                        <p class="interest__item-desc">
                                            <?php echo $desc;?>
                                        </p>
                                        <a href="" class="interest__item-lnk">
                                            <?php echo the_field('tekst_chitati_dali', 'option') ?>
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
            </section>
            <?php
        }
        ?>
        <?php
        if(get_field('otoyurazyt_populyarne_produkt', $post_id) == 'Да'){
            ?>
            <section class="popular">
                <div class="popular__container full-container">
                    <div class="popular__header main-container">
                        <div class="about__marker product__w50">
                            <?php echo the_field("tekst_sleva_populyarnaya_produkcziya", $post_id); ?>
                        </div>
                        <h2 class="popular__title section-title product__w50">
                            <?php echo the_field("zagolovok_populyarnaya_produkcziya", $post_id); ?>
                        </h2>
                    </div>
                    <div class="popular__list swiper-container main-container">
                        <div class="popular__wrapper swiper-wrapper">
                            <?php
                            $post_objects = get_field('populyarnaya_produkcziya', $post_id);
                            if( $post_objects ): ?>
                                <?php foreach( $post_objects as $post): ?>
                                    <?php setup_postdata($post); ?>
                                    <?php
                                    $postpers_id = get_the_ID();
                                    $image = get_field('kartinka_na_rozvoryashhuyu_kvadratnaya', $postpers_id);
                                    ?>
                                    <div class="popular__item swiper-slide">
                                        <a href="<?php the_permalink();?>>">
                                            <img class="popular__item-img" src="<?php echo $image; ?>" alt="<?php the_title();?>">
                                            <h3 class="popular__item-title"><?php the_title();?></h3>
                                        </a>
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
            <?php
        }
        ?>
	</main>

<?php

get_footer();







