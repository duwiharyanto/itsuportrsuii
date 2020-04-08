<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-responsive">
              <p>Backup database akan disimpan dalam folder backupdb(root folder)</p>
              <a href="<?=base_url($global->url.'db')?>" class="btn btn-primary"><span class="flaticon-download"></span> Backup</a>
              <a href="JavaScript:popuplaporan('<?=base_url('backupdb')?>')" class="btn btn-warning">Open File</a>
              <hr>
              <p>Download semua backup database yang tersimpan disistem</p>
              <a href="<?=base_url($global->url.'files')?>" class="btn btn-primary"><span class="flaticon-download"></span> Backup</a> 
            </div>
          </div>
        </div>
      </div>        
    </div>                    
</div>
<script type="text/javascript">
  function popuplaporan(url) {
    popupWindow = window.open(
        url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
  }
</script>