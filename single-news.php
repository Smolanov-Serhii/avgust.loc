<?php

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <section class="recipes-single">
            <div class="recipes-single__container">
                <div class="recipes-single__header main-container">
                    <div class="product__w50">
                        <a class="about__marker" href="<?php echo get_home_url() . '/news'; ?>">
                            <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.21097 11L6.05729 10.1067L2.29119 6.13165L19 6.13165L19 4.86831L2.29119 4.86831L6.05729 0.893307L5.21097 1.20547e-06L-4.80823e-07 5.50002L5.21097 11Z" fill="#B78D41"/>
                            </svg>
                            <?php echo the_field('nadpis_vse_novosti', 75) ?>
                        </a>
                    </div>
                    <h1 class="recipes-single__title section-title product__w50">
                        <?php echo the_field("zagolovok_stranycz", $post_id); ?>
                    </h1>
                </div>
                <div class="recipes__banner big-container">
                    <img src="<?php echo the_field("yzobrazhenye_na_stranycze", $post_id)?>" alt="<?php echo the_field("zagolovok_stranycz", $post_id); ?>">
                </div>
                <div class="recipes-single__content main-container">
                    <div class="recipes-single__content-left product__w50">
                        <div class="media-soc-lnk">
                            <h2 class="block-title">
                                <?php echo the_field("nadpys_podelytsya", 'option')?>
                            </h2>
                            <!-- Facebook -->
                            <a target="_blank" rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri() . '/img/icons/fb.svg' ?>" alt="facebook">
                            </a>

                            <!-- Instagram -->
                            <a target="_blank" rel="nofollow" href="https://www.instagram.com/?url=<?php the_permalink(); ?>">

                                <img src="<?php echo get_template_directory_uri() . '/img/icons/insta.svg' ?>" alt="instagram">
                            </a>

                            <!-- Telegram -->
                            <a target="_blank" rel="nofollow" href="https://telegram.me/share/url?url=<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri() . '/img/icons/telefram.svg' ?>" alt="telegram">
                            </a>


                        </div>
                    </div>
                    <div class="recipes-single__content-right product__w50">
                        <div class="recipes-single__content-title block-title">
                            <?php echo the_field("produkt_dlya_reczeptu", $post_id); ?>
                        </div>
                        <div class="recipes-single__content-column recipes-single__first-block">
                            <?php echo the_field("opysanye_stranycz", $post_id); ?>
                        </div>
                        <?php
                            if (get_field("vtoroe_yzobrazhenye", $post_id)){
                                ?>
                                <img src="<?php echo the_field("vtoroe_yzobrazhenye", $post_id)?>" alt="<?php echo the_field("zagolovok_stranycz", $post_id); ?>">
                                <?php
                            }
                        ?>
                        <?php
                        if (get_field("sslka_na_yutub", $post_id)){
                            ?>
                            <div class="video-container">
                                <?php echo the_field("sslka_na_yutub", $post_id)?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="recipes-single__content-column">
                            <?php echo the_field("vtoroj_blok_opysanye", $post_id); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="news">
            <div class="news__container main-container">
                <div class="news__header">
                    <h2 class="news__title">
                        <?php echo the_field('nadpis_ostanni_novini', 75) ?>
                    </h2>
                    <div class="news__lnk">
                        <a href="<?php echo get_home_url() . '/news'; ?>" class="name-gold">
                            <?php echo the_field('nadpis_vse_novosti', 75) ?>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.2776 0.886461L7.27763 2.14809L12.8918 2.14812L0.437911 14.602L1.33005 15.4941L13.7839 3.04026L13.7839 8.65436L15.0455 8.65439L15.0455 0.886431L7.2776 0.886461Z" fill="#B78D41"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="news__content">
                    <ul class="news__list">
                        <?php
                        $args = array(
                            'post_type' => array(
                                'post_type' => 'news',
                                'showposts' => "5",
                            ),
                            'orderby' => "date",
                            'caller_get_posts' => 1);
                        $my_query = new wp_query($args);
                        if ($my_query->have_posts()) {
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                                $postpers_id = get_the_ID();
                                $excerpt = get_field('kratkoe_opysanye_na_rozvodyashhuyu', $postpers_id);
                                $post_type = get_post_type( $postpers_id );
                                ?>

                                <li class="news__item"  data-aos="fade-left" data-aos-duration="1000" data-aos-delay="600">
                                    <div class="news__item-inner">
                                        <h3 class="news__item-title">
                                            <a href="<?php the_permalink();?>">
                                                <?php the_title();?>
                                            </a>
                                        </h3>
                                        <div class="news__item-excerpt">
                                            <?php echo $excerpt;?>
                                        </div>
                                    </div>
                                    <div class="news__item-param">
                                        <div class="news__item-date">
                                            <?php the_date('d F');?>
                                        </div>
                                        <a href="<?php echo get_home_url() . '/news'; ?>" class="news__item-tag">
                                            <?php echo the_field('slovo_novosty', 'option') ?>
                                        </a>
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
                                <img src="<?php echo the_field('pechat_perejty_v_katalog', 'option') ?>" alt="center">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	</main>

<?php

get_footer();

