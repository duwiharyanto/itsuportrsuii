<div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Format Nomor : (NO.SURAT / B.7 / RSUII / BULAN ROMAWI/ TAHUN)
      </div>        
      <div class="panel panel-default">
        <div class="panel-heading">&nbsp
          <div class="panel-action">
              <div class="dropdown"> <a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">Option <span class="caret"></span></a>
                  <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                    <li role="presentation"><a href="javascript:void(0)" onclick="add();" id="add" url="<?= base_url($global->url.'add')?>" role="menuitem"><i class=" fa fa-plus" aria-hidden="true" ></i> Tambah</a></li>
                    <li role="presentation"><a href="JavaScript:popuplaporan('<?=base_url($global->url.'cetak')?>');" role="menuitem"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
                    <?php if($global->import):?>
                      <li role="presentation"><a href="javascript:void(0)" data-toggle="modal" data-target="#importdata" role="menuitem"><i class="fa fa-upload" aria-hidden="true"></i> Import Excel</a></li>
                    <?php endif;?>
                    <li class="divider" role="presentation"></li>    
                    <li role="presentation"><a href="<?=site_url($global->url.'exportexcell')?>" role="menuitem"><i class="fa fa-download" aria-hidden="true"></i> Export Excel</a></li>   
                    <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="fa fa-gears" aria-hidden="true"></i> Settings</a></li>                   
                  </ul>
              </div>                 
          </div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-responsive">
                <table id="example23" class="display nowrap table table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr >
                      <th >No</th>
                      <th >Nomo Surat</th>
                      <th >Bulan</th>
                      <th >No RM</th>
                      <th >Nama</th>
                      <th >Tgl.Lahir</th>
                      <th >Jenis Kelamin</th>
                      <th >Ayah</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($data AS $row):?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$row->suratlahir_nomor?><br><small class="text-danger">Disimpan oleh :<?=ucwords($row->user_nama)?><br>Disimpan : <?=date('d-m-Y',strtotime($row->created_at))?></small></td>
                      <td><?=ucwords($row->suratlahir_bulan)?></td>
                      <td><?=ucwords($row->suratlahir_norm)?></td>
                      <td><?=ucwords($row->suratlahir_nama)?></td>
                      <td><?=date('Y-m-d',strtotime($row->suratlahir_tgllahir))?></td>
                      <td><?=$row->suratlahir_jeniskelamin==1 ? 'Laki-laki':'Perempuan'?></td>
                      <td><?=ucwords($row->suratlahir_namaayah)?></td>
                      <td class="text-center">
                        <?php tombolaksi($global,$row->suratlahir_id,$this->uri->segment(3))?>
                      </td>
                    </tr>
                  <?php $i++;?>  
                  <?php endforeach;?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>        
    </div>                    
</div>
<div id="importdata" class="modal fade" tabindex="-1" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Import Data</h4>
      </div>
      <form  class="formaction" method="POST" action="<?= base_url($global->url.'importexcell')?>"  enctype="multipart/form-data">
      <div class="modal-body">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">        
          <div class="form-group">
            <label for="message-text" class="control-label">File</label>
            <input type="file" name="fileimport" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger waves-effect waves-light">Import</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php include 'action.php'; ?>
<script type="text/javascript">
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    function popuplaporan(url) {
      popupWindow = window.open(
          url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }        
</script>

