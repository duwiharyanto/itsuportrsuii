<div class="row">
	<div class="col-sm-12">
		<div id="view">
			<div class="row">
				<div class="col-sm-12">
					<div id="tabel" url="<?= base_url($global->url.'tabel')?>">
						<div class="text-center"><i class="fa fa-spin fa-circle-o-notch"></i> Loading data. Please wait...</div>
					</div>					
				</div>	
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.select').select2();
	$(document).ready(function(){
		var url=$('#tabel').attr('url');
		setTimeout(function () {
		$("#tabel").load(url);
		//alert(url);
		}, 200);
	})
    function cari(){
        var berkas=$('[name=berkas_nama]').val()
        var kategoriid=$('[name=berkas_kategoriid]').val()
        var url=$('#btncari').attr('url')
        $.ajax({
            type:'POST',
            url:url,
            data:{berkas:berkas,kategoriid:kategoriid},
            success:function(data){
                $("#tabel").html(data);
            }
        })
        return false
    }
	function cetak(){
		var nama='0';
		var nomorumah='0';
		if($('[name=warga_nama]').val()){
			nama=$('[name=warga_nama]').val()
		}
		if($('[name=warga_norumah]').val()){
			nomorumah=$('[name=warga_norumah]').val()
		}
		var url=$('#btncetak').attr('url')
		var reurl=url+'/'+nama+'/'+nomorumah
		window.open(
          	reurl,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
	}
</script>
<?php include 'action.php';?>
