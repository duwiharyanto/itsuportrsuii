<?php if($global->edit):?>
	<button type="button"  id="<?=$row->warga_id?>" url="<?= base_url($global->url.'edit')?>" class="edit btn btn-primary btn-circle" data-toggle="tooltip" title="Edit">
		<i class="fa fa-pencil"></i>
	</button>
<?php endif;?>
<?php if($global->detail):?>
	<a  href="<?= site_url($this->uri->segment(1).'/detail/'.md5($row->warga_id))?>" class="btn btn-primary btn-circle" data-toggle="tooltip" title="Detail">
		<i class="fa fa-folder-open"></i>
	</a>
<?php endif;?>
<?php if($global->extendlink):?>
	<button type="button" onclick="popuplaporan('<?= base_url($global->url.'qrcode/'.md5($row->warga_id))?>')" class="btn btn-success btn-circle" data-toggle="tooltip" title="Share" >
		<i class="fa fa-qrcode"></i>
	</button>
<?php endif;?>
<?php if($global->delete):?>	
	<button type="button" data-toggle="tooltip" title="" class="hapus btn btn-danger btn-circle" data-original-title="Hapus" url="<?=base_url($global->url.'hapus/')?>"  id="<?=$row->warga_id?>">
		<i class="fa fa-trash"></i>
	</button> 
<?php endif;?>