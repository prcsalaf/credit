/*! =========================================================
 *
 Paper Bootstrap Wizard - V1.0.1
*
* =========================================================
*
* Copyright 2016 Creative Tim (http://www.creative-tim.com/product/paper-bootstrap-wizard)
 *
 *                       _oo0oo_
 *                      o8888888o
 *                      88" . "88
 *                      (| -_- |)
 *                      0\  =  /0
 *                    ___/`---'\___
 *                  .' \|     |// '.
 *                 / \|||  :  |||// \
 *                / _||||| -:- |||||- \
 *               |   | \\  -  /// |   |
 *               | \_|  ''\---/''  |_/ |
 *               \  .-\__  '-'  ___/-. /
 *             ___'. .'  /--.--\  `. .'___
 *          ."" '<  `.___\_<|>_/___.' >' "".
 *         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *         \  \ `_.   \_ __\ /__ _/   .-` /  /
 *     =====`-.____`.___ \_____/___.-`___.-'=====
 *                       `=---='
 *
 *     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *
 *               Buddha Bless:  "No Bugs"
 *
 * ========================================================= */

// Paper Bootstrap Wizard Functions

searchVisible = 0;
transparent = true;

        $(document).ready(function(){

            /*  Activate the tooltips      */
            $('[rel="tooltip"]').tooltip();

            // Code for the Validator
            var $validator = $('.wizard-card form').validate({
        		  rules: {
                     pproject: {
                        required: function(e){
                            console.log('yea00');

                            return true;
                        }
                      },
                      pproject: {
                        required: true,
                        remote  :false,
                      },
                      ttype: {
                        required: true,
                        remote  :true,
                      },
        		    tcredit_encour: {
        		      required: true,
                      number  :true,
        		      minlength: 3 ,
                    //   digits  :true ,
                    //   pattern : '[0-9]{3,}',
        		    },
        		    tnombre_pr: {
                        required: true
                      },
                    file_pdf: {
                        required: true ,
                        accept : 'pdf'
                      }

                },
                messages :{
                    project:{
                        required: function(){
                            $('.choice ').find('.card').css( 'border', '1px solid red' );
                            return false
                        }
                    }
                }
        	});

            // Wizard Initialization
          	$('.wizard-card').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'nextSelector': '.btn-next',
                'previousSelector': '.btn-previous',

                onNext: function(tab, navigation, index) {
                	var $valid = $('.wizard-card form').valid();
                	if(!$valid) {
                		$validator.focusInvalid();
                		return false;
                	}
                },

                onInit : function(tab, navigation, index){

                  //check number of tabs and fill the entire row
                  var $total = navigation.find('li').length;
                  $width = 100/$total;

                  navigation.find('li').css('width',$width + '%');

                },

                onTabClick : function(tab, navigation, index){

                    var $valid = $('.wizard-card form').valid();

                    if(!$valid){
                        return false;
                    } else{
                        return true;
                    }

                },

                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;

                    var $wizard = navigation.closest('.wizard-card');

                    // If it's the last tab then hide the last button and show the finish instead
                    if($current >= $total) {
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').show();
                    } else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                    }

                    //update progress
                    var move_distance = 100 / $total;
                    move_distance = move_distance * (index) + move_distance / 2;

                    $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                    //e.relatedTarget // previous tab

                    $wizard.find($('.wizard-card .nav-pills li.active a .icon-circle')).addClass('checked');

                }
	        });


                // Prepare the preview for profile picture
                $("#wizard-picture").change(function(){
                    readURL(this);
                });

                // $('[data-toggle="wizard-radio"]').click(function(){
                //     wizard = $(this).closest('.wizard-card');
                //     wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
                //     $(this).addClass('active');
                //     $(wizard).find('[type="radio"]').removeAttr('checked');
                //     $(this).find('[type="radio"]').attr('checked','true');
                // });

                $('.choice').click(function(){
                    $('.choice').removeClass('active');
                    $('.choice input').removeAttr('checked');

                    $(this).addClass('active');
                    $(this).find('[type="checkbox"]').attr('checked','true')


                });

                $('.choice input').click(function(){

                      $(this).attr('checked','true');

                });




                $('.set-full-height').css('height', 'auto');

            });



         //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        function debounce(func, wait, immediate) {
        	var timeout;
        	return function() {
        		var context = this, args = arguments;
        		clearTimeout(timeout);
        		timeout = setTimeout(function() {
        			timeout = null;
        			if (!immediate) func.apply(context, args);
        		}, wait);
        		if (immediate && !timeout) func.apply(context, args);
        	};
        };

