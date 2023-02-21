<section class="news">
    <div class="news__container main-container">
        <div class="news__header" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
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
                    'post_type' => 'news',
                    'showposts' => "6",
                    'orderby' => 'post_date',
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $postpers_id = get_the_ID();
                        $excerpt = get_field('kratkoe_opysanye_na_rozvodyashhuyu', $postpers_id);
                        $post_type = get_post_type( $postpers_id );
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
                                <?php
                                if($post_type == "news"){
                                    ?>
                                    <a href="<?php echo get_home_url() . '/news'; ?>" class="news__item-tag">
                                        <?php echo the_field('slovo_novosty', 'option') ?>
                                    </a>
                                    <?php
                                } else if ($post_type == "recipes"){
                                    ?>
                                    <a href="<?php echo get_home_url() . '/recipes'; ?>" class="news__item-tag">
                                        <?php echo the_field('slovo_reczept', 'option') ?>
                                    </a>
                                    <?php
                                }?>

                            </div>
                            <?php the_post_thumbnail('medium', array( 'class' => 'news__prev' ));?>
                        </li>

                    <?php }
                }
                wp_reset_query();
                $args = array(
                    'post_type' => 'recipes',
                    'showposts' => "6",
                    'orderby' => 'post_date',
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $postpers_id = get_the_ID();
                        $excerpt = get_field('kratkoe_opysanye_na_rozvodyashhuyu', $postpers_id);
                        $post_type = get_post_type( $postpers_id );
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
                                <?php
                                if($post_type == "news"){
                                    ?>
                                    <a href="<?php echo get_home_url() . '/news'; ?>" class="news__item-tag">
                                        <?php echo the_field('slovo_novosty', 'option') ?>
                                    </a>
                                    <?php
                                } else if ($post_type == "recipes"){
                                    ?>
                                    <a href="<?php echo get_home_url() . '/recipes'; ?>" class="news__item-tag">
                                        <?php echo the_field('slovo_reczept', 'option') ?>
                                    </a>
                                    <?php
                                }?>

                            </div>
                            <?php the_post_thumbnail('medium', array( 'class' => 'news__prev' ));?>
                        </li>

                    <?php }
                }
                wp_reset_query(); ?>
            </ul>
            <script>
                var ul = document.querySelector('.news__list');
                for (var i = ul.children.length; i >= 0; i--) {
                    ul.appendChild(ul.children[Math.random() * i | 0]);
                }
            </script>
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
