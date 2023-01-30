<?php
/* Template Name: Клієнтам */

get_header();
$post_id = get_the_ID();
?>
    <main id="main" class="main">
        <section class="page-clients">
            <div class="page-clients__banner main-container">
                <div class="page-clients__banner-container">
                    <h1 class="page-clients__title">
                        <?php echo the_field("zagolovok_bloka", $post_id); ?>
                    </h1>
                    <img class="main-img" src="<?php echo the_field("czentralnaya_kartinka", $post_id); ?>" alt="center">
                    <img class="right-img" src="<?php echo the_field("pravaya_kartinka", $post_id); ?>" alt="right">
                    <div class="banner__button rotation">
                        <a href="<?php echo get_home_url() . '/products'; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/banner/button.svg' ?>" alt="center">
                        </a>
                    </div>
                </div>
            </div>
            <div class="page-clients__table main-container">
                <h2 class="product__block-title block-title">
                    <?php echo the_field("zagolovok_osnovnye_gruppy", $post_id); ?>
                </h2>
                <div class="product__block">
                    <?php
                    if( have_rows('perechen_osnovnyh_grupp') ):
                        while( have_rows('perechen_osnovnyh_grupp') ) : the_row();
                            $title = get_sub_field('nazvanie_gruppy');
                            $img = get_sub_field('kartinka_gruppy');
                            $lnk = get_sub_field('ssylk_ana_produkt');
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
            <div class="page-clients__desc">
                <div class="news__bottom">
                    <div class="news__button rotation">
                        <a href="<?php echo get_home_url() . '/products'; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/news/shtamp.svg' ?>" alt="center">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php

get_footer();
