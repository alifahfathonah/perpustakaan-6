<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){
		$('#btnHello').click(function() {
			var fullname = $('#fullname').val();
			$.ajax({
				url: "<?php echo site_url('Belajar/getName') ?>",
				type: 'POST',
				data: {name: fullname}
			})
			.done(function(result, e) {
				$('#result1').html(result);
				console.log(e);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});

</script>
</head>
<body>


</body>
</html>