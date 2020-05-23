<?php if($global->edit):?>
	<button type="button"  id="<?=$row->level_id?>" url="<?= base_url($global->url.'edit')?>" class="edit btn btn-primary btn-circle" >
		<i class=" icon-pencil "></i>
	</button>
<?php endif;?>
<?php if($global->delete):?>	
	<button type="button" data-toggle="tooltip" title="" class="hapus btn btn-danger btn-circle" data-original-title="Hapus" url="<?=base_url($global->url.'hapus/')?>"  id="<?=$row->level_id?>">
		<i class="icon-trash"></i>
	</button> 
<?php endif;?>