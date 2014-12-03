$(document).ready(function ()
        {
            //alert(document.title);
           if (document.title == "Properties" || document.title == "Market Index" || document.title == "Careers" || document.title == "Property Details") 
               {
                   $('#footer_div').css('margin-top' , '190px');
               }
            if (document.title == 'Share Your Property' || document.title == 'User Registration' || document.title == 'Profile' || document.title == 'Auctions' || document.title == "Home Page")
            {
                //alert ('hi');
                 $('#footer_div').css('margin-top' , '30px');
            }
//            else
//                $('#footer_div').css('margin-top' , '30px');
               
           $('.selectpicker').selectpicker();


           $("#btn_subscribe").click(function(){

           		var email;
           		if( $("#footer_subscribe_email").length == 0){
           			email = 'user';
           		}else{
           			email = $("#footer_subscribe_email").val();
           			if(!validateEmail(email)){
           				return false;
           			}
           		}

           		var url = $("#url").val();
		        url = url+"subscribeuser";
		        $.ajax({
		          type: "POST",
		          url: url,
		          data: { id: email }
		        })
		          .success(function( msg ) {
		                $(".footer_col_title").hide();
		                $("#btn_subscribe").hide();
                        $("#footer_subscribe_email").hide();
                        $("#successMessage").addClass('alert-success');
                        $("#successMessage").show();
                        $("#successMessage").html('Subscription was successfull.');
		          }),
                  error(function() {
                        $("#successMessage").addClass('alert-danger');
                        $("#successMessage").show();
                        $("#successMessage").html('Subscription failed. Please try again later');
                  });



           		
           });


           if($("#loginError").length > 0){
                $('#tallModal').modal('show');
           }


            if($('[name="city"]').length > 0){
                $('[name="city"]').change(function(){
                    value = $('[name="city"]').val();
                    if(value != 0){
                        $("[name='district']").prop('disabled',false);
                        $(".bootstrap-select > .dropdown-toggle").removeClass('disabled');
                        $('.dropdown-menu > .inner > li').removeClass('disabled')
                    }
                });
           }

           $('#searchHome_city').change(function() {
               if ($(this).val() !=0){
                   var url = $("#url").val();
                   var city_id = $(this).val();
                   var key = 1;
                   url = url+"getDistricts";
                   $.ajax({
                      type: "POST",
                      url: url,
                      data: { id: city_id, key: key }
                    })
                      .success(function( html ) {
                        if (html != 0)
                        {
                        	$("#districtContainer").html(html);
                        	$('#searchHome_district').selectpicker();
                        }
                        else
                        {
                            $("#searchHome_district").hide();
                            $("[data-id='searchHome_district']").hide();
                        }
                      });
              }
           });

           $('#search_city_1').change(function() {
            if ($(this).val() !=0){
               var url = $("#url").val();
               var city_id = $(this).val();
               var key = 2;
               url = url+"getDistricts";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: { id: city_id, key: key }
                })
                  .success(function( html ) {
                    if (html != 0)
                    {
                        $("#districtContainer_1").html(html);
                        $('#search_district_1').selectpicker();
                    }
                    else
                    {
                        $("#districtContainer").hide();
                        $("[data-id='search_district_1']").hide();
                    }
                  });
              }
           });

           $('#search_city_2').change(function() {
            if ($(this).val() !=0){
               var url = $("#url").val();
               var city_id = $(this).val();
               var key = 3;
               url = url+"getDistricts";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: { id: city_id, key: key }
                })
                  .success(function( html ) {
                    if (html != 0)
                    {
                        $("#districtContainer_2").html(html);
                        $('#search_district_2').selectpicker();
                    }
                    else
                    {
                        $("#districtContainer_2").hide();
                        $("[data-id='search_district_2']").hide();
                    }
                  });
              }
           });

           $('#search_city_3').change(function() {
            if ($(this).val() !=0){
               var url = $("#url").val();
               var city_id = $(this).val();
               var key = 4;
               url = url+"getDistricts";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: { id: city_id, key: key }
                })
                  .success(function( html ) {
                    if (html != 0)
                    {
                        $("#districtContainer_3").html(html);
                        $('#search_district_3').selectpicker();
                    }
                    else
                    {
                        $("#districtContainer_3").hide();
                        $("[data-id='search_district_3']").hide();
                    }
                  });
              }
           });

           $('#propertyAlert_city').change(function() {
            if ($(this).val() !=0){
               var url = $("#url").val();
               var city_id = $(this).val();
               var key = 5;
               url = url+"getDistricts";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: { id: city_id, key: key }
                })
                  .success(function( html ) {
                    if (html != 0)
                    {
                        $("#districtContainer_4").html(html);
                        $('#propertyAlert_district').selectpicker();
                    }
                    else
                    {
                        $("#districtContainer_4").hide();
                        $("[data-id='propertyAlert_district']").hide();
                    }
                  });
            }
               
           });

           $('#shareProperty_city').change(function() {
            if ($(this).val() !=0){
               var url = $("#url").val();
               var city_id = $(this).val();
               var key = 6;
               url = url+"getDistricts";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: { id: city_id, key: key }
                })
                  .success(function( html ) {
                    if (html != 0)
                    {
                        $("#shareProperty_districtContainer").html(html);
                        $('#shareProperty_district').selectpicker();
                    }
                    else
                    {
                        $("#shareProperty_districtContainer").hide();
                        $("[data-id='shareProperty_district']").hide();
                    }
                  });
            }
               
           });
           

        });



function search_validation ()
{
        // return true;
}

function formValidation()
{
    var b=document.forms["registerForm"]["password"].value;
    if (b===null || b==="")
      {
      alert("Password must be filled out");
      return false;
      }

    var c=document.forms["registerForm"]["confirmpassword"].value;
    if (c===null || c==="")
      {
      alert("Please re-enter password");
      return false;
      }


    if (c !== b){
        $("#confirmpassword").css('border','1px solid red');
        $("#passwordAlert").show();
        return false;
    }else{
        $("#confirmpassword").css('border','1px solid black');
        $("#passwordAlert").hide();
    }
}


function toggleVisibility()
{
    if ($('.search_bottom_row').css('display') == 'none')
        {
            $(".search_bottom_row").slideDown("slow");
            if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    $('.search_components2').animate({marginTop:"20px"});
                    $('.search_btn_submit2').animate({marginTop:"20px"});
                }
            else 
                {
                    $('.search_components2').animate({marginTop:"10px"});
                    $('.search_btn_submit').animate({marginTop:"67px"});
                }
        }
        else 
        {
            $(".search_bottom_row").slideUp("slow");
            if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    $('.search_components2').animate({marginTop:"54px"});
                    $('.search_btn_submit2').animate({marginTop:"0px"});
                }
            else 
                {
                    $('.search_components2').animate({marginTop:"54px"});
                    $('.search_btn_submit').animate({marginTop:"17px"});
                }
        }
}

function redirect()
{
    if (language == 'en')
        {
            window.location('http://localhost/ColdwellBanker/index.php/controller_property/compare_properties/en');
        }
        else
            {
                window.location('http://localhost/ColdwellBanker/index.php/controller_property/compare_properties/ar');
            }
    
}

function redirect_profile(language)
{
    if (language == 'en')
        {
            window.location('http://localhost/ColdwellBanker/index.php/controller_user');
        }
        else
            {
                window.location('http://localhost/ColdwellBanker/index.php/controller_user/index_ar');
            }
    
}

function toggleVisibility2 (){
    var margintop = $('#footer_div').css('margin-top');
if ($('.property_alert_bottom_row').css('display') == 'none')
    {
        
        $(".property_alert_bottom_row").slideDown("slow");
        if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    
                    $('.property_alert_btn_submit2').animate({marginTop:"20px"});
                    $('#footer_div').animate({marginTop:"260px"});
                }
            else 
                {
                    $('.property_alert_btn_submit').animate({marginTop:"67px"});
                }
    }
    else
    {
        $(".property_alert_bottom_row").slideUp("slow");
        if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    $('#footer_div').animate({marginTop: margintop});
                    $('.property_alert_btn_submit2').animate({marginTop:"17px"});
                }
            else 
                {
                    $('.property_alert_btn_submit').animate({marginTop:"17px"});
                }   
    }
};


$('#footer_dropdown1').click(function (){
            if ($('#footer_dropdown1_data').css('display') == 'none'){
                if ($('#footer_dropdown2_data').css('display') != 'none')
                    {
                        $('#footer_dropdown2_data').slideUp('slow');
                    }
                    else if ($('#footer_dropdown3_data').css('display') != 'none')
                        {
                            $('#footer_dropdown3_data').slideUp('slow');
                        }
                $('#footer_dropdown1_data').slideDown('slow');
            }
            else
                {
                    $('#footer_dropdown1_data').slideUp('slow');
                }
        });
$('#footer_dropdown2').click(function (){
    if ($('#footer_dropdown2_data').css('display') == 'none'){
        if ($('#footer_dropdown1_data').css('display') != 'none')
            {
                $('#footer_dropdown1_data').slideUp('slow');
            }
            else if ($('#footer_dropdown3_data').css('display') != 'none')
                {
                    $('#footer_dropdown3_data').slideUp('slow');
                }
        $('#footer_dropdown2_data').slideDown('slow');
    }
    else
        {
            $('#footer_dropdown2_data').slideUp('slow');
        }
});
$('#footer_dropdown3').click(function (){
            if ($('#footer_dropdown3_data').css('display') == 'none'){
                if ($('#footer_dropdown2_data').css('display') != 'none')
                    {
                        $('#footer_dropdown2_data').slideUp('slow');
                    }
                    else if ($('#footer_dropdown1_data').css('display') != 'none')
                        {
                            $('#footer_dropdown1_data').slideUp('slow');
                        }
                $('#footer_dropdown3_data').slideDown('slow');
            }
            else
                {
                    $('#footer_dropdown3_data').slideUp('slow');
                }
        });
        
        

        
$(".modal-wide").on("show.bs.modal", function() {
  var height = $(window).height() - 200;
  $(this).find(".modal-body").css("max-height", height);
});


function cmdCalc_Click(form)
{
//    alert('clicked');
    var rate = $('#interestRate').val();
    
//    var interestRate = rate.options[rate.selectedIndex].value;
    if (form.purchasePrice.value == 0 || form.purchasePrice.value.length == 0) 
    {
        alert ("The Purchase Price field can't be 0!");
        $('#purchasePrice').focus();
        //form.purchasePrice.focus(); 
    }
    else 
        if (rate == 0 || rate.length == 0) 
        {
            alert ("The Interest Rate field can't be 0!");
            document.getElementById("interestRate").focus();
	}
        else 
            if (form.loanTerm.value == 0 || form.loanTerm.value.length == 0) 
            {
                alert ("The Term field can't be 0!");
                $('#loanTerm').focus();
//                form.loanTerm.focus(); 
            }
            else
                calculatePayment(form);
}

function calculatePayment(form)
{
    var rate = $("#interestRate").val();
    princ = $('#purchasePrice').val() - $('#downPayment').val();
    intRate = (rate/100);
    months = $('#loanTerm').val() * 12;
    $('#monthlyPayment').val(princ  + (princ * intRate * form.loanTerm.value) / months);
    $('#balance').val(princ);
    $('#totalPayment').val(months);
}

function loginFormValidation()
{
    var username = $("#username").val();
    var password = $("#password").val();

    if(username.length == 0){
        $("#usernameAlert").show();

        if(password.length == 0)
        $("#passwordAlert").show();
        
        return false;
    }else{
        $("#usernameAlert").hide();
    }

    if(password.length == 0){
        $("#passwordAlert").show();
        return false;
    }else{
        $("#passwordAlert").hide();
    }

    return false;
}

//===========================================================================================

$('.profile_btn_submit').click(function(event) {
    $('#profileUsername').removeClass('hide');
    $('#profileEmail').removeClass('hide');
    $('#profilePhone').removeClass('hide');
    $('#profileLocation').removeClass('hide');
    $('.profileData').addClass('hide');
    $(this).replaceWith('<input type="submit" name="submit" value="Submit" class="btn btn-defaut profile_btn_submit">');
});

//===========================================================================================

$('.share_btn_submit').click(function(event) {
    // alert($('#area').val());
    // if ($('#area').val() == '0')
    // {
    //     alert ('false');
    //     return false;
    // }
});

$('[name="city"').change(function(event) {
    $('[name="district"').prop('disabled', false);
    $('.bootstrap-select > .dropdown-toggle').removeClass('disabled');
    $('.dropdown-menu > .inner > li').removeClass('disabled');
});

$('[name="city_1"').change(function(event) {
    $('[name="district_1"').prop('disabled', false);
    $('.bootstrap-select > .dropdown-toggle').removeClass('disabled');
    $('[data-id="search_district_1"').removeClass('disabled');
    $('.dropdown-menu > .inner > li').removeClass('disabled');
});

$('[name="city_2"').change(function(event) {
    $('[name="district_2"').prop('disabled', false);
    $('[data-id="search_district_2"').removeClass('disabled');
    $('.dropdown-menu > .inner > li').removeClass('disabled');
});

$('[name="city_3"').change(function(event) {
    $('[name="district_3"').prop('disabled', false);
    // $('.bootstrap-select > .dropdown-toggle').removeClass('disabled');
    $('[data-id="search_district_3"').removeClass('disabled');
    $('.dropdown-menu > .inner > li').removeClass('disabled');
});

$('[name="alert_city"').change(function(event) {
    $('[name="alert_district"').prop('disabled', false);
    // $('.bootstrap-select > .dropdown-toggle').removeClass('disabled');
    $('[data-id="propertyAlert_district"').removeClass('disabled');
    $('.dropdown-menu > .inner > li').removeClass('disabled');
});

$('[name="searchHome_city"').change(function(event) {
    $('[name="searchHome_district"').prop('disabled', false);
    // $('.bootstrap-select > .dropdown-toggle').removeClass('disabled');
    $('[data-id="searchHome_district"').removeClass('disabled');
    $('.dropdown-menu > .inner > li').removeClass('disabled');
});


$(".propertyAlertButton").click(function(){
        
        var city = $("#propertyAlert_city").val();
        var district = $("#propertyAlert_district").val();
        var type = $("#propertyAlert_type").val();
        var price = $("#propertyAlert_price").val();
        var price = replaceAll(',','', price);
        var area = $("#propertyAlert_area").val();
        var email = $("#alert_email").val();
        var url   = $("#url").val();



        if($("#alert_email").length != 0){

            if(validateEmail(email)){
                var user_id = email;
                $("#propertyAlertError").addClass('hide');

            }else{
                $("#propertyAlertError").removeClass('hide');
                $("#propertyAlertError").html('Email not valid, Try again');
                return false;
            }

        }else{
             var user_id = $("#tmp__nm").val();
        }   

         if( city==0 || district==0 || type==0){
             $("#propertyAlertError").removeClass('hide');
             $("#propertyAlertError").html('City, District and Contract Type are required');
             $("#propertyAlertSuccess").addClass('hide');
            return false;
        }else{

                data = "city='"+city+"',district='"+district+"',type='"+type+"'";
                if(price != 0 )
                    data += ",price='"+price+"'";
                 if(area != 0 )
                    data += ",area='"+area+"'";

                

                $.ajax({
                  type: "POST",
                  url: url,
                  data: { name: user_id , data : data }
                })
                  .success(function( msg ) {
                            $("#propertyAlertSuccess").removeClass('hide');
                            $("#propertyAlertError").addClass('hide');
                  });
             
        }
        $("#propertyAlertError").addClass('hide');

});


function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 


function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}





function test(id,url)
{       
        var url = $("#url").val();
        url = url+"admin/";
        $.ajax({
          type: "POST",
          url: url,
          data: { id: id }
        })
          .success(function( msg ) {
                
          });
}
