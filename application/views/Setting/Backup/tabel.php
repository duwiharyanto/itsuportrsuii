<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-responsive">
              <p>Backup database akan disimpan dalam folder backupdb(root folder)</p>
              <a href="<?=base_url($global->url.'db')?>" class="btn btn-primary"><span class="flaticon-download"></span> Backup</a>
            </div>
            <div class="form-group mt-2">
               <iframe src="<?=base_url($global->url.'/filemanager')?>" title="file manajer" width="100%" height="300" style="border:0px solid black;"></iframe> 
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