<div class="row mb-4">
	<div class="col-sm-3">
		<label>Tanggal</label>
		<input type="text" class="form-control datepicker" name="tglmulai" value="<?=date('d-m-Y')?>">
	</div>
	<div class="col-sm-3">
		<label>Sampai</label>
		<input type="text" class="form-control datepicker" name="tglselesai" value="<?=date('d-m-Y')?>">
	</div> 
	<div class="col-sm-1">
		<label>&nbsp</label>
		<button class="btn btn-primary btn-block" onclick="cari(this)" url="<?=base_url($global->url.'cari')?>">Cari</button>
	</div> 
	<div class="col-sm-1">
		<label>&nbsp</label>
		<button class="btn btn-primary btn-block" onclick="cetak(this)" url="<?=base_url($global->url.'cetakbytanggal')?>">Print</button>
	</div> 	
</div>	
<div id="view">	
	<div class="text-center" id="ajaxloading" style="display: none"><i class="fa fa-spin fa-circle-o-notch" ></i> Loading data. Please wait...</div>
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
    cari = function(btn){
      var tglmulai=$('[name=tglmulai]').val();
      var tglselesai=$('[name=tglselesai]').val();
      var url=$(btn).attr('url');
      $.ajax({
        type:'POST',
        url:url,
        data:{tglmulai:tglmulai,tglselesai:tglselesai},
        success:function(data){
          $("#view").html(data);       
        }
      })
      return false;        
    }
    cetak = function(btn){
    	var tglmulai=$('[name=tglmulai]').val();
    	var tglselesai=$('[name=tglselesai]').val();
    	var url=$(btn).attr('url');
    	url=url+'/'+tglmulai+'/'+tglselesai
		window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')       
    }	    	
</script>
<?php include 'action.php';?>