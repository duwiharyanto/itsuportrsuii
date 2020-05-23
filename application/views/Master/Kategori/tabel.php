<div class="row">
    <div class="col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">&nbsp
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-responsive">
                <table id="example23" class="display nowrap table table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr >
                      <th width="5%">No</th>
                      <th >Kategori</th>
                      <th width=30%>Disimpan</th>
                      <th width="15%" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($data AS $row):?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=ucwords($row->kategori_kategori)?></td>
                      <td><?=date('d-m-Y',strtotime($row->created_at))?></td>
                      <td class="text-center">
                        <?php tombolaksi($global,$row->kategori_id,$this->uri->segment(3))?>
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
    <div class="col-md-4">
        <div id="form">
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
                                        <label>Kategori</label>
                                        <input required type="text" name="kategori_kategori" class="form-control" title="Harus di isi">
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
