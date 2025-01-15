<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avgust
 */

?>

<section class="no-results not-found">
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'avgust' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p class="section-title"><?php echo the_field('tekst_za_vashym_zapytom_nichogo_ne_znajdeno', 'option'); ?></p>
            <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">
                <div class="header__search-group">
                    <input type="search" class="form-control border-0" placeholder="Пошук" aria-label="search nico" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
                    <button>
                        <img class="content-company-2col__img" src="<?php echo get_template_directory_uri() . '/img/header/search.svg' ?>" alt="search">
                    </button>
                </div>
            </form>
			<?php
		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'avgust' ); ?></p>
        <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">
            <div class="header__search-group">
                <input type="search" class="form-control border-0" placeholder="Пошук" aria-label="search nico" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
                <button>
                    <img class="content-company-2col__img" src="<?php echo get_template_directory_uri() . '/img/header/search.svg' ?>" alt="search">
                </button>
            </div>
        </form>
			<?php


		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
