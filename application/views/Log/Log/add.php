<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<h3 class="box-title m-b-30">Sample Basic Forms</h3>
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<form id="forminput" class="formaction" method="POST" action="javascript:void(0)" url="<?= base_url($global->url)?>"  enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">		
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">		      						
								<div class="form-group">
									<label>Nama</label>
									<input required type="text" name="user_nama" class="form-control" title="Harus di isi">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input required name="user_username" class="form-control" type="text"></input>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input required name="user_email" class="form-control" type="text"></input>
								</div>	      			
								<div class="form-group">
									<label>Password</label>
									<input required id="password" name="user_password" class="form-control" type="password"></input>
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input required class="form-control" type="password" equalto="#password"></input>
								</div>	
								<div class="form-group">
									<label>Level</label>
									<select required class="form-control select" name="user_level" style="width: 100%">
										<?php foreach($level AS $row):?>
											<option value="<?=$row->level_id?>"><?=ucwords($row->level_nama)?></option>
										<?php endforeach;?>
									</select>
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
	//CKEDITOR.replace('editor1');
</script>
