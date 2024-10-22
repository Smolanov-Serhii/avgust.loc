<?php
/* Template Name: Рецепты */

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <section class="page-recipes interest">
            <div class="interest__container main-container">
                <div class="interest__header">
                    <h2 class="interest__title section-title">
                        <?php echo the_field('zagolovok_straniczy', 58) ?>
                    </h2>
                    <div class="interest__marker">
                        <?php echo do_shortcode('[searchandfilter id="495"]');?>
                    </div>
                </div>
                <div class="interest__list">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                            'post_type' => 'recipes',
                            'relation' => 'OR',
                            'posts_per_page' => 6,
                             'order' 	 => 'DESC',
                            'showposts' => "-1", //сколько показать статей
                            'search_filter_id' => 495, //сколько показать статей
                            'orderby' => "menu_order", //сортировка по дате
                            'caller_get_posts' => 1
                    );

                    $MY_QUERY = new WP_Query( $args );
                    if ( $MY_QUERY->have_posts() ) :
                        while ( $MY_QUERY->have_posts() ) : $MY_QUERY->the_post();
                            $postpers_id = get_the_ID();
                            $excerpt = get_field('kratkoe_opysanye_na_rozvodyashhuyu', $postpers_id);
                            $post_type = get_post_type( $postpers_id );
                            $visibleOn = get_field('otobrazhat_ly_na_stranycze_truefalse', $postpers_id);
                            if ($visibleOn != "false"){
                            ?>
                            <div class="interest__item">
                                <div class="interest__item-image">
                                    <img src="<?php echo the_field('kvadratne_zobrazhennya_dlya_czikavi_reczepty', $postpers_id) ?>" alt="<?php echo $excerpt;?>">
                                    <video class="lazy lazy-video" autoplay muted loop playsinline poster="<?php echo the_field("kartynka_v_banner", $post_id); ?>">
                                        <source data-src="<?php echo the_field("vydeo_na_razvodyashhuyu", $postpers_id); ?>" type="video/mp4">
                                    </video>
                                </div>
                                <div class="interest__item-content">
                                    <h3 class="interest__item-title">
                                        <?php the_title_excerpt('', '...', true, '40');?>
                                    </h3>
                                    <p class="interest__item-desc">
                                        <?php the_title_content('', '...', true, '200');?>
                                    </p>
                                    <a href="<?php the_permalink();?>" class="interest__item-lnk">
                                        <?php echo the_field('tekst_chitati_dali', 'option') ?>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <?php }
                            endwhile;
                    endif;
                    ?>
                    <div class="pagination">
                        <?php
                        $GLOBALS['wp_query']->max_num_pages = $MY_QUERY->max_num_pages;
                        the_posts_pagination(array(
                            'type'=>'inline',
                            'screen_reader_text' => __( '' ),
                            'end_size'     => 1,
                            'mid_size'     => 1,
                            'prev_next'    => True,
                            'prev_text'    => __('<'),
                            'next_text'    => __('>'),
                            'add_args'     => False
                        ));
                        ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

	</main>

<?php

get_footer();
