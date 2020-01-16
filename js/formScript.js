(function(){
  "use strict";
    $(document).ready(init);
    var divOne, divTwo, divThree;
    function init(evt) {
        divOne = $('#step1Div');
        divTwo = $('#step2Div');
        divThree = $('#step3Div');
        $('.radio').checkboxradio({
      icon: false
    });
        $('#favAltSelect').selectmenu();
        $('#step2').click(afficherStep2);
        $('#step3').click(afficherStep3);
        $('.choixInt').controlgroup();
        
        $('#fileInpt').change(afficherNomFichier);
        
        jQuery('input[name="dateNaissance"]').bind('keyup',function(event){
    var key = event.keyCode || event.charCode;
    if (key == 8 || key == 46) return false;
    var strokes = $(this).val().length;

    if(strokes === 2 || strokes === 5){
        var thisVal = $(this).val();
        thisVal += '/';
        $(this).val(thisVal);
    }
    // if someone deletes the first slash and then types a number this handles it
    if(strokes>=3 && strokes<5){
        var thisVal = $(this).val();
        if (thisVal.charAt(2) !='/'){
             var txt1 = thisVal.slice(0, 2) + "/" + thisVal.slice(2);
             $(this).val(txt1);
        }
    }
     // if someone deletes the second slash and then types a number this handles it
   if(strokes>=6){
        var thisVal = $(this).val();
        if (thisVal.charAt(5) !='/'){
            var txt2 = thisVal.slice(0, 5) + "/" + thisVal.slice(5);
             $(this).val(txt2);
        }
    }

});
        
    }
    function afficherStep2(evt) {
        divOne.hide();
        divTwo.show();
    }
    function afficherStep3(evt) {
        divTwo.hide();
        divThree.show();
    }
    function afficherNomFichier(evt) {
        var output = document.getElementById('avatarTelecharge');
        output.src = URL.createObjectURL(event.target.files[0]);
        $('#btnFileText').text(this.files[0].name + ' (cliquez pour changer)');
        $('#avatarTelecharge').css({
            display:'block'
        });
        $('#iconFileBtn').hide();
    }
}());
