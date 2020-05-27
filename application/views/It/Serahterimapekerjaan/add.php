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
									<label>Nomor</label>
									<input required readonly name="serahterimapekerjaan_nomor" class="form-control" value="<?=$nomor?>" />
								</div>
								<div class="form-group">
									<label>Tanggal</label>
									<input required name="serahterimapekerjaan_tanggal" class="form-control datepicker"/>
								</div>
								<div class="form-group">
									<label>Pemohon</label>
									<input required name="serahterimapekerjaan_pemohon" class="form-control "/>
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input required name="serahterimapekerjaan_jabatan" class="form-control "/>
								</div>
								<div class="form-group">
									<label>Pengajuan</label>
									<textarea class="form-control" name="serahterimapekerjaan_pengajuan" rows="10"></textarea>
								</div>
								<div class="form-group">
									<label>Catatan</label>
									<textarea class="form-control" name="serahterimapekerjaan_catatan" rows="10"></textarea>
								</div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" name="serahterimapekerjaan_berkas" class="form-control">
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
