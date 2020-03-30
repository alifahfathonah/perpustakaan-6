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
				$('#fullname').val(" ");
				$('#dio').append('<li>'+fullname+'</li>');
				console.log(e);
			})
			.fail(function() {
				console.log("error");
			})			
		});

        
        $.ajax({
            type  : 'GET',
            url   : "<?php echo site_url('Belajar/cobs') ?>",
            dataType : 'json',
            

        })
        .done(function(data){
        		console.log(data);
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<li>'+data[i].name+'</li>';
                }
                $('#dio').html(html);
        })
	});

</script>
</head>
<body>

	Name: <input type="text" id="fullname" />
	<button id="btnHello">Oke</button>
	<br />
	<span id="result1"></span>

	<ol id="dio">
			
	</ol>

</body>
</html>