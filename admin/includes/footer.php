</div><br><br>
	<!-- admin footer -->
	<footer class="text-center" id="footer">&copy; Copyright 2017-2018 Mazzz Guitars</footer>
	
	<script>
	function updateSizes(){
		var sizeString = '';
		for(var i = 1; i <= 12; i++){
			if($('#size'+i).val() != ''){
				sizeString += $('#size'+i).val()+':'+$('#qty'+i).val()+',';
			}
		}
		
		$('#sizes').val(sizeString);
	}
	
	function get_child_options(){
		var parentID = $('#parent').val();
		$.ajax({
			url: '/onlineShop/admin/parsers/child_categories.php',
			type: 'POST',
			data: {parentID : parentID},
			success: function(data){
				$('#child').html(data);
			},
			error: function(){alert("Something went wrong with the child options.")},
		});
		
	}
		$('select[name="parent"]').change(get_child_options);
	</script>
</body>
</html>