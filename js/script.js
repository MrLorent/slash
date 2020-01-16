(function () {
    "use strict";
    $(document).ready(init);
    var burgerBtn, closeLi, menuResponsive, closeVideo, openVideo, dynamicText, dynamicInterval, dynamicCount;

    function init(evt) {
        closeLi = $('<li id="closeMenu"><a href="#">Fermer le menu</a></li>');
        menuResponsive = $('nav ul');
        closeLi.hide();
        menuResponsive.append(closeLi);
        burgerBtn = $('#pull');
        burgerBtn.click(afficherMenuResponsive);
        closeLi.click(closeMenu);
        openVideo = $('.videoPresentationLink');
        closeVideo = $('.closePopupVideo');
        openVideo.click(afficherVideo);
        closeVideo.click(cacherVideo);
        dynamicText = document.getElementById('dynamicText');
        var typeWriter = new Typewriter(dynamicText, {
          strings: ['à pied ?', 'en bus ?', 'en vélo ?', 'en train ?', 'en trottinette ?'],
          autoStart: true,
            loop:true
        });
    }

    function afficherMenuResponsive(evt) {
        closeLi.show();
        menuResponsive.show();
    }

    function closeMenu(evt) {
        closeLi.hide();
        menuResponsive.hide();
    }

    function afficherVideo(evt) {
        $('div.popupVideo').toggle({
            effect: "scale",
            direction: "horizontal",
        });
    }

    function cacherVideo(evt) {
        $('div.popupVideo').hide();
    }
//    function changeDynamicText(evt) {
//        switch (dynamicCount) {
//            case 1:
//                dynamicText.text('en bus');
//                dynamicCount=2;
//                break;
//            case 2:
//                dynamicText.text('en trottinette');
//                dynamicCount=3;
//                break;
//            case 3: 
//                dynamicText.text('à pied');
//                dynamicCount=1;
//                break;
//            default:
//                // code block
//        }
//    }
}());