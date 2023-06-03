<?php
$post_id = get_the_ID();
?>
<section class="banner">
    <div class="banner__lb banner_absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="1000">
        <div class="swiper-container mouse-parallax-bg" id="swiper__lb" data-xset="20" data-yset="20">
            <div class="swiper-wrapper">
                <?php
                if( have_rows('slajd') ):
                    while( have_rows('slajd') ) : the_row();
                        $sub_img = get_sub_field('yzobrazhenye_slajda');
                        $sub_alt = get_sub_field('opysanye_slajda');
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
                if( have_rows('slajd') ):
                    while( have_rows('slajd') ) : the_row();
                        $sub_img = get_sub_field('yzobrazhenye_slajda');
                        $sub_alt = get_sub_field('opysanye_slajda');
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
                if( have_rows('slajd') ):
                    while( have_rows('slajd') ) : the_row();
                        $sub_img = get_sub_field('yzobrazhenye_slajda');
                        $sub_alt = get_sub_field('opysanye_slajda');
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
            <img src="<?php echo the_field('pechat_perejty_v_katalog', 'option') ?>" alt="center">
        </a>
    </div>
    <div class="banner__center" data-aos="zoom-out" data-aos-duration="1500" data-aos-delay="300">
        <div class="swiper-container mouse-parallax-bg" id="swiper__ct" data-xset="5" data-yset="5">
            <div class="swiper-wrapper">
                <?php
                if( have_rows('slajd') ):
                    while( have_rows('slajd') ) : the_row();
                        $sub_img = get_sub_field('yzobrazhenye_slajda');
                        $sub_alt = get_sub_field('opysanye_slajda');
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
