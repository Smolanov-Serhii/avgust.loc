<?php
$post_id = get_the_ID();
?>
<section class="product">
    <div class="product__container main-container">
        <div class="product__header">
            <div class="product__name">
                <a href="<?php echo the_field('sslka_na_marker', $post_id) ?>" class="about__marker" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                    <?php echo the_field('tekst_markera', $post_id) ?>
                </a>
            </div>
            <h2 class="product__title section-title">
                <?php echo the_field('zagolovok_bloka_tovar_s_vydeo_1', $post_id) ?>
            </h2>
        </div>
        <div class="product__content">
            <div class="product__content-left">
                <?php
                $counter = 1;
                $post_objects = get_field('vberyte_try_tovara_dlya_otobrazhenyya', $post_id);
                if( $post_objects ): ?>
                    <?php foreach( $post_objects as $post): ?>
                        <?php setup_postdata($post); ?>
                        <?php
                        $postpers_id = get_the_ID();
                        $img = get_field('oblozhka_dlya_vydeo', $postpers_id);
                        $video = get_field('vydeo_fajl_mp4', $postpers_id);
                        if($counter == 1){
                            ?>
                            <a href="<?php the_permalink();?>" class="product__content-tl">
                                <video class="lazy lazy-video" autoplay muted loop playsinline poster="<?php echo $img;?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="200">
                                    <source data-src="<?php echo $video;?>" type="video/mp4">
                                </video>
                            </a>
                            <?php
                        }
                        if($counter == 2){
                            ?>
                            <a href="<?php the_permalink();?>" class="product__content-bl">
                                <video class="lazy lazy-video " autoplay muted loop playsinline poster="<?php echo $img;?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="400">
                                    <source data-src="<?php echo $video;?>" type="video/mp4">
                                </video>
                            </a>
                            <?php
                        }
                        $counter ++;
                        endforeach; ?>
                    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                <?php endif;
                ?>
            </div>
            <div class="product__content-right">
                <?php
                $counter = 1;
                $post_objects = get_field('vberyte_try_tovara_dlya_otobrazhenyya', $post_id);
                if( $post_objects ): ?>
                    <?php foreach( $post_objects as $post): ?>
                        <?php setup_postdata($post); ?>
                        <?php
                        $postpers_id = get_the_ID();
                        $img = get_field('oblozhka_dlya_vydeo', $postpers_id);
                        $video = get_field('vydeo_fajl_mp4', $postpers_id);
                        if($counter == 3){
                            ?>
                            <a href="<?php the_permalink();?>">
                                <video class="lazy lazy-video" autoplay muted loop playsinline poster="<?php echo $img;?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="700">
                                    <source data-src="<?php echo $video;?>" type="video/mp4">
                                </video>
                            </a>
                            <?php
                        }
                        $counter ++;
                    endforeach; ?>
                    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                <?php endif;
                ?>
                <div class="product__desc" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="900">
                    <p><?php echo the_field('opysanye_snyzu_pod_vydeo', $post_id) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>