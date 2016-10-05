$(function() {
    $('#message_fild').keyup(function(event) {
    	if(event.keyCode == 13) {
        	$('#send_form').submit();
    	}
    });
});