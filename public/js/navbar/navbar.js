// $(function() {

// 	//highlight the current nav
// 	$("#about a:contains('About')").parent().addClass('active');
// 	$("#photographer_pack a:contains('Photographer\'s Package')").parent().addClass('active');
// 	$("#joomla a:contains('Joomla Training')").parent().addClass('active');
//    $("#contact a:contains('Contact')").parent().addClass('active');
	
// 	if($("#photographer_pack a:contains('Photographer\'s Package')").parent().hasClass('active')){
// 	$(".dropdown a:contains('Our Programs')").parent().addClass('active');
// 	}
	
// 	if($("#joomla a:contains('Joomla Training')").parent().hasClass('active')){
// 	$(".dropdown a:contains('Our Programs')").parent().addClass('active');
// 	}

// 	//make menus drop automatically
// 	$('ul.nav li.dropdown').hover(function() {
// 		$('.dropdown-menu', this).fadeIn();
// 	}, function() {
// 		$('.dropdown-menu', this).fadeOut('fast');
// 	});//hover
	
// }); //jQuery is loaded

$(function() {

	//highlight the current nav
	$("#nav1 a:contains('รับสิ่งส่งตรวจ')").parent().addClass('active');
	$("#nav2 a:contains('ลงผลตรวจ')").parent().addClass('active');
	$("#nav3 a:contains('ย้อนดูผลตรวจ')").parent().addClass('active');
    $("#nav4 a:contains('สำเนาผลตรวจ')").parent().addClass('active');
	
	// if($("#photographer_pack a:contains('Photographer\'s Package')").parent().hasClass('active')){
	// $(".dropdown a:contains('Our Programs')").parent().addClass('active');
	// }
	
	// if($("#joomla a:contains('Joomla Training')").parent().hasClass('active')){
	// $(".dropdown a:contains('Our Programs')").parent().addClass('active');
	// }

	// //make menus drop automatically
	// $('ul.nav li.dropdown').hover(function() {
	// 	$('.dropdown-menu', this).fadeIn();
	// }, function() {
	// 	$('.dropdown-menu', this).fadeOut('fast');
	// });//hover
	
}); //jQuery is loaded