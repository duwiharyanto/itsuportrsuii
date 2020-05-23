<div class="row">
    <div class="col-lg-12">       
      <div class="panel panel-default">
        <div class="panel-heading">&nbsp
          <div class="panel-action">
              <div class="dropdown"> <a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">Option <span class="caret"></span></a>
                  <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                      <li role="presentation"><a href="javascript:void(0)" onclick="add();" id="add" url="<?= base_url($global->url.'add')?>" role="menuitem"><i class=" fa fa-plus" aria-hidden="true" ></i> Tambah</a></li>
                      <li role="presentation"><a href="JavaScript:popuplaporan('<?=base_url($global->url.'cetak')?>');" role="menuitem"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
                    <?php if($global->import):?>
                      <li role="presentation"><a href="javascript:void(0)" role="menuitem" data-toggle="modal" data-target="#importdata"><i class="fa fa-upload" aria-hidden="true"></i> Import</a></li>
                    <?php endif;?>
                      <li class="divider" role="presentation"></li>
                      <li role="presentation"><a href="<?=site_url($global->url.'exportexcell')?>" role="menuitem"><i class="fa fa-download" aria-hidden="true"></i> Export Excel</a></li>
                    <?php if($global->hapussemua):?>
                      <li role="presentation"><a href="javascript:void(0)" role="menuitem" url="<?=base_url($global->url.'hapus/')?>"  id="<?=null?>" class="hapus"><i class="fa fa-trash" aria-hidden="true" ></i> Hapus Semua</a></li>   
                    <?php endif;?> 
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
                      <th width="8%">No</th>
                      <th class="text-center" width="8%">Status</th>
                      <th >Notulen</th>
                      <th width="50%">Isi</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($data AS $row):?>
                    <tr>
                      <td><?=$i?></td>
                      <td class="text-center"><?=$row->notulen_status==1 ? '<span class="badge badge-success">Non Aktif</span>':'<span class="badge badge-danger">Aktif</span>'?></td>
                      <td><?=ucwords($row->notulen_nama)?></td>                      
                      <td><?=word_limiter(ucwords($row->notulen_isi), 10)?></td>
                      <td class="text-center">
                        <?php tombolaksi($global,$row->notulen_id,$this->uri->segment(3))?>
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
<?php include(APPPATH.'views/_template/_modalimport.php')?>
<?php include 'action.php'; ?>
<script type="text/javascript">
    $('#example23').DataTable({
      pageLength:100,
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    });
    function popuplaporan(url) {
      popupWindow = window.open(
          url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }        
</script>

