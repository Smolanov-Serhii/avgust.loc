<?php
/* Template Name: Рецепты */

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <section class="recipes-single">
            <div class="recipes-single__container">
                <div class="recipes-single__header main-container">
                    <div class="about__marker">
                        <a href="<?php echo get_home_url() . '/products'; ?>">
                            <svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.21097 11L6.05729 10.1067L2.29119 6.13165L19 6.13165L19 4.86831L2.29119 4.86831L6.05729 0.893307L5.21097 1.20547e-06L-4.80823e-07 5.50002L5.21097 11Z" fill="#B78D41"/>
                            </svg>
                            Всі рецепти
                        </a>
                    </div>
                    <h1>
                        <?php echo the_field("zagolovok_stranycz", $post_id); ?>
                    </h1>
                </div>

                <div class="recipes__banner big-container">
                    <?php the_post_thumbnail();?>
                    <a href="<?php echo get_home_url() . '/products'; ?>" class="recipes__lnk rotation">
                        <img src="<?php echo get_template_directory_uri() . '/img/page-recipes/shtamp.svg' ?>" alt="center">
                    </a>
                </div>
                <div class="recipes-single__content main-container">
                    <?php echo the_field("opysanye_stranycz", $post_id); ?>
                </div>
                <div class="recipes-single__interest">
                    <?php
                    $post_objects = get_field('ynteresne_reczept');
                    if( $post_objects ): ?>
                        <?php foreach( $post_objects as $post): ?>
                            <?php setup_postdata($post); ?>
                            <?php
                            $postpers_id = get_the_ID();
                            $image = get_field('yzobrazhenye_na_stranycze', $postpers_id);
                            $name = get_field('zagolovok_stranycz', $postpers_id);
//                            $services = get_the_terms( $postpers_id, 'trenirovki' );
                            ?>

                            <a href="<?php the_permalink();?>" class="treners__similar-item swiper-slide">
                                <div class="specialists__item-image">
                                    <img src="<?php echo $image;?>">
                                </div>
                                <h3 class="specialists__item-name">
                                    <?php echo $name;?>
                                </h3>
<!--                                <div class="specialists__item-service">-->
<!--                                    --><?php
//                                    if( is_array( $services ) ){
//                                        foreach( $services as $service ){
//                                            echo '<span>' . $service->name . '</span>';
//                                        }
//                                    }
//                                    ?>
<!--                                </div>-->
                            </a>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                    <?php endif;

                    ?>
                </div>
            </div>
        </section>

	</main>

<?php

get_footer();

