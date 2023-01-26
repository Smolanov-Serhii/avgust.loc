<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avgust
 */

?>

<li class="news__item"  data-aos="fade-left" data-aos-duration="1000" data-aos-delay="600">
    <h3 class="news__item-title">
        <a href="<?php the_permalink();?>"><?php the_title();?></a>
    </h3>
    <div class="news__item-excerpt">
        <?php the_excerpt();?>
    </div>
    <?php the_post_thumbnail('medium', array( 'class' => 'news__prev' ));?>
</li>
