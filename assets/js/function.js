$(document).ready(function(){
	// tooltip initialization
	$('[data-toggle="tooltip"]').tooltip();
	// popovers Initialization
	$('[data-toggle="popover"]').popover();
	// sidenav initialization
	$(".button-collapse").sideNav();
	$("#tblStudents").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
		"order": [],
	});
});