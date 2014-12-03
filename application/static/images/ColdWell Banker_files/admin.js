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