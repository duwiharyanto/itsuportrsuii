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
									<label>Balita</label>
									<select class="form-control select" name="balita_idwarga">
										<?php foreach($warga AS $val):?>
											<option value="<?=$val->warga_id?>"><?= ucwords($val->warga_nama)?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>ORang Tua</label>
									<select class="form-control select" name="balita_idorangtua">
										<?php foreach($warga AS $val):?>
											<option value="<?=$val->warga_id?>"><?= ucwords($val->warga_nama)?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<textarea required type="text" name="balita_keterangan" class="form-control" title="Harus di isi" rows="5"></textarea>
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
