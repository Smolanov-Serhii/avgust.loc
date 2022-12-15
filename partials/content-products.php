<section class="products">
    <div class="products__container main-container">
        <div class="products__header">
            <h1 class="products__title section-title">
                Продукція
            </h1>
            <div class="products__filter name-gold">
                молочні термостабільні
                <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.4859 0.474609L14.5938 1.36674L18.5636 5.33655H0.951172V6.59822H18.5636L14.5938 10.568L15.4859 11.4601L20.9787 5.96735L15.4859 0.474609Z" fill="#B78D41"/>
                </svg>
            </div>
        </div>
        <div class="products__list">
            <?php
            if(have_posts()) : while(have_posts()) : the_post();
                ?>
                    <a href="<?php the_permalink();?>" class="products__item">
                    <span class="products__item-prev">
                        <img class="products__item-bg" src="<?php echo get_template_directory_uri() . '/img/products/item.jpg' ?>" alt="Гелі для декорування (Декогелі)">
                        <img class="products__item-shtamp" src="<?php echo get_template_directory_uri() . '/img/products/shtamp.svg' ?>" alt="Гелі для декорування (Декогелі)">
                    </span>
                        <h3 class="products__item-title"><?php the_title();?>></h3>
                    </a>
                <?php
            endwhile; endif;
            ?>

            <div class="products__item"></div>
            <div class="products__item products__item-desc">
                <span class="products__item-prev">
                    <div class="products__item-bg">
                        <p>Компанія август пропонує високоякісні інгредієнти власного виробництва для наступних галузей харчової промисловості:</p>
                    </div>
                </span>
            </div>
        </div>
        <h2 class="producttitle__title big-title">
            <span>Кондитерська</span>
            <span>Хлібопекарська</span>
            <span>Молочна</span>
        </h2>
    </div>
</section>