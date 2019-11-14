// banner swiper
var banner_swiper = new Swiper('#banner',{
    navigation: {
        nextEl: '.banner-button-next',
        prevEl: '.banner-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
      },
});

$(window).resize(function(){
    var window_width = $(window).width(); 
    if (window_width <= 768) {
        if (safety_swiper) {
            safety_swiper.destroy(); 
            safety_swiper = undefined; 
        } 
    }else {
        if(safety_swiper){
            return;
        }else{
            // 國際運安swiper
            var safety_swiper = new Swiper('#safety', {
                slidesPerView: 4,
                slidesPerColumn: 2,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.button-next',
                    prevEl: '.button-prev',
                }
            });
        }
    } 
});
var window_width = $(window).width(); 
if (window_width > 768) {
    // 國際運安swiper
    var safety_swiper = new Swiper('#safety', {
        slidesPerView: 4,
        slidesPerColumn: 2,
        spaceBetween: 15,
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        }
    });
}

// 底部logo
var swiper = new Swiper('#logo', {
    slidesPerView: 4,
    slidesPerColumn: 1,
    spaceBetween: 20,
    navigation: {
        nextEl: '.logo-button-next',
        prevEl: '.logo-button-prev',
    },
    breakpoints: {
     
        // when window width is <= 480px
        480: {
          slidesPerView: 1,
          spaceBetween: 15
        },
        // when window width is <= 640px
        640: {
          slidesPerView: 3,
          spaceBetween: 20
        }
    }
});

// navbar按鈕效果
const buttons = document.getElementById('navButton')
const banner = document.getElementById('banner-content').offsetHeight            
const bannerBottom = banner - buttons.clientHeight - 145

const nav = document.getElementById('main-nav')
const nav_bg = document.getElementById('index_navbar')

window.onscroll = function () {
    var window_width = $(window).width(); 
    var screenTop = document.documentElement.scrollTop

    if (window_width > 1200){
        if (screenTop >= bannerBottom) {
            buttons.classList.add('dispersion');
            nav.style.display = "block";
            nav_bg.classList.add('bg');
    
        } else {
            buttons.classList.remove('dispersion')
            nav.style.display = "none"
            nav_bg.classList.remove('bg');
        }
    }
    else if(window_width < 1200) {
        if (screenTop >= bannerBottom - 15) {
            buttons.classList.add('dispersion');
            nav.style.display = "block";
            nav_bg.classList.add('bg');
    
        } else {
            buttons.classList.remove('dispersion')
            nav.style.display = "none"
            nav_bg.classList.remove('bg');
        }
    }

}