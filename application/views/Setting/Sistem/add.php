<div class="row">
	<div class="col-md-12">
	    <div class="panel panel-info">
	        <div class="panel-wrapper collapse in" aria-expanded="true">
	            <div class="panel-body">
					<form id="forminput" class="formaction" method="POST" action="javascript:void(0)" url="<?= base_url($global->url)?>"  enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">		
			    				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">		      						
				      			<div class="form-group d-none">
				      				<label>Id</label>
				      				<input required type="text" name="id" readonly class="form-control" title="Harus di isi" value="<?= $data->setting_id ? $data->setting_id:'' ?>">
				      			</div>	      			
				      			<div class="form-group">
				      				<label>Nama Sistem</label>
				      				<input required type="text" name="setting_namasistem" class="form-control" title="Harus di isi" value="<?= $data->setting_namasistem ? $data->setting_namasistem:'' ?>">
				      			</div>
				      			<div class="form-group">
				      				<label>Nama Usaha/Tempat</label>
				      				<input required name="setting_namatempat" class="form-control" type="text" value="<?= $data->setting_namatempat ? $data->setting_namatempat:'' ?>"></input>
				      			</div>
				      			<div class="form-group">
				      				<label>Pemilik</label>
				      				<input required name="setting_namapemilik" class="form-control" type="text" value="<?= $data->setting_namapemilik ? $data->setting_namapemilik:'' ?>"></input>
				      			</div>	      			
				      			<div class="form-group">
				      				<label>Email</label>
				      				<input required name="setting_email" class="form-control" type="text" value="<?= $data->setting_email ? $data->setting_email:'' ?>"></input>
				      			</div>	      			
				      			<div class="form-group">
				      				<label>Nomor Telepon</label>
				      				<input required  name="setting_notlp" class="form-control" type="text" value="<?= $data->setting_notlp ? $data->setting_notlp:'' ?>"></input>
				      			</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea required class="form-control" name="setting_alamat" rows="6"><?= $data->setting_alamat ? $data->setting_alamat:'' ?></textarea>
								</div>	
								<div class="form-group">
									<label>Logo</label>
									<input type="file" name="setting_logo" class="form-control">
									<p class="help-block text-danger">Format jpg|png, max 2 Mb <br> Resolusi terbaik 64 X 64 px</p>
									<p>File Tersimpan : <?=$data->setting_logo?></p>
									<img src="<?=base_url('upload/sistem/'.$data->setting_logo)?>" style="width: 64px;height: 64px">
								</div>																				 
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">						
								<div class="form-group">
									<button type="submit" value="submit" name="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
									<button type="button" onclick="location.reload()" name="submit" class="btn btn-warning btn-block btn-flat">Reload</button>
								</div>														
							</div>
						</div>
					</form>
	            </div>
	        </div>
	    </div>	
	    		
	</div> 
</div>
<?php include 'action.php';?>

