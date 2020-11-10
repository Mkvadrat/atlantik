$(document).ready(function () {
    $('.disable').attr('disabled', 'disabled');
    
    $("a.ancLinks").click(function () { 
		var elementClick = $(this).attr("href");
		var destination = $(elementClick).offset().top;
		$('html,body').animate( { scrollTop: destination }, 1100 );
		return false;
	});
    
    $(".carousel-rooms .owl-carousel").owlCarousel({
        items: 4,
        margin: 16,
        dots: true,
        nav: true,
        navText: ["<img src='images/arrow-left.svg'>", "<img src='images/arrow-right.svg'>"]
    });
    $(".testimonials .owl-carousel").owlCarousel({
        items: 2,
        margin: 16,
        dots: false,
        nav: true,
        navText: ["<img src='images/arrow-left.svg'>", "<img src='images/arrow-right.svg'>"]
    });

    // $('.fotorama').fotorama({
    //     clicktransition: 'dissolve',
    //     width: '100%',
    //     hash: true,
    //     maxheight: '100%',
    //     nav: 'thumbs',
    //     margin: 2,
    //     shuffle: true,
    //     thumbmargin: 2,
    //     thumbwidth: 100,
    //     thumbheight: 100,
    //     allowfullscreen: 'native',
    //     keyboard: {space: true},
    //     shadows: false,
    //     fit: 'cover'
    // });
});


document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu("nav#menu", {
            navbar: {
                title: "Меню"
            },
            extensions: [
                'fx-listitems-slide',
                'fx-panels-zoom',
                'fx-listitems-slide',
                'multiline',
                'shadow-page',
                'shadow-panels',
                'listview-large',
                'pagedim-black',
                'position-right',
                'border-none'
            ],
            navbars: [
                {
                    "position": "top",
                    "content": [
                        "prev",
                        "title"
                    ]
                }
            ]
        });
    }
);
