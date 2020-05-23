<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<h3 class="box-title m-b-30">Sample Basic Forms</h3>
			<div class="row">
				<div class="col-sm-12 col-xs-12">
			  		<form id="forminput" method="POST" onsubmit="update()" action="javascript:void(0)" url="<?= base_url($global->url.'edit')?>" enctype="multipart/form-data">
			  			<div class="row">
			  				<div class="col-sm-12">	
			  					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">		      		
			  					<div class="form-group d-none">
			  						<label>id</label>
			  						<input required readonly type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->user_id?>">
			  					</div>													
			  					<div class="form-group">
			  						<label>Nama</label>
			  						<input required type="text" name="user_nama" class="form-control" title="Harus di isi" value="<?=$data->user_nama?>">
			  					</div>
			  					<div class="form-group">
			  						<label>Username</label>
			  						<input required name="user_username" class="form-control" type="text" value="<?=$data->user_username?>"></input>
			  					</div>
			  					<div class="form-group">
			  						<label>Email</label>
			  						<input required name="user_email" class="form-control" type="text" value="<?=$data->user_email?>"></input>
			  					</div>		      			
			  					<div class="form-group">
			  						<label>Password</label>
			  						<input  id="password" name="user_password" class="form-control" type="password"></input>
			  					</div>
			  					<div class="form-group">
			  						<label>Confirm Password</label>
			  						<input class="form-control" type="password" equalto="#password" ></input>
			  					</div>														
			  					<div class="form-group">
			  						<label>Level</label>
			  						<select required class="form-control select" name="user_level" style="width: 100%">
			  							<?php foreach($level AS $row):?>
			  								<option value="<?=$row->level_id?>" <?=$data->user_level==$row->level_id ? 'selected':''?>><?=ucwords($row->level_nama)?></option>
			  							<?php endforeach;?>
			  						</select>
			  					</div>	
			  					<div class="form-group">
			  						<label>Level</label>
									<div class="radio-list">
									    <label class="radio-inline p-0">
									        <div class="radio radio-info">
									            <input required name="user_status" <?= $data->user_status=='1' ? 'checked':''?> value="1" type="radio" >
									            <label for="radio1">Aktif</label>
									        </div>
									    </label>
									    <label class="radio-inline">
									        <div class="radio radio-info">
									            <input required required name="user_status" <?= $data->user_status=='0' ? 'checked':''?> value="" type="radio">
									            <label for="radio2">Non Aktif </label>
									        </div>
									    </label>
									</div>			  								
			  					</div>
			  					<div class="form-group">
			  						<label>Foto</label>
			  						<input class="form-control" type="file" name="user_foto" ></input>
			  						<p class="text-danger">Ukuram 1 Mb, format jpg|png</p>
			  						<img src="<?= $data->user_foto ? base_url('upload/profil/'.$data->user_foto):base_url('plugins/images/profile.jpg')?>" style="width:64px;height: 64px">
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