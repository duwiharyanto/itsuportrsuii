<div class="row">
	<div class="col-sm-12">
		<div id="view">
			<div class="row">
				<div class="col-sm-8">
					<div id="tabel" url="<?= base_url($global->url.'tabel')?>">
						<div class="text-center"><i class="fa fa-spin fa-circle-o-notch"></i> Loading data. Please wait...</div>
					</div>					
				</div>	
				<div class="col-sm-4">
		            <div class="panel panel-danger">
		    	        <div class="panel-heading"> <?=ucwords($global->headline)?>
		    	            <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
		    	        </div>
		    	        <div class="panel-wrapper collapse in" aria-expanded="true">
		    	            <div class="panel-body">
								<div class="row">
									<div class="col-sm-12">
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
										<div class="form-group">
											<label>Nama File</label>
											<input name="berkas_nama" class="form-control"/>
										</div>
		                                <div class="form-group">
		                                    <label>Kategori</label>
		                                    <select class="form-control select" name="berkas_kategoriid">
		                                        <option value="">Semua Kategori</option>
		                                        <?php foreach($kategori AS $row):?>
		                                            <option value="<?=$row->kategori_id?>"><?=ucwords($row->kategori_kategori)?></option>
		                                        <?php endforeach;?>
		                                    </select>
		                                </div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<button type="button" id="btncari" onclick="cari()" class="btn btn-primary btn-block btn-flat" url="<?= base_url($global->url.'tabel')?>"><span class="fa fa-search"></span> Cari</button>
										</div>
									</div>
								</div>
		    	            </div>
		    	        </div>
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
