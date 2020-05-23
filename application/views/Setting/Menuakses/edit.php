<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			
			<div class="row">
				<div class="col-sm-12 col-xs-12">
			  		<form id="forminput" method="POST" onsubmit="update()" action="javascript:void(0)" url="<?= base_url($global->url.'edit')?>" enctype="multipart/form-data">
			  			<div class="row">
			  				<div class="col-sm-12">	
			  					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">		      		
				      			<div class="form-group d-none">
				      				<label>id</label>
				      				<input required readonly type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->menu_id?>">
				      			</div>													
				      			<div class="form-group">
				      				<label>Ikon</label>
				      				<input required type="text" name="menu_ikon" class="form-control" title="Harus di isi" value="<?=$data->menu_ikon?>">
				      			</div>	
								<div class="form-group">
									<label>Akses</label>
									<div class="input-group">
										<input required type="text" name="menu_akses_level" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1"  value="<?=$data->menu_akses_level?>">
										<div class="input-group-prepend">
											<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#leveluser">Level User</button>
										</div>
									</div>
									<p class="help-block text-danger">Pisahkan dengan 'koma'.</p>
								</div>	
				      			<div class="form-group">
				      				<label>Menu/Fitur</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="menu_baru" <?= $data->menu_baru==0 ? 'checked':''?> value="0" type="radio" >
				      						Lama
				      					</label>	      					
				      					<label style="padding-right: 20px">
				      						<input required name="menu_baru" <?= $data->menu_baru==1 ? 'checked':''?> value="1" type="radio" >
				      						Baru
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="menu_baru" <?= $data->menu_baru==2 ? 'checked':''?> value='2' type="radio">
				      						Berbayar
				      					</label>
				      					<label>
				      						<input required required name="menu_baru" <?= $data->menu_baru==3 ? 'checked':''?> value='3' type="radio">
				      						Development
				      					</label>	      					
				      				</div>
				      			</div>							
				      			<div class="form-group">
				      				<label>Level</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="menu_status" <?= $data->menu_status==1 ? 'checked':''?> value="1" type="radio" >
				      						Aktif
				      					</label>
				      					<label>
				      						<input required required name="menu_status" <?= $data->menu_status==0 ? 'checked':''?> value='' type="radio">
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
<div class="modal fade" id="leveluser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h4 class="modal-title" id="myModalLabel">Level User</h4>
	    </div>
      <div class="modal-body">
        <table class="table table-striped table-hover" width="100%"> 
             <tr>
             	<th>No</th>
             	<th>Id</th>
             	<th>Level</th>
             </tr>
             <?php $no=1;?>
             <?php foreach($level AS $row):?>
             	<tr>
             		<td><?=$no?></td>
             		<td><?=$row->level_id?></td>
             		<td><?= ucwords($row->level_nama)?></td>
             	</tr>
             <?php $no++;?>
             <?php endforeach;?>    
        </table>
      </div>
      <div class="modal-footer no-bd">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php include 'action.php'?>