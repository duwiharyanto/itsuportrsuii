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
			  						<input required readonly type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->serahterimapekerjaan_id?>">
			  					</div>
								<div class="form-group">
									<label>Nomor</label>
									<input required readonly name="serahterimapekerjaan_nomor" class="form-control" value="<?=$data->serahterimapekerjaan_nomor?>" />
								</div>			  					
								<div class="form-group">
									<label>Tanggal</label>
									<input required name="serahterimapekerjaan_tanggal" class="form-control datepicker" value="<?=date('d-m-Y',strtotime($data->serahterimapekerjaan_tanggal))?>"/>
								</div>
								<div class="form-group">
									<label>Pemohon</label>
									<input required name="serahterimapekerjaan_pemohon" class="form-control " value="<?=$data->serahterimapekerjaan_pemohon?>"/>
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input required name="serahterimapekerjaan_jabatan" class="form-control " value="<?=$data->serahterimapekerjaan_jabatan?>"/>
								</div>
								<div class="form-group">
									<label>Pengajuan</label>
									<textarea class="form-control" name="serahterimapekerjaan_pengajuan" rows="10"><?=$data->serahterimapekerjaan_pengajuan?></textarea>
								</div>
								<div class="form-group">
									<label>Catatan</label>
									<textarea class="form-control" name="serahterimapekerjaan_catatan" rows="10"><?=$data->serahterimapekerjaan_catatan?></textarea>
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
