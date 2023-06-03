<?php
$post_id = get_the_ID();
?>
<section class="content-company-2col">
    <div class="content-company-2col__container">
        <h2 class="content-company-2col__title section-title main-container">
            <?php echo the_field("zagolovok_bloka_pochemu_my", $post_id); ?>
        </h2>
        <div class="content-company-2col__wrapper">
            <div class="content-company-2col__col padding-left">
                <?php echo the_field("opisanie_bloka_pochemu_my", $post_id); ?>
            </div>
            <div class="content-company-2col__col">
                <img class="content-company-2col__img" src="<?php echo the_field("kartinka_dlya_bloka_pochemu_my", $post_id); ?>" alt="main">
            </div>
        </div>
    </div>
</section>