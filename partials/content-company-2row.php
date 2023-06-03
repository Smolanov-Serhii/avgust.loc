<?php
$post_id = get_the_ID();
?>
<section class="content-company-2row">
    <div class="content-company-2row__container main-container">
        <h2 class="content-company-2row__title big-title">
            <?php echo the_field("zagolovok_bloka_preimushhestva", $post_id); ?>
        </h2>
        <div class="content-company-2row__wrapper">
            <ul class="content-company-2row__list">
                <?php
                    $counter = 1;
                    if( have_rows('perechen_preimushhestv') ):
                        while( have_rows('perechen_preimushhestv') ) : the_row();
                            $title = get_sub_field('zagolovok_preimushhestva');
                            $content = get_sub_field('opisanie_preimushhestva');
                            ?>
                            <li class="content-company-2row__item">
                                <h3 class="content-company-2row__item-title">
                                    <?php echo $title;?>
                                </h3>
                                <p> <?php echo $content;?></p>
                            </li>
                            <?php
                            if ($counter == 2){
                                ?>
                                <div class="content-company-2row__item padding-left padding-right content-company-2row__item-else">
                                    <img class="content-company-2row__item-img" src="<?php echo the_field("verhnyaya_fotografiya", $post_id); ?>" alt="main">
                                </div>
                                <div class="content-company-2row__item padding-right content-company-2row__item-else">
                                    <img class="content-company-2row__item-img" src="<?php echo the_field("nizhnyaya_fotografiya", $post_id); ?>" alt="main">
                                </div>
                                <?php
                            }
                            $counter++;
                        endwhile;
                    endif;
                ?>
            </ul>
        </div>
        <div class="news__bottom">
            <div class="news__button rotation">
                <span class="js-modal-text">
                     <img src="<?php echo the_field('pechat_otpravit_zapros', 'option') ?>" alt="center">
                </span>
            </div>
        </div>
    </div>
</section>
