<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package avgust
 */

get_header();
?>

	<main id="main" class="main page-search">
        <section class="news">
            <div class="news__container main-container">
                <div class="news__header" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                    <h2 class="news__title">
                        Пошук
                    </h2>
                </div>
                <div class="news__content">
                    <ul class="news__list">
                        <div class="search__container">
                            <?php if ( have_posts() ) : ?>
                                <h2 class="news__title">
                                    за вашим запитом <i>знайдено:</i>
                                </h2>
                                <?php
                                while ( have_posts() ) :
                                    the_post();
                                    get_template_part( 'template-parts/content', 'search' );
                                endwhile;
                                the_posts_navigation();
                            else :
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>
                        </div>
                    </ul>
                </div>
            </div>
        </section>
	</main>

<?php
get_footer();
