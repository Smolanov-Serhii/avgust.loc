<?php
    $post_id = get_the_ID();
?>
<section class="content-header">
    <div class="content-header__container main-container">
        <div class="content-header__top">
            <h1 class="content-header__title main-title" style="background-image: url('<?php echo get_template_directory_uri() . '/img/content-header/white.jpg' ?>')">
                <?php echo the_field("zagolovok_v_baner", $post_id); ?>
            </h1>
            <div class="content-header__image">
                <a class="content-header__button rotation" href="<?php echo get_home_url() . '/products'; ?>">
                    <img class="content-header__image-shtamp" src="<?php echo the_field('pechat_perejty_v_katalog', 'option') ?>" alt="main">
                </a>
                <?php
                    if (get_field("vydeo_esly_est", $post_id)){
                        ?>
                            <div class="content-header__image-main">
                                <video class="lazy lazy-video" autoplay muted loop playsinline poster="<?php echo the_field("kartynka_v_banner", $post_id); ?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="200">
                                    <source data-src="<?php echo the_field("vydeo_esly_est", $post_id); ?>" type="video/mp4">
                                </video>
                            </div>
                        <?php
                    } else {
                        ?>
                        <div class="content-header__image-main">
                            <img src="<?php echo the_field("kartynka_v_banner", $post_id); ?>" alt="main">
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="content-header__bottom">
            <div class="content-header__bottom-image">
                <div class="wrapper">
                    <?php
                    if (get_field("vydeo_esly_est", $post_id)){
                        ?>
                        <video class="lazy lazy-video" autoplay muted loop playsinline poster="<?php echo the_field("malenkoe_foto_sleva", $post_id); ?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="200">
                            <source data-src="<?php echo the_field("mklenkoe_vydeo_sleva", $post_id); ?>" type="video/mp4">
                        </video>
                        <?php
                    } else {
                        ?>
                        <div class="content-header__image-main">
                            <img src="<?php echo the_field("malenkoe_foto_sleva", $post_id); ?>" alt="small">
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="about__desc">
                <?php echo the_field("opysanye_bloka_baner", $post_id); ?>
                <p><img src="<?php echo get_template_directory_uri() . '/img/about/about-digits.svg' ?>" alt="center"></p>
            </div>
        </div>
    </div>
</section>