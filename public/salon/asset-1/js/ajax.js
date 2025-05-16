$(document).on("click", ".metismenu li a, .navbar-nav  li a", function(e) {
	e.preventDefault();
	var page = $(this).attr("href");
	
	if ($(this).attr("target") == "_self") {window.location.href= page; return true};
	if ($(this).attr("target") == "_blank") window.open(page, "_blank");

	if (page == "javascript: void(0);") return false;

	window.location.hash = page;

	$(".metismenu li, .metismenu li a").removeClass("active");
	$(".metismenu ul").removeClass("in");

	$(".metismenu a").each(function() {
		var pageUrl = window.location.hash.substr(1);
		if ($(this).attr("href") == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("mm-active"); // add active to li of the current link
			$(this).parent().parent().addClass("mm-show");
			$(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
			$(this).parent().parent().parent().addClass("mm-active");
			$(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().addClass("mm-active");
		}
	});

	$(".navbar-nav a").removeClass("active"); 
	$(".navbar-nav li").removeClass("active"); 
	$(".navbar-nav a").each(function () {
		var pageUrl = window.location.hash.substr(1);
		if ( $(this).attr('href') == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active");
			$(this).parent().parent().addClass("active");
			$(this).parent().parent().parent().addClass("active");
			$(this).parent().parent().parent().parent().addClass("active");
			$(this).parent().parent().parent().parent().parent().addClass("active");
		}
	});

	if (page == "javascript: void(0);") return false;
});