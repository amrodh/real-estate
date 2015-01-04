jQuery(document).ready(function($) {
	$(".changePasswordAnchor").click(function(){
		$(".changePasswordContainer").slideDown('slow');
		$(this).hide();
	});

	$(".changePasswordCancel").click(function(){
		$(".changePasswordContainer").slideUp('slow');
		$(".changePasswordAnchor").fadeIn('slow');
	});	


});

var abc = 0; 


function checkUnitName()
{

	var unitChange = $("#unitName").attr('data-change');
	var unitValue = $("#unitName").val();

	if(unitChange == 0){
		$("#unitEditForm").submit();
	}
	else{

		url =$("#base_url").val();
		url += 'admin/unitNameValidation';
		$.ajax({
		  type: "GET",
		  url: url,
		  data: { value: unitValue }
		})
		  .success(function( msg ) {
		  	  if(msg == 'false'){
		  	  	alert('Duplicate Title name');
		  	  	return false;
		  	  }else{
		  	  	$("#confirmedit_hidden").val('1');
		  	  	$("#unitEditForm").submit();
		  	  	return;
		  	  }
		  });

	}

	return true;
}

function checkProjectName()
{
	var projectChange = $("#projectName").attr('data-change');
	var projectValue = $("#projectName").val();

	if(projectChange == 0){
		$("#projectEditForm").submit();
	}
	else{
		url =$("#base_url").val();
		url += 'admin/projectNameValidation';
		$.ajax({
		  type: "GET",
		  url: url,
		  data: { value: projectValue }
		})
		  .success(function( msg ) {

		  	  if(msg == 'false'){
		  	  	alert('Duplicate project name. Please choose another.');
		  	  	return false;
		  	  }else{
		  	  	$("#confirmedit_hidden").val('1');
		  	  	$("#projectEditForm").submit();
		  	  	return;
		  	  }
		  });

	}

	return true;
}

 $("#unitName").change(function(){
            var defaultValue = $(this).attr('data-default');
            var change = $(this).val();

            if(change != defaultValue)
            	$(this).attr('data-change',1);
            else
            	$(this).attr('data-change',0);
}); 

$("#projectName").change(function(){
            var defaultValue = $(this).attr('data-default');
            var change = $(this).val();

            if(change != defaultValue)
            	$(this).attr('data-change',1);
            else
            	$(this).attr('data-change',0);
}); 


$('#add_more').click(function() {
            $(this).before($("<div/>", {
            id: 'filediv'
            }).fadeIn('slow').append($("<input/>", {
            name: 'img[]',
            type: 'file',
            id: 'file'
            })));
          });

          $('body').on('change', '#file', function() {
              if (this.files && this.files[0]) {
                  abc += 1; // Incrementing global variable by 1.
                  var z = abc - 1;
                  var x = $(this).parent().find('#previewimg' + z).remove();
                  $(this).before("<div id='abcd" + abc + "' class='abcd'><img style='margin-bottom: 3%;width: 55%;height:100px;' id='previewimg" + abc + "' src=''/></div>");
                  var reader = new FileReader();
                  reader.onload = imageIsLoaded;
                  reader.readAsDataURL(this.files[0]);
                  $(this).hide();
                  $("#abcd" + abc).append($("<img/>", {
                    id: 'img',
                    src: '../../application/static/images/x.png',
                    alt: 'delete'
                  }).click(function() {
                    $(this).parent().parent().remove();
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


$("#newsletterSelect").change(function(){

		$(".newsletterContent").each(function(){
			$(this).addClass('hide');
		});

		value = $(this).val();
		$("#"+value).removeClass('hide');
	});

$('#addMoreIDs').click(function(event) {
	$.getScript("../../application/static/js/getDelete.js");
	if ($('#propertyID').val().match(/^\d+$/))
	{
		$('#propertiesIDs').append('<tr id="'+$('#propertyID').val()+'"><td>'+$('#propertyID').val()+'<input type="hidden" name="properties[]" value="'+$('#propertyID').val()+'"></td><td><img id"'+$('#propertyID').val()+'" src="../../application/static/images/x.png" class="deleteBtn"></td></tr>');
	}
	else{
		$('#numeric_alert').removeClass('hide');
		jQuery("#numeric_alert").delay(2000).fadeOut("slow",function(){
            $('#numeric_alert').addClass('hide');
        });
		
		// alert('');
	}
	
	
});

	

$('.bxslider').bxSlider({
    auto:true
});


$("#checkall").click(function(){
	if($('#checkall').is(':checked')){
		$(".singlecheck").each(function(){
			$(this).prop('checked', true); 
			$(this).attr('disabled','disabled');
		});
	}else{
		$(".singlecheck").each(function(){
			$(this).prop('checked', false); 
			$(this).removeAttr('disabled');
		});
	}
});


function checkSingleNewsletterForm()
{
	if($('#checkall').is(':checked'))
		$("#singleFormID").submit();


	$(".singlecheck").each(function(){
		if($(this).is(':checked'))
			$("#singleFormID").submit();
	});

	return false;
}

function completeChangePassword()
{
	var currentPassword = $("#changePassword_current").val();
	var newPassword_1   = $("#changePassword_new_1").val();
	var newPassword_2   = $("#changePassword_new_2").val();

	if(newPassword_1 != newPassword_2){
		alert('Password not confirmed right');
		return false;
	}

	if(currentPassword == newPassword_2){
		alert('Pick a new password and try again');
		return false;
	}

	var userID          = $("#userID").val();
	var url  			= $("#url").val();


	url = url+"admin/checkpasswordchange.php";

		$.ajax({
		  type: "GET",
		  url: url,
		  data: { current: currentPassword , new_1 : newPassword_1 , id : userID  }
		})
		  .success(function( msg ) {
		     if(msg == 'false')
		     	{
		     		alert('Proccess Failed, Try again');
		     		return false;
		     	}
		     else
			     {
					$("#passwordChangeForm").hide();
					$("#successAlert").removeClass('hide');
					$("#successAlert").fadeIn('slow');
			     }
		  });

	
}

function socialLinkDelete(id)
{
	var confirm = window.confirm("Are you sure?");

	if(confirm){

	var url = $("#base_url").val();
	url = url+"admin/deletesociallink";

		$.ajax({
		  type: "GET",
		  url: url,
		  data: { id : id  }
		})
		  .success(function( msg ) {
		  		$("#social_"+id).fadeOut('slow');
		  });

		
	}

	return;
}

function newslettermailDelete(id)
{
	var confirm = window.confirm("Are you sure?");

	if(confirm){

	var url = $("#base_url").val();
	url = url+"admin/deletenewslettermail";

		$.ajax({
		  type: "GET",
		  url: url,
		  data: { id : id  }
		})
		  .success(function( msg ) {
		  		$("#email_"+id).fadeOut('slow');
		  });

		
	}

	return;
}

	$(".usersLandingContent").click(function(){
		//alert("success");
	});

function socialLinkEdit(id, name, link)
{
	htmlContent = '<form action="" method="post" name="form">';
	htmlContent += '<input type="hidden" name="icon_id" value="'+id;
	htmlContent +='"><td><form action="" method="post" enctype="multipart/form-data"><input type="file" name="image" required multiple>';
	htmlContent += '<input type="submit" name="submit" class="btn btn-primary" value="Submit"></form></td>';
	htmlContent += '<td><input value="'+name+'"></input></td>';
	htmlContent += '<td><input value="'+link+'"></input></td>';
	htmlContent += '<td><input style="color:white" type="submit" name="save" class="button btn btn-sm" value="Save"></td>';
	htmlContent += '<td><input style="color:white" type="submit" name="cancel" class="button btn btn-sm" value="Cancel"></td>';
	htmlContent += '</form>';
	alert(htmlContent);

	// $("#social_"+id).html("#social_"+id);
	document.getElementById("social_"+id).innerHTML = htmlContent;
}

function projectImageDelete(id)
{
	var confirm = window.confirm("Are you sure?");

	if(confirm){

	var url = $("#base_url").val();
	url = url+"admin/deleteprojectimage";

		$.ajax({
		  type: "GET",
		  url: url,
		  data: { id : id  }
		})
		  .success(function( msg ) {

		  		$(".image_"+id).fadeOut('slow');
		  		
		  		
		  		//$('.sliderContent').fadeOut('slow',function(){
		  			$('.bxslider').remove();
		  			$('.sliderContent').html(msg);
		  			$('.bxslider').bxSlider();
		  			//$('sliderContent').fadeIn('slow');
		  		//});
		  		
		  });

		
	}

	return;
}

function unitImageDelete(id)
{
	var confirm = window.confirm("Are you sure?");

	if(confirm){

		var url = $("#base_url").val();
		url = url+"admin/deleteunitimage";

		$.ajax({
		  type: "GET",
		  url: url,
		  data: { id : id  }
		})
		  .success(function( msg ) {
		  		$("#image_"+id).fadeOut('slow');
		  		$('.bxslider').remove();
		  		$('.sliderContent').html(msg);
		  		$('.bxslider').bxSlider();
		  });

		
	}

	return;
}