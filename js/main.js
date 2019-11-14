$(document).ready(function () {
    $('.font-size-change-box button').click(function (e) {
        e.preventDefault();
        var fontSize = $(this).data('size');
        $('html,body').css('font-size', fontSize);
        $('.font-size-change-box button').removeClass("active");
        $(this).addClass("active");
    });

    $(".mobile-toggle-btn").click(function (e) {
        e.preventDefault();
        $("#navbar-collapse").toggleClass("active");
        $(".mobile-toggle-btn").toggleClass("active");
    });

    $('a[data-toggle="dp-collapse"]').click(function (e) {
        //check window size if ismobile e.preventDefault();
        var window_width = $(window).width();
        if (window_width < 576) {
            e.preventDefault();
            var toggleid = $(this).data("toggleid");
            $(this).find("p").toggleClass("active");
            $(".content[data-toggleid=" + toggleid + "]").toggleClass("active");
        }
    });

    $("#left-menu span").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $("#left-menu ul").toggleClass("active");
    });
});




//卡片收起效果
function closed() {
    document.getElementById('card').style.right = "-330px"
    document.getElementById('closed').style.display = "none"
    document.getElementById('open').style.display = "block"
}

function opened() {
    document.getElementById('card').style.right = "0"
    document.getElementById('open').style.display = "none"
    document.getElementById('closed').style.display = "block"
}

// GoTop 顯示隱藏
$(window).scroll(function () {
    var gotop = $(window).scrollTop();
    if (gotop > 300) {
        $('#GoTop').addClass('show');
    }
    if (gotop < 300) {
        $('#GoTop').removeClass('show');
    }
});

$('.related-data .icons a').on('click', function (e) {
    e.preventDefault()
    var a_href = $(this).attr('href');
    $('.related-data .tab-content .tab-pane').removeClass('active');
    $(a_href).addClass('active');
    
    $('.data-number').each(function () {
        $(this).html(0);
        var $this = $(this),
            countTo = $this.attr('data-number');
        $({ countNum: $this.text() }).animate({
            countNum: countTo
        },{
            duration: 500,
            easing: 'linear',
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                $this.text(this.countNum);
            }
        });
    });
})