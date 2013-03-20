$( function ($) {
	hide_messages();
});

function hide_messages(){
	$('.msg.msg_success').delay(5000).slideUp(500);
}