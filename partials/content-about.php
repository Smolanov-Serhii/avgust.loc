<?php
$post_id = get_the_ID();
?>
<section class="about">
    <div class="about__container main-container">
        <div class="about__left">
            <a href="<?php echo get_home_url() . '/russkij-kompaniya'; ?>" class="about__marker" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                <?php echo the_field('marker_pro_kompanyyu', $post_id) ?>
            </a>
        </div>
        <div class="about__right">
            <h2 class="about__title section-title">
                <?php echo the_field('zagolovok_pro_kompanyyu', $post_id) ?>
            </h2>
            <div class="about__desc">
                <div class="wrapper" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <?php echo the_field('levaya_kolonka_pro_kompanyyu', $post_id) ?>
                </div>
                <div class="wrapper" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                    <?php echo the_field('pravaya_kolonka_pro_kompanyyu', $post_id) ?>
                    <img src="<?php echo the_field('kartynka_dlya_bloka_pro_kompanyyu', $post_id) ?>" alt="center">
                </div>
            </div>
        </div>
    </div>
</section>