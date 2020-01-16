(function () {
    "use strict";
    $(document).ready(init);
    var burgerBtn, closeLi, menuResponsive;
    function init(evt) {
        closeLi = $('<li id="closeMenu"><a href="#">Fermer le menu</a></li>');
        menuResponsive = $('nav ul');
        closeLi.hide();
        menuResponsive.append(closeLi);
        burgerBtn = $('#pull');
        burgerBtn.click(afficherMenuResponsive);
        closeLi.click(closeMenu);
        }

    function afficherMenuResponsive(evt) {
        closeLi.show();
        menuResponsive.show();
    }

    function closeMenu(evt) {
        closeLi.hide();
        menuResponsive.hide();
    }
}());