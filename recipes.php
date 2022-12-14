<?php
/* Template Name: Рецепты */

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <section class="recipes">
            <div class="recipes__container main-container">
                <h1>
                    <?php echo the_field("zagolovok_stranycz", $post_id); ?>
                </h1>
                <div class="recipes__banner">
                    <?php the_post_thumbnail();?>
                    <a href="<?php echo get_home_url() . '/products'; ?>" class="recipes__lnk rotation">
                        <img src="<?php echo get_template_directory_uri() . '/img/page-recipes/shtamp.svg' ?>" alt="center">
                    </a>
                </div>
            </div>
        </section>

	</main>

<?php

get_footer();
