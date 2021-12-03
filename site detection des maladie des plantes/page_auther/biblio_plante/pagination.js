$(document).ready(function(){
	var totalPage = parseInt($('#totalPages').val());	
	var pag = $('#pagination').simplePaginator({
		totalPages: totalPage,
		maxButtonsVisible: 5,
		currentPage: 1,
		nextLabel: 'Next',
		prevLabel: 'Prev',
		firstLabel: 'First',
		lastLabel: 'Last',
		clickCurrentPage: true,
		pageChange: function(page) {			
			$("#content").html('<strong>loading...</strong>');
            $.ajax({
				url:"load_data.php",
				method:"POST",
				dataType: "json",		
				data:{pages:	  page},
				success:function(responseData){
					$('#content').html(responseData.html);
				}
			});
		}
	});
});