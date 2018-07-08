// (function(){
// 	$('#emailModal').modal();
// })();

$('#emailModalOpen').on('click', function() {
  $('#emailModal').modal();
});


$('#logout').on('click', function() {
    $.ajax({
	    url: './index.php?argument=logOut',
	    success: function(data){
	        window.location.href = data;
	        console.info(data);
	    }
	});
});

