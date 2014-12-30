var abc = 0; 
$(document).ready(function ()
        {

          $('li.dropdown').click(function(event) {
            if ($('li.dropdown').hasClass('open')){
              // alert($(this).children());return;
              // $('#home_dropdown > li:nth-child(1) > a')
              $('li.dropdown > a.dropdown-toggle').css('background-color', '#23395b');
              $('li.dropdown > a.dropdown-toggle').css('color', 'white');
            }
          });

          $('.footer_dropdown_div').click(function(event) {
            // alert($(this).attr('id'));
            if ($(this).attr('id') == 'footer_dropdown_1'){
              if($(this).hasClass('open')){
                  $('#footer_dropdown1').css('color', 'white');
              }else{
                  $('#footer_dropdown1').css('color', '#333');
              }

            }else if($(this).attr('id') == 'footer_dropdown_2'){
                if($(this).hasClass('open')){
                    $('#footer_dropdown2').css('color', 'white');
                }else{
                    $('#footer_dropdown2').css('color', '#333');
                }
            }else if ($(this).attr('id') == 'footer_dropdown_3'){
                if($(this).hasClass('open')){
                    $('#footer_dropdown3').css('color', 'white');
                }else{
                    $('#footer_dropdown3').css('color', '#333');
                }
            }
          });


         

          $('#add_more').click(function() {
            $(this).before($("<div/>", {
            id: 'filediv'
            }).fadeIn('slow').append($("<input/>", {
            name: 'img[]',
            type: 'file',
            id: 'file'
            }), $("<br/><br/>")));
          });

          $('body').on('change', '#file', function() {
              if (this.files && this.files[0]) {
                  abc += 1; // Incrementing global variable by 1.
                  var z = abc - 1;
                  var x = $(this).parent().find('#previewimg' + z).remove();
                  $(this).before("<div id='abcd" + abc + "' class='abcd'><img style='width: 100px;height:100px;' id='previewimg" + abc + "' src=''/></div>");
                  var reader = new FileReader();
                  reader.onload = imageIsLoaded;
                  reader.readAsDataURL(this.files[0]);
                  $(this).hide();
                  $("#abcd" + abc).append($("<img/>", {
                    id: 'img',
                    src: '../application/static/images/x.png',
                    alt: 'delete'
                  }).click(function() {
                    $(this).parent().remove();
                  }));
              }
          });
// To Preview Image
      function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
      };
      $('#upload').click(function(e) {
          var name = $(":file").val();
          if (!name) {
              alert("First Image Must Be Selected");
              e.preventDefault();
          }
      });

            //alert(document.title);
           if (document.title == "Properties" || document.title == "Market Index" || document.title == "Careers" || document.title == "Property Details") 
               {
                   $('#footer_div').css('margin-top' , '190px');
               }
            if (document.title == 'Share Your Property' || document.title == 'User Registration' || document.title == 'Profile' || document.title == 'Auctions' || document.title == "Home Page")
            {
                 $('#footer_div').css('margin-top' , '30px');
            }
           $('.selectpicker').selectpicker();


           $("#btn_subscribe").click(function(){
              // alert('hi');
           		var email;
           		if( $("#footer_subscribe_email").length == 0){
           			email = 'user';
           		}else{
           			email = $("#footer_subscribe_email").val();
           			if(!validateEmail(email)){
           				return false;
           			}
           		}
              // alert(email);return;
           		var url = $("#url").val();
		        url = url+"subscribeuser";
		        $.ajax({
		          type: "POST",
		          url: url,
		          data: { id: email },
              success: function( msg ) {
		                $("#footer_bottom_div").hide();
		                $("#btn_subscribe").hide();
                        $("#footer_subscribe_email").hide();
                        $("#successMessage").addClass('alert-success');
                        $("#successMessage").show();
                        $("#successMessage").html('Subscription was successful.');
		          },
                  error:function() {
                        $("#successMessage").addClass('alert-danger');
                        $("#successMessage").show();
                        $("#successMessage").html('Subscription failed. Please try again later');
                  }
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
                          $("#districtContainer").show();
                        	$("#districtContainer").html(html);
                        	$('#searchHome_district').selectpicker();
                          $('#disabled_district').css('display', 'none');
                        }
                        else
                        {
                            $("#districtContainer").hide();
                            $('#disabled_district').css('display', 'block');
                            $('#searchhome_disabled_district').attr('disabled', true);
                            $("[data-id='searchhome_disabled_district']").attr('disabled', true);
                            // $("#searchHome_district").hide();
                            // $("[data-id='searchHome_district']").hide();
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
                        $("#districtContainer_1").show();
                        $("#districtContainer_1").html(html);
                        $('#search_district_1').selectpicker();
                        $('#disabled_district_1').css('display', 'none');
                        $('#search_disabled_district_2').attr('disabled', true);
                        $("[data-id='search_disabled_district_2']").attr('disabled', true);
                        $('#search_disabled_district_3').attr('disabled', true);
                        $("[data-id='search_disabled_district_3']").attr('disabled', true);
                        $("[data-id='propertyAlert_disabled_district']").attr('disabled', true);
                        $('#propertyAlert_disabled_district').attr('disabled', true);
                        $("[data-id='shareProperty_disabled_district']").attr('disabled', true);
                        $('#shareProperty_disabled_district').attr('disabled', true);

                    }
                    else
                    {
                        $("#districtContainer_1").hide();
                        $('#disabled_district_1').css('display', 'block');
                        $('#search_disabled_district_1').attr('disabled', true);
                        $("[data-id='search_disabled_district_1']").attr('disabled', true);
                        // $("[data-id='search_district_1']").hide();

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
                        $("#districtContainer_2").show();
                        $("#districtContainer_2").html(html);
                        $('#search_district_2').selectpicker();
                        $('#disabled_district_2').css('display', 'none');
                    }
                    else
                    {
                        $("#districtContainer_2").hide();
                        $("[data-id='search_disabled_district_2']").attr('disabled', true);
                        $('#disabled_district_2').css('display', 'block');
                        $('#search_disabled_district_2').attr('disabled', true);
                        // $("[data-id='search_district_2']").hide();
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
                        $("#districtContainer_3").show();
                        $("#districtContainer_3").html(html);
                        $('#search_district_3').selectpicker();
                        $('#disabled_district_3').css('display', 'none');
                    }
                    else
                    {
                        $("#districtContainer_3").hide();
                        $("[data-id='search_disabled_district_3']").attr('disabled', true);
                        $('#disabled_district_3').css('display', 'block');
                        $('#search_disabled_district_3').attr('disabled', true);
                        // $("[data-id='search_district_3']").hide();
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
                        $("#districtContainer_4").show();
                        $("#districtContainer_4").html(html);
                        $('#propertyAlert_district').selectpicker();
                        $('#disabled_district_4').css('display', 'none');
                    }
                    else
                    {
                        $('#disabled_district_4').css('display', 'block');
                        $("#districtContainer_4").hide();
                        $("[data-id='propertyAlert_disabled_district']").attr('disabled', true);
                        $('#propertyAlert_disabled_district').attr('disabled', true);
                        // $("[data-id='propertyAlert_district']").hide();
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
                        $("#shareProperty_districtContainer").show();
                        $("#shareProperty_districtContainer").html(html);
                        $('#shareProperty_district').selectpicker();
                        $('#disabled_district_5').css('display', 'none');
                    }
                    else
                    {
                        $("#shareProperty_districtContainer").hide();
                        $('#disabled_district_5').css('display', 'block');
                        $("[data-id='shareProperty_disabled_district']").attr('disabled', true);
                        $('#shareProperty_disabled_district').attr('disabled', true);
                        // $("[data-id='shareProperty_district']").hide();
                    }
                  });
            }
               
           });
           

            $("#offices_select").change(function() {
              // alert($(this).val());
              if ($(this).val() != 0){
                 var geocoder;
                 var map;
                 geocoder = new google.maps.Geocoder();
                 var latlng = new google.maps.LatLng(-33.8569, 151.2152);
                 var mapOptions = {
                     zoom: 8,
                     center: latlng,
                     mapTypeId: google.maps.MapTypeId.ROADMAP
                 }
                 map = new google.maps.Map(document.getElementById('offices_map'), mapOptions);


                var url = $("#url").val();
                url = url + "displayOffice";
                var lang = $("[name='language']").val();
                id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { id: id, lang: lang }
                  })
                    .success(function( html ) {
                          $("#offices_info").css('display', 'block');
                          $("#offices_info").html(html);
                          var url2 = $("#url").val() + "displayMap";
                          $.ajax({
                            type: "POST",
                            url: url2,
                            data: { id: id, lang: lang }
                          })
                            .success(function( html ) {
                                  $('#address').val(html);
                                  var address = html;
                                  $('#offices_map').css('height', '100%');
                                  $('#offices_map').show();
                                    geocoder.geocode( { 'address': address}, function(results, status) {
                                      if (status == google.maps.GeocoderStatus.OK) {
                                        map.setCenter(results[0].geometry.location);
                                        var marker = new google.maps.Marker({
                                            map: map,
                                            position: results[0].geometry.location
                                        });
                                      } else {
                                        alert('Geocode was not successful for the following reason: ' + status);
                                      }
                                    });
                              //alert($('#address').val());
                                  //$("#offices_map").css('display', 'block');
                                  //$("#offices_map").html(html);
                                  
                            });
                  });
              }else if($(this).val() == 0){
                  $("#offices_info").hide();
                  $("#offices_map").hide();
              }
            });


            $('[name="searchSubmit1"]').click(function(event) {
              var propertyType = $('[name="type"]').val();
              var city = $('[name="city"]').val();
              var district = $('[name="district"]').val();
              var contractType = $('[name="contractType"').val();
              var price = $('[name="price"]').val();
              var area = $('[name="area"]').val();
              var lob = $('[name="lob"]').val();

              $('[name="districtName"]').val($('[name="district"]').val());
              $('[name="typeName"]').val($('[name="type"]').val());
              $('#lob_selected').val(lob);
            });

            $('[name="searchSubmit3"]').click(function(event) {
              var propertyType = $('[name="type_2"]').val();
              var city = $('[name="city_2"]').val();
              var district = $('[name="district_2"]').val();
              var price = $('[name="price_2"]').val();
              var area = $('[name="area_2"]').val();

              $('[name="districtName_2"]').val($('[name="district_2"]').val());
              // $('#lob').val('1');
            });

            $('#viewResults').change(function(event) {
                  var oldEndResult = $('#endResult').text();
                  $('#endResult').html($(this).val());
                  var i;
                  if ($(this).val() == 10){
                      for (i = 20; i < $('#totalResults').val(); i += 10)
                      {
                          if ($('#results'+i).css('display') == 'block'){
                              $('#results'+i).addClass('hide');
                          }else{
                              break;
                          }
                      }
                  }else if ($(this).val() > 10){
                      if ($(this).val() < oldEndResult){
                        for (i = oldEndResult; i > $(this).val(); i -= 10)
                        {
                            $('#results'+ i).addClass('hide');
                        }
                      }
                      else{
                        for (i = 20; i <= $(this).val(); i += 10)
                        {
                            $('#results'+ i).removeClass('hide');
                        }
                      }
                  }
            });

            $('#searchHome_lob').change(function(event) {
              var lob = $(this).val();
              var url = $("#url").val();
              var key = 1;
              url = url+"getPropertyTypes";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: { lob: lob, key: key }
                })
                  .success(function( response ) {
                    // alert (response);
                    if (response != 0)
                        {
                          $("#propertyContainer").show();
                          $("#propertyContainer").html(response);
                          $('#searchHome_type').selectpicker();
                          $('#disabled_property').css('display', 'none');
                        }
                        else
                        {
                            $("#propertyContainer").hide();
                            $('#disabled_property').css('display', 'block');
                            $('#searchHome_disabled_type').attr('disabled', true);
                            $("[data-id='searchHome_disabled_type']").attr('disabled', true);
                            // $("#searchHome_district").hide();
                            // $("[data-id='searchHome_district']").hide();
                        }
                  });
            });
            
            $('#marketIndex_lob').change(function(event) {
              var lob = $(this).val();
              var url = $("#url").val();
              var key = 3;
              url = url+"getPropertyTypes";
               $.ajax({
                  type: "POST",
                  url: url,
                  data: { lob: lob, key: key }
                })
                  .success(function( response ) {
                    // alert (response);
                    if (response != 0)
                        {
                          $("#market_propertyContainer").show();
                          $("#market_propertyContainer").html(response);
                          $('#marketIndex_propertyType').selectpicker();
                          $('#market_disabled_property').css('display', 'none');
                        }
                        else
                        {
                            $("#market_propertyContainer").hide();
                            $('#market_disabled_property').css('display', 'block');
                            $('#marketIndex_disabled_property').attr('disabled', true);
                            $("[data-id='marketIndex_disabled_property']").attr('disabled', true);
                            // $("#searchHome_district").hide();
                            // $("[data-id='searchHome_district']").hide();
                        }
                  });
            });


            $('#shareProperty_lob').change(function(event) {
                var lob = $(this).val();
                var url = $("#url").val();
                var key = 2;
                url = url+"getPropertyTypes";
                 $.ajax({
                    type: "POST",
                    url: url,
                    data: { lob: lob, key: key }
                  })
                    .success(function( response ) {
                      // alert (response);
                      if (response != 0)
                          {
                            $("#shareProperty_propertyContainer").show();
                            $("#shareProperty_propertyContainer").html(response);
                            $('#shareProperty_type').selectpicker();
                            $('#shareProperty_disabled_property').css('display', 'none');
                          }
                          else
                          {
                              $("#shareProperty_propertyContainer").hide();
                              $('#disabled_property').css('display', 'block');
                              $('#shareProperty_disabled_type').attr('disabled', true);
                              $("[data-id='shareProperty_disabled_type']").attr('disabled', true);
                              // $("#searchHome_district").hide();
                              // $("[data-id='searchHome_district']").hide();
                          }
                    });
            });

            $('.contact_button').click(function(event) {
              // alert($(this).attr('id'));
              $('#propertyID').val($(this).attr('id'));
            });

            

            $('#contact_form_btn').click(function(event) {
              // alert($('#propertyID').val());
              var firstname = $('#property_first_name').val();
              var lastname = $('#property_last_name').val();
              var email = $('#property_email').val();
              var phone = $('#property_phone').val();
              var comments = $('#property_form_textarea').val();
              var propertyID = $('#propertyID').val();
                var url = $("#url").val();
                url = url+"insertContact";
                 $.ajax({
                    type: "POST",
                    url: url,
                    data: { firstname: firstname, lastname: lastname, email:email, phone:phone, comments:comments, propertyID: propertyID }
                  })
                    .success(function( response ) {
                        if (response == 1){
                            $('#success_message').removeClass('hide');
                            jQuery("#success_message").delay(2000).fadeOut("slow",function(){
                                $('#success_message').addClass('hide');
                                $('#property_form')[0].reset();
                            });
                        }else{
                            $('#failure_message').removeClass('hide');
                            jQuery("#failure_message").delay(2000).fadeOut("slow",function(){
                                $('#failure_message').addClass('hide');
                            });
                        }
                            
                        // alert(response);
                    });
            });
            

        });


function favorites(propertyID, color)
{
    var propertyID = propertyID;
    var url = $('#url').val();
    var userID = $('#userID').val();
    if ($('#icon_'+propertyID).attr('class') == 'properties_star_icon_orange')
    {
        $.ajax({
          url: url+'deleteFavorite',
          type: "POST",
          data: {userID: userID, propertyID: propertyID}
        })
        .success(function(response) {
            $('#icon_'+propertyID).attr('src', url+'application/static/images/icon_gray_star.png');
            $('#icon_'+propertyID).removeClass('properties_star_icon_orange');
            $('#icon_'+propertyID).addClass('properties_star_icon_gray');
        });

    }else
        if($('#icon_'+propertyID).attr('class') == 'properties_star_icon_gray')
        {
            $.ajax({
              url: url+'insertFavorite',
              type: "POST",
              data: {userID: userID, propertyID: propertyID}
            })
            .success(function(response) {
              // alert(response);
              $('#icon_'+propertyID).attr('src', url+'application/static/images/icon_orange_star.png');
              $('#icon_'+propertyID).removeClass('properties_star_icon_gray');
              $('#icon_'+propertyID).addClass('properties_star_icon_orange');
            });
        }
}

function checkValidation()
{
    if ($('[name="property_chkbx[]"]:checked').length > 3)
    {
      alert("You can only choose up to 3 properties for comparison.");
      return false;
    }else if ($('[name="property_chkbx[]"]:checked').length < 2){
      alert("You must choose at least 2 properties for comparison.");
      return false;
    }else{
      return true;
    }

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
            $("#caret").removeClass('caret');
            $("#caret").addClass('caret_reversed');
            if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    $('.search_components2').animate({marginTop:"20px"});
                    $('.search_btn_submit2').animate({marginTop:"20px"});
                }
            else 
                {
                    $('.search_components2').animate({marginTop:"5px"});
                    $('.search_btn_submit').animate({marginTop:"45px"});
                }
        }
        else 
        {
            $(".search_bottom_row").slideUp("slow");
            $("#caret").removeClass('caret_reversed');
            $("#caret").addClass('caret');
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

$('.properties_share_btn').click(function(event) {
    // alert($(this).val());
    if ($('#properties_share_div'+ $(this).val()).css('display') == 'none'){
      $("#properties_share_div" + $(this).val()).slideDown("slow");
    }
    else{
      $("#properties_share_div" + $(this).val()).slideUp("slow");
    }
});

function toggleVisibility2 (){
    var margintop = $('#footer_div').css('margin-top');
if ($('.property_alert_bottom_row').css('display') == 'none')
    {
        $(".property_alert_bottom_row").slideDown("slow");
        $("#caret").removeClass('caret');
        $("#caret").addClass('caret_reversed');
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
        $("#caret").removeClass('caret_reversed');
        $("#caret").addClass('caret');
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
