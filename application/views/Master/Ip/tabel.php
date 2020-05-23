<div class="row">
    <div class="col-sm-8">
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
                                <th width='5%'>No</th>
                                <th width="25%">Ip</th>
                                <th width="25%">Catatan</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            <?php foreach($data AS $row):?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=ucwords($row->ip_address)?></td>
                                    <td><?=ucwords($row->ip_catatan)?></td>
                                    <td class="text-center">
                                        <?php tombolaksi($global,$row->ip_id,$this->uri->segment(3));?>
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
    <div class="col-sm-4">
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
    									<label>Ip Address</label>
    									<input required name="ip_address" class="form-control"/>
    								</div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <textarea class="form-control" name="ip_catatan" rows="8"></textarea>
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
