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
	</main>

<?php

get_footer();







