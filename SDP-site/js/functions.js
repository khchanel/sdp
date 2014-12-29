function submitform()
{
	document.forms["form"].submit();
}

$(document).bind("mobileinit", function(){
  $.mobile.buttonMarkup.hoverDelay = 0;
});

