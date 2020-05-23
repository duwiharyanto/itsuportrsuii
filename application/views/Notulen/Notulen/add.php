<div class="row">
	<div class="col-md-12">
	    <div class="panel panel-info">
	        <div class="panel-heading"> <?=ucwords($global->headline)?>
	            <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
	        </div>
	        <div class="panel-wrapper collapse in" aria-expanded="true">
	            <div class="panel-body">
					<form id="forminput" class="formaction" method="POST" action="javascript:void(0)" url="<?= base_url($global->url)?>"  enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">		
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">	
								<div class="form-group">
									<label>Token</label>
									<input readonly required type="text" name="notulen_param" class="form-control" title="Harus di isi" value="<?=$notiket?>">
									<p class="text-danger">Otomatis di generate sistem</p>
								</div>    
								<div class="form-group">
									<label>Notulen</label>
									<input required type="text" name="notulen_nama" class="form-control" title="Harus di isi">
								</div>
								<div class="form-group">
									<label>Isi/Deskripsi</label>
									<textarea required class="form-control" rows="7" name="notulen_isi"></textarea>
								</div>								
			  					<div class="form-group">
			  						<label>Status</label>
									<div class="radio-list">
									    <label class="radio-inline p-0">
									        <div class="radio radio-info">
									            <input required name="notulen_status" checked value="" type="radio" >
									            <label for="radio1">Aktif</label>
									        </div>
									    </label>
									    <label class="radio-inline">
									        <div class="radio radio-info">
									            <input required required name="notulen_status" value="1" type="radio">
									            <label for="radio2">Non Aktif </label>
									        </div>
									    </label>
									</div>			  								
			  					</div>											 
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">						
								<div class="form-group">
									<button type="submit" value="submit" name="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
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

