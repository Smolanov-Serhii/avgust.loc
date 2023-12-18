<?php
/* Template Name: Контакты */

get_header();

$post_id = get_the_ID();

?>

    <main id="main" class="main">

        <section class="page-contacts">
            <div class="page-contacts__container main-container">
                <div class="page-contacts__form">
                    <?php echo do_shortcode('[contact-form-7 id="5" title="Форма Контакты"]');?>
                </div>
                <div class="page-contacts__columns">
                    <?php
                    $counter = 1;
                    if( have_rows('perechen_kontaktov') ):
                        while( have_rows('perechen_kontaktov') ) : the_row();
                            $title = get_sub_field('zagolovok_kontakta');
                            $content = get_sub_field('opysanye_kontakta');
                            $phone = get_sub_field('nomer_kontakta');
                            $soc = get_sub_field('mesendzher');
                            $mail = get_sub_field('pochta');
                            if ($counter % 2 <> 0) {
                                echo '<div class="page-contacts__row">';
                            }
                            ?>
                                <div class="page-contacts__column">
                                    <h3 class="page-contacts__title">
                                        <?php echo $title?>
                                    </h3>
                                    <?php
                                    if($content){
                                        ?>
                                            <p class="page-contacts__desc" style="font-style: italic;"><?php echo $content?></p>
                                        <?php
                                    }
                                    ?>
                                    <a class="page-contacts__tel" href="tel:<?php echo $phone?>" style="font-style: italic;"><?php echo $phone . $soc?></a>
                                    <a class="page-contacts__mail" href="mailto:<?php echo $mail?>" style="font-style: italic;"><?php echo $mail?></a>
                                </div>
                        <?php
                        if ($counter % 2 === 0) {
                            echo '</div>';
                        }
                            $counter ++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <section class="map">
            <div class="map__container big-container">
                <div class="map__title">
                    <?php echo the_field("adress", $post_id); ?>
                </div>
                <div class="map__map" id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.0185791058857!2d36.20335331643259!3d50.01100697941698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a116eaf6cb07%3A0x2ef9eed093c80d7c!2z0JvQvtC30L7QstGB0LrQsNGPINGD0LsuLCA1LCDQpdCw0YDRjNC60L7Qsiwg0KXQsNGA0YzQutC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNjEwMDA!5e0!3m2!1sru!2sua!4v1669565879476!5m2!1sru!2sua" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>

<?php

get_footer();
