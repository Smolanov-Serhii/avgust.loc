<?php
/* Template Name: Главная страница */

get_header();
?>

	<main id="main" class="main">

        <?php get_template_part( 'partials/content', 'banner' ); ?>

        <?php get_template_part( 'partials/content', 'about' ); ?>

        <?php get_template_part( 'partials/content', 'video' ); ?>

        <?php get_template_part( 'partials/content', 'example' ); ?>


	</main>

<?php

get_footer();
