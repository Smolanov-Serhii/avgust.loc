$(document).ready(function () {

    var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

    if ("IntersectionObserver" in window) {
        var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(video) {
                if (video.isIntersecting) {
                    for (var source in video.target.children) {
                        var videoSource = video.target.children[source];
                        if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                            videoSource.src = videoSource.dataset.src;
                        }
                    }

                    video.target.load();
                    video.target.classList.remove("lazy");
                    lazyVideoObserver.unobserve(video.target);
                }
            });
        });

        lazyVideos.forEach(function(lazyVideo) {
            lazyVideoObserver.observe(lazyVideo);
        });
    }

    var $menu = $("#header");
    $(window).scroll(function() {
        var winScrollTop = $(this).scrollTop();
               if ( $(this).scrollTop() > 100 && $menu.hasClass("default")){
            $menu.removeClass("default").addClass("moved");
        } else if($(this).scrollTop() <= 100 && $menu.hasClass("moved")) {
            $menu.removeClass("moved").addClass("default");
        }
    });

    $('#qtranxs_select_qtranslate-chooser').selectric();
    if ($('.news__lnk, .page-recipes').length) {
        $('.news__lnk select, .page-recipes select').selectric();
        $( ".news__lnk select, .page-recipes select" )
            .on( "change", function() {
                $( ".sf-field-submit input" ).trigger( "click" );
                $('.news__lnk select, .page-recipes select').selectric();
            } )
    }


    if ($('section.banner').length) {
        var SwiperLb = new Swiper("#swiper__lb", {
            slidesPerView: 1,
            loop: true,
            spaceBetween: 20,
            initialSlide: 2,
            speed: 600,
            autoplay: {
                delay: 5000,
            },
        });
        var SwiperLt = new Swiper("#swiper__lt", {
            slidesPerView: 1,
            loop: true,
            spaceBetween: 20,
            initialSlide: 3,
            speed: 600,
            noSwiping: true,
            allowTouchMove: false,
            autoplay: {
                delay: 5000,
            },
        });
        var Swiperrt = new Swiper("#swiper__rt", {
            slidesPerView: 1,
            loop: true,
            spaceBetween: 20,
            initialSlide: 4,
            speed: 600,
            noSwiping: true,
            allowTouchMove: false,
            autoplay: {
                delay: 5000,
            },
        });
        var Swiperct = new Swiper("#swiper__ct", {
            slidesPerView: 1,
            loop: true,
            spaceBetween: 20,
            speed: 600,
            noSwiping: true,
            allowTouchMove: false,
            autoplay: {
                delay: 5000,
            },
        });
        let bg = document.querySelectorAll('.mouse-parallax-bg');
        for (let i = 0; i < bg.length; i++){
            let xpos = $(bg[i]).data('xset');
            let ypos = $(bg[i]).data('yset');
            window.addEventListener('mousemove', function(e) {
                let x = e.clientX / window.innerWidth;
                let y = e.clientY / window.innerHeight;
                bg[i].style.transform = 'translate(-' + x * xpos + 'px, -' + y * ypos + 'px)';
            });
        }
    }

    if ($('.recipes-single').length) {
        var SwiperBanner = new Swiper(".recipes__banner .swiper-container", {
            slidesPerView: 1,
            loop: false,
            spaceBetween: 20,
            pagination: {
                el: ".recipes-single .swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.recipes-single .swiper-button-next',
                prevEl: '.recipes-single .swiper-button-prev',
            },

        });
    }

//
//     var $menu = $(".header");
//     $(window).scroll(function () {
//         if ($(this).scrollTop() > 100 && $menu.hasClass("default")) {
//             $menu.removeClass("default").addClass("moved");
//         } else if ($(this).scrollTop() <= 100 && $menu.hasClass("moved")) {
//             $menu.removeClass("moved").addClass("default");
//         }
//     });
//
//
    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: true, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });
//
//
    if ($('.page-contacts').length) {
        $("#expand-toggle").click(function () {
            $('#expect').toggleClass('checked');
        });
    }

    if ($('.js-modal-text').length) {
        $(".js-modal-text").click(function () {
            $('body').addClass('locked');
            $('.footer__fade').css("display", "flex")
                .hide()
                .fadeIn();
            $('#modal-text').css("display", "flex")
                .hide()
                .fadeIn();
        });
        $(".modal-close").click(function () {
            $('body').removeClass('locked');
            $(this).closest('.footer__fade-modal').fadeOut(300);
            $('.footer__fade').fadeOut(300);
        });
    }
    if ($('.js-modal-file').length) {
        $(".js-modal-file").click(function () {
            $('body').addClass('locked');
            $('.footer__fade').css("display", "flex")
                .hide()
                .fadeIn();
            $('#modal-file').css("display", "flex")
                .hide()
                .fadeIn();
        });
        $(".modal-close").click(function () {
            $('body').removeClass('locked');
            $(this).closest('.footer__fade-modal').fadeOut(300);
            $('.footer__fade').fadeOut(300);
        });
    }

    function getFile() {
        document.getElementById("file-upload").click();
    }

    function sub(obj) {
        var file = obj.value;
        var fileName = file.split("\\");
        document.getElementById("custom-file-upload").innerHTML = fileName[fileName.length - 1];
        document.myForm.submit();
        event.preventDefault();
    }
    $("#file-upload").change(function(){
        sub(this);
    });

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        $('body').removeClass('locked');
        $(this).closest('.footer__fade-modal').fadeOut(300);
        $('.footer__fade').fadeOut(300);
        $('.wpcf7-response-output').empty();
        $('#success-send').addClass('active-popup');
        setTimeout(function (){
            $('#success-send').removeClass('active-popup');
        }, 2000);
    }, false );
//
    $(".header__burger").click(function () {
        var HeaderHeight = $('#header').outerHeight();
        $('.header__mob-menu').toggleClass('show');
        $(this).toggleClass('active');
        $('body').toggleClass('locked');
        $('#header').toggleClass('menu-show');
        $('.header__mob-menu').css({'top': HeaderHeight});
        $('.header__mob-menu').css({'height':  window.innerHeight - HeaderHeight});
    });
//     if ($('.banner').length) {
//         var banner = new Swiper(".banner .swiper-container", {
//             slidesPerView: 1,
//             spaceBetween: 40,
//             effect: 'fade',
//             loop: true,
//             loopFillGroupWithBlank: true,
//             fadeEffect: {
//                 crossFade: true
//             },
//             navigation: {
//                 nextEl: ".banner .next",
//                 prevEl: ".banner .prev",
//             },
//         });
//         let RotateCorner = 120;
//         let ImageCorner = 120;
//         let click = 1;
//         $( ".banner .prev" ).on( "click", function() {
//             if (click == 1){
//                 ImageCorner = 0;
//             }else if(click == 2){
//                 ImageCorner = 120;
//             }else if(click == 3){
//                 ImageCorner = 240;
//             }
//             let prev = $('.swiper-slide-duplicate-prev').data('img');
//             $('.banner__mask').css({
//                 '-moz-transform':'rotate(-'+RotateCorner+'deg)',
//                 '-webkit-transform':'rotate(-'+RotateCorner+'deg)',
//                 '-o-transform':'rotate(-'+RotateCorner+'deg)',
//                 '-ms-transform':'rotate(-'+RotateCorner+'deg)',
//                 'transform':'rotate(-'+RotateCorner+'deg)'
//             });
//             $('.banner__mask img').removeClass('new-img').addClass('current-img').css('z-index', 0);
//             console.log(ImageCorner)
//             $('.banner__mask').prepend($('<img class="new-img" src="'+prev+'" style="opacity: 0; z-index: 1; transform: rotate('+ImageCorner+'deg)">'));
//             $('.banner__mask .new-img').animate({opacity: '100%'}, 500);
//             setTimeout(function() {
//                 $('.current-img').remove()
//             }, 1000);
//             $('.banner__mask img').css({
//                 '-moz-transform':'rotate('+click * 120+'deg)',
//                 '-webkit-transform':'rotate('+click * 120+'deg)',
//                 '-o-transform':'rotate('+click * 120+'deg)',
//                 '-ms-transform':'rotate('+click * 120+'deg)',
//                 'transform':'rotate('+click * 120+'deg)'
//             });
//             RotateCorner = RotateCorner + 120;
//             console.log(click)
//             if(click == 3){
//                 click = 0;
//             }
//             click ++;
//         });
//         $( ".banner .next" ).on( "click", function() {
//             let next = $('.swiper-slide-duplicate-next').data('img');
//             $('.banner__mask img').attr('src',next);
//         });
//     }
//

    if ($('.popular__list').length) {
        var popular = new Swiper(".popular__list.swiper-container", {
            slidesPerView: 4,
            loop: true,
            spaceBetween: 40,
            autoplay: {
                delay: 2000,
            },
            breakpoints: {
                // when window width is >= 320px
                240: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                440: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                500: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        });
    }
//
//     if ($('section.reviews').length) {
//         var reviews = new Swiper("section.reviews .swiper-container", {
//             slidesPerView: 2,
//             spaceBetween: 48,
//             loop: true,
//             navigation: {
//                 nextEl: "section.reviews .next",
//                 prevEl: "section.reviews .prev",
//             },
//         });
//     }
//
//     if($('.tabs-elements').length){
//         $(".tabs-elements .tabs-nav-item").click(function() {
//             $(".tabs-elements .tabs-nav-item").removeClass("active").eq($(this).index()).addClass("active");
//             $(".tabs-elements .tabs-content-item").hide().eq($(this).index()) .css("display", "flex")
//                 .hide()
//                 .fadeIn();
//         }).eq(0).addClass("active");
//         $(".tabs-elements .tabs-content-item").eq(0).addClass("active");
//     }


    //es5 for max browser compatible, works with mutliple videos on a page. No resize event.

//get all vids
    var video =  document.querySelectorAll('video')

//add source to video tag
    function addSourceToVideo(element, src) {
        var source = document.createElement('source');
        source.src = src;
        source.type = 'video/mp4';
        element.appendChild(source);

    }

//determine screen size and select mobile or desktop vid
    function whichSizeVideo(element, src) {
        var windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
        if (windowWidth > 1400 ) {
            addSourceToVideo( element, src.dataset.desktopVid);
        } else if (windowWidth <= 1400 && windowWidth > 768){
            addSourceToVideo( element, src.dataset.tabletVid);
        } else {
            addSourceToVideo( element, src.dataset.mobileVid);
        }
    }

//init only if page has videos
    function videoSize() {
        if (video !== undefined) {
            video.forEach(function(element, index) {
                whichSizeVideo(
                    element, //element
                    element  //src locations
                );
            });
        }
    }
    videoSize();

    $( "body:not(.home) .lazy-video" ).each(function() {
        $(this).mouseenter(
            function()
            {
                $(this).get(0).play();
            }
        );
        $(this).mouseout(
            function()
            {
                $(this).get(0).pause();
            }
    );
    });

});

