<div id="view">
	<div id="tabel" url="<?= base_url($global->url.'tabel')?>">
		<div class="text-center"><i class="fa fa-spin fa-circle-o-notch"></i> Loading data. Please wait...</div>
	</div>  
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var url=$('#tabel').attr('url');
		setTimeout(function () {
		$("#tabel").load(url);
		//alert(url);
		}, 200); 		
	})	
</script>
<?php include 'action.php';?>