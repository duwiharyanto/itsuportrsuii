<div class="row">
    <div class="col-lg-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Tambahkan id level pada kolom akses dengan tanda pisah koma, pada tabel dibawah. 
      </div>    
      <div class="panel panel-default">
        <div class="panel-heading">&nbsp
          <div class="panel-action">
              <div class="dropdown"> <a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">Option <span class="caret"></span></a>
                  <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                      <li role="presentation"><a href="javascript:void(0)" onclick="location.reload()" id="add" url="<?= base_url($global->url.'add')?>" role="menuitem"><i class=" fa fa-refresh" aria-hidden="true" ></i> Refresh</a></li>
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
                      <th>No</th>
                      <th>Menu</th>
                      <th>Ikon</th>
                      <th>Akses</th>
                      <th>Fitur</th>
                      <th>Status</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
          <tbody>
            <?php $i=1;?>
            <?php foreach($data AS $row):?>
            <tr>
              <td><?=$i?></td>
              <td><?=ucwords($row->menu_nama)?> <?=$row->menu_is_mainmenu==0 ? '<span class="badge badge-primary">Parent</span>':'<span class="badge badge-info">Child</span>'?></td>
              <td><?=$row->menu_ikon?></td>
              <td><?=$row->menu_akses_level?></td>
              <td><?=$row->menu_baru==0 ? '<span class="badge badge-info">Lama</span>':($row->menu_baru==1 ? '<span class="badge badge-primary">Baru</span>': ($row->menu_baru==2 ? '<span class="badge badge-danger">Berbayar</span>':($row->menu_baru==3 ? '<span class="badge badge-warning">Development</span>':'')))?></td>
              <td><?=$row->menu_status==1 ? '<span class="text-success">Aktif</span>':'<span class="text-danger">Non Aktif</span>'?></td>
              <td class="text-center">
                <?php include 'button.php';?>
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
