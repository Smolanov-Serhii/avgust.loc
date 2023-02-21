<section class="video">
    <div class="video__player">
        <?php
            if(get_field('vydeo_fajl', $post_id)){
                ?>
                    <video autoplay="" muted="" loop="" id="myVideo">
                        <source src="<?php echo the_field('vydeo_fajl', $post_id) ?>" type="video/mp4">
                    </video>
                <?php
            } else {
                ?>
                <img src="<?php echo the_field('oblozhka_vmesto_vydeo', $post_id) ?>" alt="center">
                <?php
            }
        ?>
        <a href="<?php echo get_home_url() . '/products'; ?>" class="video__play rotation">
            <img src="<?php echo the_field('pechat_perejty_v_katalog', 'option') ?>" alt="center">
        </a>
    </div>
</section>
