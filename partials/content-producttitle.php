<?php
$post_id = get_the_ID();
?>
<section class="producttitle">
    <div class="producttitle__container main-container">
        <a href="<?php echo the_field("ssylka_na_zagolovok", $post_id); ?>">
            <h2 class="producttitle__title big-title">
                <?php echo the_field("zaglovok_konditerska_hlibopekarska_molochna", $post_id); ?>
            </h2>
        </a>
        <div class="producttitle__content">
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
                            <a href="<?php the_permalink();?>" class="producttitle__tl producttitle__absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="500">
                                <video class="lazy lazy-video" autoplay muted loop playsinline poster="<?php echo $img;?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="200">
                                    <source data-src="<?php echo $video;?>" type="video/mp4">
                                </video>
                            </a>
                            <?php
                        }
                        if($counter == 2){
                            ?>
                            <a href="<?php the_permalink();?>" class="producttitle__br producttitle__absolute" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="500">
                                <video class="lazy lazy-video " autoplay muted loop playsinline poster="<?php echo $img;?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="400">
                                    <source data-src="<?php echo $video;?>" type="video/mp4">
                                </video>
                            </a>
                            <div class="producttitle__desc" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
                                <p>ТМ АВГУСТ — український виробник широкого асортименту харчових інгредієнтів для кондитерської, хлібопекарської, молочної промисловості та виробництва морозива.</p>
                                <p>Компанія була заснована в 1998 році як підприємство європейського зразка для випуску високоякісних інгредієнтів для харчової промисловості.</p>
                            </div>
                            <?php
                        }
                        $counter ++;
                    endforeach; ?>
                    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                <?php endif;
                ?>
            <div class="producttitle__image">
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
                            <a href="<?php the_permalink();?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="500">
                                <video class="lazy lazy-video" autoplay muted loop playsinline poster="<?php echo $img;?>" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="200">
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
                <div class="producttitle__button rotation">
                    <a href="<?php echo get_home_url() . '/products'; ?>">
                        <img src="<?php echo the_field('pechat_perejty_v_katalog', 'option') ?>" alt="center">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
