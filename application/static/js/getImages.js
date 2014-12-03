$(".propertyImages").each(function(){

    var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
    if(!image_src){
        var id = $(this).attr('id');
        var id = id.replace('img','');
        $('#'+id).attr('disabled','disabled');
        image_src = $("#url").val()+'/application/static/images/no_image.svg';
    }
    
    var id = $(this).attr('id');
    var id = id.replace('img','');

    $("#image_"+id).attr('src',image_src);
   
});

$('.imgModal').click(function(event) {
                var propertyId = $(this).attr('id');
                var html_output ='';
                var image_count = 0;
                var flag = 1;

                // alert(propertyId);

                var main_image_src = $("#image_"+propertyId).attr('src');
                    $("#property_mainimage").attr('src', main_image_src);

               $("#img"+propertyId+" .imagesList li").each(function(){
                    image_count++;

                    if(image_count == 1){
                        html_output += '<div class="item active"><div class="row">';
                    }

                    if(flag == 0){
                        html_output += '<div class="item"><div class="row">';
                        flag = 1;
                    }

                    html_output+= '<div class="property_thumbnail" style="margin-left:7%;"><img src="'+$(this).find('img').attr('src')+'" alt="Image" class="img-responsive"></a></div>';

                    if(image_count % 3 == 0 && flag == 1){
                        html_output += '</div></div>';
                        flag = 0;
                    }
                });

               if(image_count == 0){
                  $("#property_details_thumbnails").hide();
               }

               $("#carousal_div").html(html_output);
               $('.property_thumbnail > img').click(function (){
    // alert('hi');
                   $('#property_mainimage').attr("src", $(this).attr("src"));
                }) ;
            });


