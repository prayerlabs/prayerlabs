$(document).ready(function(){
  $("#add_post").on('click', function(){
    $("#add_post_form").show('slow');
    $("#remove_post").show();
    $(this).hide();
  });
  $("#remove_post").on('click', function(){
    $("#add_post_form").hide('slow');
    $("#add_post").show();
    $(this).hide();
  });
  $("#submit_post").on('click', function(){
  	var url = $(this).attr('to');
  	var description = $("#detail").val();
  	$.ajax({
        url: url,
        type: "POST",
        data: "description="+description,
        success: function (result) {
            if(result == "true"){
                $("#add_post_form").hide('slow');
                window.location = self.location;
            }
            else{
            	alert("Sorry! not able to post your details :(");
            }
        }
    });
  });
});