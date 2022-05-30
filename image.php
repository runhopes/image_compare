
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function resimup()
	{
		var dosya = new FormData();
		var dosyaurl = $("#resim")[0].files[0];
		dosya.append("resim", dosyaurl);

		$.ajax({
			type:'POST',
			url:'imageup.php',
			data:dosya,
			contentType:false,
			cache:false,
			processData:false,
			success: function(msg){
				$("#sonuc").html(msg);
			}
		});

	}

	$('#ajaxcalisma').bind('ajaxStart', function(){
		$(this).show();
	}).bind('ajaxStop', function(){
		$(this).hide();
	});


	$(function(e) {
		$(document).ajaxStart(function() {
			$("#ajaxcalisma").show();
			$("#sonuc").hide();
		})
		.ajaxStop(function() {
			$("#ajaxcalisma").hide();
			$("#sonuc").show();
		});



	})

</script>
<input type="file" onchange="resimup();" name="" id="resim">
<div id="sonuc"> </div>
<div id="ajaxcalisma" style="display: none;">Lütfen bekleyin...</div>

<div id="resim1"> </div>

<div id="resim2"> </div>
