<?php
/* Template Name: Клієнтам */

get_header();
?>
    <main id="main" class="main">
        <section class="page-clients">
            <div class="page-clients__banner main-container">

            </div>
            <div class="page-clients__table main-container">
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
            <div class="page-clients__desc padding-left">
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
