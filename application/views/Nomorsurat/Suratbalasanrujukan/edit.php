<div class="row">
	<div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <?=ucwords($global->headline)?>
                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
			  		<form id="forminput" method="POST" onsubmit="update()" action="javascript:void(0)" url="<?= base_url($global->url.'edit')?>" enctype="multipart/form-data">
			  			<div class="row">
			  				<div class="col-sm-12">	
			  					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">		      		
			  					<div class="form-group d-none">
			  						<label>id</label>
			  						<input required readonly type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->suratlahir_id?>">
			  					</div>													
								<div class="form-group">
									<label>Nomor Surat</label>
									<input readonly required type="text" name="suratlahir_nomor" class="form-control" title="Harus di isi" value="<?=$data->suratlahir_nomor?>">
									<p class="text-danger">Diambil dari data tanggal sekarang <?=date('d-m-Y')?></p>
								</div>
								<div class="form-group">
									<label>Tanggal</label>
									<input required name="suratlahir_tanggal" class="form-control datepicker" type="text" value="<?=date('d-m-Y',strtotime($data->suratlahir_tanggal))?>"></input>
								</div>    
								<div class="form-group">
									<label>Nomor RM</label>
									<input required type="text" name="suratlahir_norm" class="form-control" title="Harus di isi" value="<?=$data->suratlahir_norm?>">
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input required type="text" name="suratlahir_nama" class="form-control" title="Harus di isi" value="<?=$data->suratlahir_nama?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input required name="suratlahir_tgllahir" class="form-control datepicker" type="text" value="<?=date('d-m-Y',strtotime($data->suratlahir_tgllahir))?>"></input>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="suratlahir_jeniskelamin" <?=$data->suratlahir_jeniskelamin==1 ? 'checked':''?> value="1" type="radio" >
				      						Laki - laki
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="suratlahir_jeniskelamin" <?=$data->suratlahir_jeniskelamin==0 ? 'checked':''?> value="" type="radio">
				      						Perempuan
				      					</label>				      					
				      				</div>
								</div>
								<div class="form-group">
									<label>Nama Ayah</label>
									<input required name="suratlahir_namaayah" class="form-control" type="text" value="<?=$data->suratlahir_namaayah?>"></input>
								</div>      				      			 
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col-sm-12">						
			  					<div class="form-group">
			  						<button type="submit" value="submit" name="submit" class="btn btn-warning btn-block btn-flat btn-md">Update</button>
			  					</div>														
			  				</div>
			  			</div>
			  		</form>	
                </div>
            </div>
        </div>		
	
	</div> 
</div>
<?php include 'action.php'?>