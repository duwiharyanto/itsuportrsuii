<div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Format Nomor : (NO.SURAT / B.14 / RSUII / BULAN ROMAWI/ TAHUN)
      </div>        
      <div class="panel panel-default">
        <div class="panel-heading">&nbsp
          <div class="panel-action">
              <div class="dropdown"> <a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">Option <span class="caret"></span></a>
                  <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                      <li role="presentation"><a href="javascript:void(0)" onclick="add();" id="add" url="<?= base_url($global->url.'add')?>" role="menuitem"><i class=" fa fa-plus" aria-hidden="true" ></i> Tambah</a></li>
                      <li role="presentation"><a href="JavaScript:popuplaporan('<?=base_url($global->url.'cetak')?>');" role="menuitem"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
                      <?php if($global->import):?>
                      <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="fa fa-upload" aria-hidden="true"></i> Import</a></li>
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
                      <th >Nomo Surat</th>
                      <th >Bulan</th>
                      <th >No RM</th>
                      <th >Nama</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($data AS $row):?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$row->surathamil_nomor?><br><small class="text-danger">Disimpan oleh :<?=ucwords($row->user_nama)?><br>Disimpan : <?=date('d-m-Y',strtotime($row->created_at))?></small></td>
                      <td><?=ucwords($row->surathamil_bulan)?></td>
                      <td><?=ucwords($row->surathamil_norm)?></td>
                      <td><?=ucwords($row->surathamil_nama)?></td>
                      <td class="text-center">
                        <?php tombolaksi($global,$row->surathamil_id,$this->uri->segment(3))?>
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
