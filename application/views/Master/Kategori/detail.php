<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div class="user-bg"> <img width="100%" alt="user" src="<?=base_url()?>/plugins/images/large/3.jpg">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="<?=base_url()?>/plugins/images/users/profile.jpg" class="thumb-lg img-circle" alt="img"></a>
                        <h4 class="text-white"><?=ucwords($data->warga_nama)?></h4>
                        <h5 class="text-white"><?=ucwords($data->warga_hubungankeluarga)?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <ul class="nav customtab nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a href="#home" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-home"></i></span><span class="hidden-xs"> Profil</span></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="tab-pane" id="profile">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Gender</strong>
                                <br>
                                <p class="text-muted"><?= $data->warga_jeniskelamin?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>HP</strong>
                                <br>
                                <p class="text-muted"><?= $data->warga_nomorhp.'/'.$data->warga_statusnomor?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nomor Rumah</strong>
                                <br>
                                <p class="text-muted"><?=$data->warga_nomorrumah.'/'.$data->warga_statustempattinggal?></p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Status KTP</strong>
                                <br>
                                <p class="text-muted"><?=ucwords(str_replace('_',' ',$data->warga_statusktp))?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped">
                                <tr>
                                    <th width="30%">
                                        No KK
                                    </th>
                                    <td>
                                        <?=$data->warga_nomorkk?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nomor KTP
                                    </th>
                                    <td>
                                        <?=$data->warga_nomorktp?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Agama
                                    </th>
                                    <td>
                                        <?=$data->warga_agama?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Domisili
                                    </th>
                                    <td>
                                        <?=$data->warga_domisili?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Jaminan Kesehatan/Nomor
                                    </th>
                                    <td>
                                        <?=$data->warga_jaminankesehatan.'/'.$data->warga_nomorjaminankesehatan?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        SKTM
                                    </th>
                                    <td>
                                        <?=$data->warga_sktm?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama Keluarga/Alamat
                                    </th>
                                    <td>
                                        <?=$data->warga_namakeluarga.'/'.$data->warga_alamatnamakeluarga?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nomor HP Keluarga
                                    </th>
                                    <td>
                                        <?=$data->warga_nohpkeluarga?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Hubungan Keluarga
                                    </th>
                                    <td>
                                        <?=$data->warga_hubungankeluarga?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Alamat KTP
                                    </th>
                                    <td>
                                        <?=$data->warga_alamatktp?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Tgl/Tempat Lahir
                                    </th>
                                    <td>
                                        <?=date('d-m-Y',strtotime($data->warga_tanggallahir)).'/'.$data->warga_tempatlahir?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Golongan Darah
                                    </th>
                                    <td>
                                        <?=$data->warga_golongandarah?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Hobi
                                    </th>
                                    <td>
                                        <?=$data->warga_hobi?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status Perkawinan
                                    </th>
                                    <td>
                                        <?=$data->warga_statusperkawainan?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Pendidikan Terakhir
                                    </th>
                                    <td>
                                        <?=$data->warga_pendidikanterakhir?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Pekerjaan
                                    </th>
                                    <td>
                                        <?=$data->warga_pekerjaan?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Alamat Tempat Kerja
                                    </th>
                                    <td>
                                        <?=$data->warga_alamatbekerja?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        NPWP/Nomor
                                    </th>
                                    <td>
                                        <?=$data->warga_npwp.'/'.$data->warga_nonpwp?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
