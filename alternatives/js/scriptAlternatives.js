(function() {
    "use strict";
    $(document).ready(init);
    var toggleMenuBtn, menu, main, lesSections;
    function init(evt) {
        main = $('.alternatives');
        menu = $('#menu');
        toggleMenuBtn = $('#toggleMenu');
        toggleMenuBtn.click(toggleMenu);
       $(".blocContenuContent").pin({
      containerSelector: ".presentationDetail"
});
    }
    function toggleMenu(evt) {
        menu.css({
            display:'flex',
            transform: 'translateX(0)'
        });
    }
    
}());