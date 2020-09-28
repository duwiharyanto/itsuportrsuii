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
			  						<input required readonly type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->trobelsistem_id?>">
			  					</div>													
								<div class="form-group">
									<label>Nomor Tiket</label>
									<input readonly required type="text" name="trobelsistem_ticket" class="form-control" title="Harus di isi" value="<?=$data->trobelsistem_ticket?>">
									<p class="text-danger">Otomatis di generate sistem</p>
								</div>    
								<div class="form-group">
									<label>Trobleshoot/Error</label>
									<input readonly required type="text" name="trobelsistem_nama" class="form-control" title="Harus di isi" value="<?=$data->trobelsistem_nama?>">
								</div>
								<div class="form-group">
									<label>Unit</label>
									<select class="form-control select" name="trobelsistem_unitid">
										<?php foreach($unit As $row):?>
											<option value="<?=$row->unit_id?>" <?=$row->unit_id==$data->trobelsistem_unitid ? 'selected':''?>><?=ucwords($row->unit_nama)?></option>
										<?php endforeach;?>
									</select>
								</div>									
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea readonly required class="form-control summernote" name="trobelsistem_deskripsi" rows="8"><?=$data->trobelsistem_deskripsi?></textarea>
								</div> 
								<div class="form-group">
									<label>Catatan</label>
									<textarea required class="form-control summernote" name="trobelsistem_catatan" rows="8"><?=$data->trobelsistem_catatan?></textarea>
									<p class="text-danger">Hanya diisi IT</p>
								</div> 
								<div class="form-group">
									<label>Status Tempat Tinggal</label>
				      				<div class="">
				      					<?php foreach($status AS $row):?>
					      					<label style="padding-right: 20px">
					      						<input required <?=$row->status_id==$data->trobelsistem_idstatus ? 'checked':''?> name="trobelsistem_idstatus" value="<?=$row->status_id?>" type="radio" >
					      						<?=ucwords(str_replace('_', ' ', $row->status_status))?>
					      					</label>				      						
				      					<?php endforeach;?>				      					
				      				</div>
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
<script type="text/javascript">
	$(document).ready(function() {
  		$('.summernote').summernote({
		  height: 300,   //set editable area's height
		  codemirror: { // codemirror options
		    theme: 'monokai'
		  }  			
  		});
	});
</script>
