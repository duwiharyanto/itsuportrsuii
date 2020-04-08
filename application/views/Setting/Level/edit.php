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
				      				<input required readonly type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->level_id?>">
				      			</div>													
				      			<div class="form-group">
				      				<label>Nama Level</label>
				      				<input required type="text" name="level_nama" class="form-control" title="Harus di isi" value="<?=$data->level_nama?>">
				      			</div>
				      			<div class="form-group">
				      				<label>Dashboard(URL)</label>
				      				<input required type="text" name="level_dashboard" class="form-control" title="Harus di isi" value="<?=$data->level_dashboard?>">
				      			</div>	      																
				      			<div class="form-group">
				      				<label>Level</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="level_status" <?= $data->level_status==1 ? 'checked':''?> value="1" type="radio" >
				      						Aktif
				      					</label>
				      					<label>
				      						<input required required name="level_status" <?= $data->level_status==0 ? 'checked':''?> value='' type="radio">
				      						Non Aktif
				      					</label>
				      				</div>								
				      			</div>	      				      			 
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col-sm-12">						
			  					<div class="form-group">
			  						<button type="submit" value="submit" name="submit" class="btn btn-warning btn-block btn-flat">Update</button>
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