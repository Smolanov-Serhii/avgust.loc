<?php
/* Template Name: Новини */
global $post;
get_header();
?>

    <main id="main" class="main">

        <section class="news">
            <div class="news__container main-container">
                <div class="news__header">
                    <h2 class="news__title">
                        <?php echo the_field('nadpis_ostanni_novini', 75) ?>
                    </h2>
                    <div class="news__lnk">
                        <?php echo do_shortcode('[searchandfilter id="373"]');?>
                    </div>
                </div>
                <div class="news__content">
                    <ul class="news__list" id="news">
                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'relation' => 'OR',
                            'showposts' => "-1", //сколько показать статей
                            'search_filter_id' => 373, //сколько показать статей
                            'orderby' => "menu_order", //сортировка по дате
                            'caller_get_posts' => 1);

                        $my_query = new wp_query($args);
                        if ($my_query->have_posts()) {
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                                $postpers_id = get_the_ID();
                                $category = get_the_terms( $postpers_id, 'news-category' );
                                $image = get_field('kartinka_na_rozvoryashhuyu_kvadratnaya', $postpers_id);
                                ?>

                                <li class="news__item"  data-aos="fade-left" data-aos-duration="1000" data-aos-delay="600">
                                    <h3 class="news__item-title">
                                        <a href="<?php the_permalink();?>">
                                            <?php the_title();?>
                                        </a>
                                    </h3>
                                    <div class="news__item-excerpt">
                                        <?php echo $excerpt;?>
                                    </div>
                                    <div class="news__item-param">
                                        <div class="news__item-date">
                                            <?php the_date('d F');?>

                                        </div>
                                        <span class="news__item-tag">
                                            <?php
                                            if( is_array( $category ) ){
                                                foreach( $category as $service ){
                                                    echo '<span>' . $service->name . '</span>';
                                                }
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <?php the_post_thumbnail('medium', array( 'class' => 'news__prev' ));?>
                                </li>

                            <?php }
                        }
                        wp_reset_query(); ?>
                    </ul>
                    <div class="news__bottom">
                        <div class="news__button rotation">
                            <a href="<?php echo get_home_url() . '/products'; ?>">
                                <img src="<?php echo get_template_directory_uri() . '/img/news/shtamp.svg' ?>" alt="center">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php

get_footer();