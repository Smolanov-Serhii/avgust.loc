<?php
/* Template Name: Карьера */

get_header();
$post_id = 112;
?>

    <main id="main" class="main">

        <section class="banner">
            <div class="banner__lb banner_absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="1000">
                <div class="swiper-container mouse-parallax-bg" id="swiper__lb" data-xset="20" data-yset="20">
                    <div class="swiper-wrapper">
                        <?php
                        if( have_rows('slajd' , $post_id) ):
                            while( have_rows('slajd', $post_id) ) : the_row();
                                $sub_img = get_sub_field('yzobrazhenye_slajda', $post_id);
                                $sub_alt = get_sub_field('opysanye_slajda', $post_id);
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $sub_img; ?>" alt="<?php echo $sub_alt; ?>">
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="banner__lt banner_absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="1200">
                <div class="swiper-container mouse-parallax-bg" id="swiper__lt" data-xset="15" data-yset="15">
                    <div class="swiper-wrapper">
                        <?php
                        if( have_rows('slajd', $post_id) ):
                            while( have_rows('slajd', $post_id) ) : the_row();
                                $sub_img = get_sub_field('yzobrazhenye_slajda', $post_id);
                                $sub_alt = get_sub_field('opysanye_slajda', $post_id);
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $sub_img; ?>" alt="<?php echo $sub_alt; ?>">
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="banner__rt banner_absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="1400">
                <div class="swiper-container mouse-parallax-bg" id="swiper__rt" data-xset="10" data-yset="10">
                    <div class="swiper-wrapper">
                        <?php
                        if( have_rows('slajd', $post_id) ):
                            while( have_rows('slajd', $post_id) ) : the_row();
                                $sub_img = get_sub_field('yzobrazhenye_slajda', $post_id);
                                $sub_alt = get_sub_field('opysanye_slajda', $post_id);
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $sub_img; ?>" alt="<?php echo $sub_alt; ?>">
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>
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
                        <?php
                        if( have_rows('slajd', $post_id) ):
                            while( have_rows('slajd', $post_id) ) : the_row();
                                $sub_img = get_sub_field('yzobrazhenye_slajda', $post_id);
                                $sub_alt = get_sub_field('opysanye_slajda', $post_id);
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $sub_img; ?>" alt="<?php echo $sub_alt; ?>">
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="banner__container main-container">
                <div class="banner__title" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="700">
                    <div class="wrapper">
                        <div class="white" style="background-image: url(<?php echo get_template_directory_uri() . '/img/banner/white.png' ?>)"><?php echo the_field('zagolovok_banera', $post_id) ?></div>
                        <h1><?php echo the_field('zagolovok_banera', $post_id) ?></h1>
                    </div>
                </div>
            </div>
            <div class="banner__desc" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="900">
                <p><?php echo the_field('opysanye_pod_banerom', $post_id) ?></p>
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
                    <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'order' 	 => 'DESC',
                        'post_type' 	 => 'vacancies',
                    );
                    $MY_QUERY = new WP_Query( $args );
                    if ( $MY_QUERY->have_posts() ) {
                        while ( $MY_QUERY->have_posts() ) : $MY_QUERY->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="vacancies__item" target="_blank"><?php the_title(); ?></a>
                        <?php endwhile;
                        } else {
                        ?>
                        <h2 class="no-vacancies"><?php echo the_field('nadpys_na_dannj_moment_net_svobodnh_vakansyj', 'options') ?></h2>
                        <?php
                        }
                    ?>
                </div>
            </div>
            <div class="news__bottom">
                <div class="news__button rotation">
                    <span class="js-modal-file">
                        <img src="<?php echo the_field('pechat_otpravit_zapros', 'option') ?>" alt="center">
                    </span>
                </div>
            </div>
        </section>
    </main>

<?php

get_footer();
