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
			  						<input required readonly type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->troubleshoot_id?>">
			  					</div>													
								<div class="form-group">
									<label>Nomor Tiket</label>
									<input readonly required type="text" name="troubleshoot_ticket" class="form-control" title="Harus di isi" value="<?=$data->troubleshoot_ticket?>">
									<p class="text-danger">Otomatis di generate sistem</p>
								</div>    
								<div class="form-group">
									<label>Trobleshoot/Error</label>
									<input  required type="text" name="troubleshoot_nama" class="form-control" title="Harus di isi" value="<?=$data->troubleshoot_nama?>">
								</div>
								<div class="form-group">
									<label>Komputer Id</label>
									<input  required type="text" name="troubleshoot_komputer" class="form-control" title="Harus di isi" value="<?=$data->troubleshoot_komputer?>">
								</div>								
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea  required class="form-control" name="troubleshoot_deskripsi" rows="8"><?=$data->troubleshoot_deskripsi?></textarea>
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