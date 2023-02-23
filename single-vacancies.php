<?php

get_header();
$post_id = get_the_ID();
?>

    <main id="main" class="main">

        <section class="products-single">
            <div class="products-single__container">
                <div class="products-single__header">
                    <div class="products-single__desc padding-left">
                        <a class="about__marker" href="<?php echo get_home_url() . '/vacancies'; ?>">
                            <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.21097 11L6.05729 10.1067L2.29119 6.13165L19 6.13165L19 4.86831L2.29119 4.86831L6.05729 0.893307L5.21097 1.20547e-06L-4.80823e-07 5.50002L5.21097 11Z" fill="#B78D41"/>
                            </svg>
                            <?php echo the_field("nadpis_k_vakansiyam", 'option'); ?>
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
                        <?php
                        $image = get_field('yzobrazhenye_produkta');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo get_home_url() . '/products'; ?>" class="products-single__lnk rotation">
                        <img src="<?php echo get_template_directory_uri() . '/img/single-product/shtamp.svg' ?>" alt="center">
                    </a>
                </div>
            </div>
        </section>
        <?php
        if( have_rows('opysanye_vakansyy') ):
            while( have_rows('opysanye_vakansyy') ) : the_row();
                $marker = get_sub_field('nazvanye_bloka_opysanyya');
                $title = get_sub_field('zagolovok_v_opysanyy');
                $desc = get_sub_field('polnoe_opysanye_bloka');
                ?>
                <section class="product-about">
                    <div class="product-about__container main-container">
                        <div class="product__w50">
                            <div class="about__marker">
                                <?php echo $marker; ?>
                            </div>
                        </div>
                        <div class="product-else__wrapper product__w50">
                            <h2 class="product__block-title block-title">
                                <?php echo $title; ?>
                            </h2>
                            <div class="product-about__block">
                                <?php echo $desc; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            endwhile;
        else :
        endif;
        ?>
        <section class="vacancies">
            <div class="vacancies__container main-container">
                <h2 class="about__title section-title">
                    Інші вакансії
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
                            <a href="<?php the_permalink(); ?>" class="vacancies__item"><?php the_title(); ?></a>
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







