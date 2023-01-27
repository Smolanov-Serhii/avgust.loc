<?php
    $post_id = get_the_ID();
?>
<section class="products">
    <div class="products__container main-container">
        <div class="products__header">
            <h1 class="products__title section-title">
                <?php echo the_field('zagolovok_straniczy', 17) ?>
            </h1>
            <div class="products__filter name-gold">
                молочні термостабільні
                <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.4859 0.474609L14.5938 1.36674L18.5636 5.33655H0.951172V6.59822H18.5636L14.5938 10.568L15.4859 11.4601L20.9787 5.96735L15.4859 0.474609Z" fill="#B78D41"/>
                </svg>
            </div>
        </div>
        <div class="products__form">
            <?php echo do_shortcode('[searchandfilter id="137"]');?>
        </div>
        <div class="products__list" id="result">
            <?php
            $args = array(
                'post_type' => 'product',
                'relation' => 'OR',
                'showposts' => "-1", //сколько показать статей
                'search_filter_id' => 137, //сколько показать статей
                'orderby' => "menu_order", //сортировка по дате
                'caller_get_posts' => 1);
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    $postpers_id = get_the_ID();
                    $image = get_field('fotografiya_dlya_straniczy_vseh_trenerov', $postpers_id);
                    $name = get_field('imya_speczialista', $postpers_id);
                    $services = get_the_terms( $postpers_id, 'trenirovki' );
                    $dopimg = get_field( 'fotografiya_speczialista' );
                    $secondimg = $dopimg[0]["fotografiya_speczialista"];
                    ?>

                    <a href="<?php the_permalink();?>" class="products__item">
                    <span class="products__item-prev">
                        <img class="products__item-bg" src="<?php echo get_template_directory_uri() . '/img/products/item.jpg' ?>" alt="<?php the_title();?>">
                        <img class="products__item-shtamp" src="<?php echo get_template_directory_uri() . '/img/products/shtamp.svg' ?>" alt="<?php the_title();?>">
                    </span>
                        <h3 class="products__item-title"><?php the_title();?></h3>
                    </a>

                <?php }
            }
            wp_reset_query(); ?>
<!--            <div class="products__item add-item"></div>-->
            <div class="products__item products__item-desc">
                <span class="products__item-prev">
                    <div class="products__item-bg">
                        <p><?php echo the_field('opisanie_bloka_posle_produktov', 17) ?></p>
                    </div>
                </span>
            </div>
        </div>
        <h2 class="producttitle__title big-title">
            <?php echo the_field('bolshoj_zagolovok_snizu', 17) ?>
        </h2>
    </div>
    <div class="news__bottom">
        <div class="news__button rotation">
            <a href="<?php echo get_home_url() . '/products'; ?>">
                <img src="<?php echo get_template_directory_uri() . '/img/news/shtamp.svg' ?>" alt="center">
            </a>
        </div>
    </div>
</section>