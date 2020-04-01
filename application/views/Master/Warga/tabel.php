<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">&nbsp
            <div class="panel-action">
                <div class="dropdown"> <a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">Option <span class="caret"></span></a>
                    <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                        <?php if($global->tambah):?>
                            <li role="presentation"><a href="javascript:void(0)" onclick="add();" id="add" url="<?= base_url($global->url.'add')?>" role="menuitem"><i class=" fa fa-plus" aria-hidden="true" ></i> Tambah</a></li>
                        <?php endif;?>
                        <?php if($global->print):?>
                            <li role="presentation"><a href="JavaScript:popuplaporan('<?=base_url($global->url.'cetak')?>');" role="menuitem"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
                        <?php endif;?>
                        <?php if($global->import):?>
                            <li role="presentation"><a href="javascript:void(0)" data-toggle="modal" data-target="#importdata" role="menuitem"><i class="fa fa-upload" aria-hidden="true"></i> Import</a></li>
                        <?php endif;?>
                        <li class="divider" role="presentation"></li>
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
                      <th width="10%">Nomor Rumah</th>
                      <th >Nama</th>
                      <th >No.HP</th>
                      <th >Kelamin</th>
                      <th >Domisili</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($data AS $row):?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?='Nomor :'.$row->warga_nomorrumah?></td>
                      <td><?=ucwords($row->warga_nama).'<br><i>Lahir : '.date('d-m-Y',strtotime($row->warga_tanggallahir)).'</i>'?></td>
                      <td><?=$row->warga_nomorhp?></td>
                      <td><?=ucwords($row->warga_jeniskelamin)?></td>
                      <td><?=ucwords($row->warga_domisili)?></td>
                      <td class="text-center">
                        <?php tombolaksi($global,$row->warga_id,$this->uri->segment(3))//include 'button.php';?>
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
<script type="text/javascript">
    $('#example23').DataTable({
        dom: 'Bfrtip',
        pageLength:100,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    function popuplaporan(url) {
      popupWindow = window.open(
          url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }
</script>
<?php include 'action.php'; ?>
<div id="importdata" class="modal fade" tabindex="-1" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Import Data</h4>
      </div>
      <form  class="formaction" method="POST" action="<?= base_url($global->url.'importdatas')?>"  enctype="multipart/form-data">
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
