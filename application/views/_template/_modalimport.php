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