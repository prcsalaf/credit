
current_color = $(".wizard-card").data("color");
full_color = true;


var Regle_v = "";
var list_menst =   new Array();


$(document).ready(function () {
    $(".fixed-plugin a, .fixed-plugin .badge").click(function (event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
                event.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    });

    $(".fixed-plugin .badge").click(function () {
        $wizard = $(".wizard-card");
        $button_next = $(".wizard-card .wizard-footer").find(
            ".pull-right :input"
        );

        $(this).siblings().removeClass("active");
        $(this).addClass("active");

        var new_color = $(this).data("color");

        $wizard.fadeOut("fast", function () {
            $wizard.attr("data-color", new_color);
            $button_next
                .removeClass(converterColor(current_color))
                .addClass(converterColor(new_color));

            current_color = new_color;
            $wizard.fadeIn("fast");
        });
    });

    function converterColor(color) {
        switch (color) {
            case "blue":
                return "btn-info";
                break;
            case "orange":
                return "btn-warning";
                break;
            case "azure":
                return "btn-primary";
                break;
            case "red":
                return "btn-danger";
                break;
            case "green":
                return "btn-success";
                break;
        }
    }
});



// partie de brogressbar de credit   dure , mensualite , montant ;

    //  default  disabled input trange
    $('.disable_').css({'cursor': 'no-drop'}).attr('disabled','disabled') ;

  $('.type').on('change',function(){
  // enable the range
    $('.disable_').css({'cursor': 'pointer'}).removeAttr('disabled') ;
   //  set regle the range
    var ind = this.value ;
    var list  = window.laravel.rgls ;
     Regle_v = list.find(element => element.type  == ind  );
   // set value
      $('.montant').attr({'max' : Regle_v.max_mont ,'min' :  Regle_v.min_mont }).val(  Regle_v.min_mont  ) ;
      $('.mensualite1').attr({'max' : Regle_v.max_mont ,'min' :  Regle_v.min_mont }) ;
      $('.duree').attr({ 'min' :  Regle_v.min_dure  }) ;
      calcMensualite();

});
   // set value input
$(document).on('input', ".montant" ,  function( ) {
    $('.montant').val( $(this).val() );
     calcMensualite();

});
$(document).on('input', ".mensualite1"  ,function(){
    console.log("index 1-- //"+this.value);

    const ind_ = list_menst.indexOf(this.value) ;

    if (ind_  != -1 ) {

        $('.mensualite2').val(  ind_ ) ;

    } else {

    }


});

$(document).on('input', ".mensualite2"  ,function(){

    var dure = parseInt(  $('.duree').attr('max') ) - parseInt(this.value) ;
    $('.mensualite1').val(  list_menst[this.value] ) ;
    $('.duree').val( dure ) ;

});

$(document).on('input', ".duree" ,function(){
    $('.duree').val(   $(this).val()   ) ;
    var result = getMens( $('.montant').val() , Regle_v.taux ,  $(this).val()  );
    const ind_ = list_menst.indexOf(result) ;
    console.log( "index" + ind_ );
    $('.mensualite1').val(  result);
    $('.mensualite2').val(  ind_ );
});
// function calcul la mensualite , le credit  et la duree
function getMens(mont , taux , dure ){
    var nume =  ( mont * taux ) / 12  ;
    var mens = nume / (1- Math.pow((1+ (taux /12) ) , -dure )  ) ;
    return mens.toFixed(2);
}
function getdure(mont , taux , mens){
    var rls1 =     Math.log10 ( - mens / (( taux / 12 * mont) - mens ) )  ;
    var rls2 =    Math.log10( 1 + taux /12 )   ;
    var reslt = rls1 / rls2 ;
    return Math.ceil(reslt) ;
}
function getMont(mens , taux , dure){
    var result_ = ( 12 * mens * ( 1 - Math.pow ( 1 + ( taux /12 ) , -dure )) ) / taux ;
    return result_;
}

function calcMensualite(){
     console.log( "appel table");
     list_menst = [] ;

    for (var index = Regle_v.min_dure ; index <= Regle_v.max_dure ; index++ ) {

        const mens = getMens(  $('.montant').val() , Regle_v.taux , index );
        var cpt = 1 ;
        if (Regle_v.max_dure == index  ) {
            console.log(true);
            cpt = 0 ;

        }
          if( mens < Regle_v.min_mens  || Regle_v.max_dure == index  ){
            $('.duree').attr({'max' :   index-cpt   }).val( index -cpt ) ;
               list_menst = list_menst.reverse() ;
              // console.log( list_menst  );
              console.log( list_menst.length  );
              console.log( "duree " + index );
              index = index - cpt- Regle_v.min_dure ;
              console.log( index +    ' '+list_menst[  index ] );
            $('.mensualite1').attr({'max' :   list_menst[index] , 'min' : list_menst[0]  }).val( list_menst[0] ) ;
            $('.mensualite2').attr({'max' :   index  }).val( 0 ) ;


            return ;
        }
       else  {
            list_menst.push(mens);
        }


    }

}

$(document).on('keypress',function(e) {
     if(e.which == 13) {
           e.preventDefault();
      }
});
//  button submit
$('.btn-finish').click(function(e){
    // e.preventDefault();
    $(this).submit();
});
