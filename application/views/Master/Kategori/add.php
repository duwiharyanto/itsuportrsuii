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
							<div class="col-sm-6">		
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">		      						
								<div class="form-group">
									<label>Nomor Rumah</label>
									<input required type="text" name="warga_nomorrumah" class="form-control" title="Harus di isi">
								</div>
								<div class="form-group">
									<label>Status Tempat Tinggal</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="warga_statustempattinggal" value="Pribadi" type="radio" >
				      						Pribadi
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_statustempattinggal" value="Kontrak" type="radio">
				      						Kontrak
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_statustempattinggal" value="Sewa" type="radio">
				      						Sewa
				      					</label>				      					
				      				</div>
								</div>
								<div class="form-group">
									<label>Status KTP</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="warga_statusktp" value="Modalan_RT.03" type="radio" >
				      						Modalan RT.03
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_statusktp" value="Luar_Wilayah_Modalan_RT.03" type="radio">
				      						Luar Wilayah Modalan RT.03
				      					</label>				      					
				      				</div>
								</div>
								<div class="form-group">
									<label>Domisili</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="warga_domisili" value="Modalan_RT.03" type="radio" >
				      						Modalan RT.03
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_domisili" value="Luar_Wilayah_Modalan_RT.03" type="radio">
				      						Luar Wilayah Modalan RT.03
				      					</label>				      					
				      				</div>
								</div>
								<div class="form-group">
									<label>Jaminan Kesehatan</label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="warga_jaminankesehatan" value="Tidak" type="radio" >
				      						Tidak Ada
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_jaminankesehatan" value="BPJS_Kesehatan" type="radio">
				      						BPJS Kesehatan (bukan ketenagakerjaan)
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_jaminankesehatan" value="JAMKESDA" type="radio">
				      						JAMKESDA
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_jaminankesehatan" value="JAMKESNAS" type="radio">
				      						JAMKESNAS
				      					</label>				      							      					
				      				</div>
								</div>
								<div class="form-group">
									<label>Nomor Jaminan Kesehatan</label>
									<input required type="text" name="warga_nomorjaminankesehatan" class="form-control" title="Harus di isi">
								</div>
								<div class="form-group">
									<label>Memiliki SKTM * <br><small class="text-danger">Surat Keterangan Tidak Mampu</small></label>
				      				<div class="">
				      					<label style="padding-right: 20px">
				      						<input required name="warga_sktm" value="Tidak" type="radio" >
				      						Tidak Ada
				      					</label>
				      					<label style="padding-right: 20px">
				      						<input required required name="warga_sktm" value="Ya" type="radio">
				      						Ya
				      					</label>					
				      				</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Nomor KK</label>
									<input required type="text" name="warga_nomorkk" class="form-control" title="Harus di isi">
								</div>	
								<div class="form-group">
									<label>Nomor KTP</label>
									<input required type="text" name="warga_nomorktp" class="form-control" title="Harus di isi">
								</div>
								<div class="form-group">
									<label>Nama Lengkap <br><small class="text-danger">Sesuai dengan KTP</small></label>
									<input required type="text" name="warga_nama" class="form-control" title="Harus di isi">
								</div>
								<div class="form-group">
									<label>Hubungan dengan Keluarga *</label>
									<select class="form-control select" name="warga_hubungankeluarga">
										<option value="Kepala_Keluarga">Kepala Keluarga</option>
										<option value="Suami">Suami</option>
										<option value="Istri">Istri</option>
										<option value="Anak">Anak</option>
										<option value="Menantu">Menantu</option>
										<option value="Orang_Tua">Orang Tua</option>
										<option value="Mertua">Mertua</option>
										<option value="Cucu">Cucu</option>
									</select>
								</div>
								<div class="form-group">
									<label>Alamat * <br><small class="text-danger">Isi sesuai Domisili</small></label>
                                    <div class="form-check">
                                        <label class="custom-control custom-checkbox">
                                            <input name="warga_alamatktp" type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Check this Sesuai KTP Modalan RT.03</span>
                                        </label>
                                    </div>									
									<label>Lainnya </label>
									<textarea class="form-control" required name="warga_alamatktp2" rows="8"></textarea>									
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<div class="">
										<label style="padding-right: 20px">
											<input required name="warga_janiskelamin" value="Laki-Laki" type="radio" >
											Laki-Laki
										</label>
										<label style="padding-right: 20px">
											<input required name="warga_janiskelamin" value="Perempuan" type="radio" >
											Perempuan
										</label>															
									</div>									
								</div>	
								<div class="form-group">
									<label>Tempat Lahir</label>
									<textarea class="form-control" required name="warga_tempatlahir" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input required name="warga_tanggallahir" class="form-control datepicker" type="text" value="<?=date('d-m-Y')?>"></input>
								</div>
								<div class="form-group">
									<label>Nomor HP</label>
									<input required name="warga_nomorhp" class="form-control " type="text"></input>
								</div>
								<div class="form-group">
									<label>Status Nomor</label>
									<div class="">
										<label style="padding-right: 20px">
											<input required name="warga_statusnomor" value="Aktif_Whatsapp" type="radio" >
											Aktif Whatsapp
										</label>
										<label style="padding-right: 20px">
											<input required name="warga_statusnomor" value="Aktif_Telepon" type="radio" >
											Aktif Telepon
										</label>			
									</div>			
								</div>
								<div class="form-group">
									<label>Email</label>
									<input required name="warga_email" class="form-control " type="text"></input>
								</div>
								<div class="form-group">
									<label>Agama</label>
									<select class="form-control select" name="warga_agama">
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Khatolik">Khatolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
								<div class="form-group">
									<label>Golongan Darah</label>
									<select class="form-control select" name="warga_golongandarah">
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="O">O</option>
										<option value="AB">AB</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
								<div class="form-group">
									<label>Hobi</label>
									<input required name="warga_hobi" class="form-control " type="text"></input>
								</div>
								<div class="form-group">
									<label>Status Perkawinan</label>
									<select class="form-control select" name="warga_statusperkawainan">
										<option value="Belum_Menikah<">Belum Menikah</option>
										<option value="Menikah">Menikah</option>
										<option value="Cerai_Hidup">Cerai Hidup</option>
										<option value="Cerai_Mati">Cerai Mati</option>
									</select>
								</div>
								<div class="form-group">
									<label>Pendidikan Terakhir</label>
									<select class="form-control select" name="warga_pendidikanterakhir">
										<option value="Tidak_/_Belum_Sekolah<">Tidak / Belum Sekolah</option>
										<option value="SD">SD</option>
										<option value="SMP">SMP</option>
										<option value="SMA">SMA</option>
										<option value="SMK">SMK</option>
										<option value="D1/D2">D1/D2</option>
										<option value="D3/Sarjana muda/Akademi">D3/Sarjana muda/Akademi</option>
										<option value="D4/S1">D4/S1</option>
										<option value="S2">S2</option>
										<option value="S3">S3</option>
									</select>
								</div>
								<div class="form-group">
									<label>Pekerjaan</label>
									<select class="form-control select" name="warga_pekerjaan">
										<option value="Belum_Bekerja<">Belum Bekerja</option>
										<option value="Buruh_Harian_Lepas">Buruh Harian Lepas</option>
										<option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
										<option value="Pegawai_Swasta">Pegawai Swasta</option>
										<option value="Pegawai_Negeri">Pegawai Negeri</option>
										<option value="Wirausaha">Wirausaha</option>>
									</select>
									<label>Lainnya</label>
									<input type="text" name="warga_pekerjaanlainnya" class="form-control">
								</div>
								<div class="form-group">
									<label>Tempat Bekerja<br><small>Alamat/Lokasi/Nama Usaha</small></label>
									<textarea class="form-control" rows="4" name="warga_alamatbekerja"></textarea>
								</div>
								<div class="form-group">
									<label>Memiliki NPWP</label>
									<div class="">
										<label style="padding-right: 20px">
											<input required name="warga_npwp" value="Ya" type="radio" >
											Ya
										</label>
										<label style="padding-right: 20px">
											<input required name="warga_npwp" value="Tidak" type="radio" >
											Tidak
										</label>			
									</div>			
								</div>
								<div class="form-group">
									<label>Nomor NPWP</label>
									<input type="text" name="warga_nonpwp" class="form-control">
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

