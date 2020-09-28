<div class="row">
    <div class="col-lg-12">       
      <div class="panel panel-default">
        <div class="panel-heading">&nbsp
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-responsive">
                <table id="example23" class="display nowrap table table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr >
                      <th >No</th>
                      <th class="text-center" width="10%">Status</th>
                      <th >Ticket</th>
                      <th >Trouble</th>
                      <th >Deskripsi</th>
                      <th >Catatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($data AS $row):?>
                    <tr>
                      <td><?=$i?></td>
                      <td class="text-center"><?=($row->troubleshoot_idstatus==1 ? '<span class="badge badge-danger">'.ucwords($row->status_status).'</span>':($row->troubleshoot_idstatus==2 ? '<span class="badge badge-success">'.ucwords($row->status_status).'</span>':($row->troubleshoot_idstatus==3 ? '<span class="badge badge-warning">'.ucwords($row->status_status).'</span>':($row->troubleshoot_idstatus==4 ? '<span class="badge badge-info">'.ucwords($row->status_status).'</span>':'error'))))?></td>
                      <td><?=ucwords($row->troubleshoot_ticket)?></td>                      
                      <td><?=ucwords($row->troubleshoot_nama)?><br><small class="text-danger">Di ajukan oleh :<?=ucwords($row->user_nama)?><br>Disimpan : <?=date('d-m-Y',strtotime($row->created_at))?>
                        <br>Komputer : <?=ucwords($row->troubleshoot_komputer)?>
                        </small></td>
                      <td><?=ucwords($row->troubleshoot_deskripsi)?></td>
                      <td><?=ucwords($row->troubleshoot_catatan ? word_limiter($row->troubleshoot_catatan,5):'-')?><br><small>
                        <?=ucwords($row->troubleshoot_idpic ? 'Ditambahkan : '.$row->pic:'')?>
                      </small></td>
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
<?php include(APPPATH.'views/_template/_modalimport.php')?>
<?php include 'action.php'; ?>
<script type="text/javascript">
    $('#example23').DataTable({
      pageLength:100,
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

