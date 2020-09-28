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
									<label>Nama File</label>
									<input required type="text" name="upload_namaberkas" class="form-control" title="Harus di isi">
								</div>							
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea  required class="summernote form-control" name="upload_deskripsi" rows="8"></textarea>
								</div>
								<div class="form-group">
									<label>Berkas</label>
									<input type="file" name="upload_berkas">
									<p class="text-danger">Format PDF, max 5 MB</p>
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
<script type="text/javascript">
	$(document).ready(function() {
  		$('.summernote').summernote({
		  height: 200,   //set editable area's height
		  codemirror: { // codemirror options
		    theme: 'monokai'
		  }  			
  		});
	});
</script>
