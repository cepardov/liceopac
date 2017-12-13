$(document).ready(function(){
    $('.modal').modal();

    $(".button-collapse").sideNav();

    $('.carousel').carousel();

    $('.parallax').parallax();

    $('.slider').slider({
        indicators:true,
        height: 259,
        transition: 500,
        interval: 5000
    });
});

$(document).ready(function() {
    var options = [ {
        selector: '#statistic', offset: 250, callback:
            function(el) {
                $('#dato1').animateNumber({ number: 640 },4000);
                $('#dato2').animateNumber({ number: 68 },5000);
                $('#dato3').animateNumber({ number: 452 },6000);
                $('#dato4').animateNumber({ number: 120 },7000);
        }
    }];
    Materialize.scrollFire(options);
});


(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));