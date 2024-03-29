<?php
/* Template Name: Главная */

get_header();
$post_id = get_the_ID();
?>

	<main id="main" class="main">

        <?php get_template_part( 'partials/content', 'banner' ); ?>

        <?php get_template_part( 'partials/content', 'about' ); ?>

        <?php get_template_part( 'partials/content', 'video' ); ?>

        <?php get_template_part( 'partials/content', 'example' ); ?>

        <?php get_template_part( 'partials/content', 'product' ); ?>

        <?php get_template_part( 'partials/content', 'producttitle' ); ?>

        <?php get_template_part( 'partials/content', 'news' ); ?>


	</main>

<?php

get_footer();
