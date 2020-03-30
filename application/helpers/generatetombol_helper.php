<?php
	function tombolaksi($global,$rowid,$segment=null){
		if($global->edit){
			echo '
			<button type="button"  id="'.$rowid.'" url="'.base_url($global->url.'edit').'" class="edit btn btn-primary btn-circle" data-toggle="tooltip" title="Edit">
				<i class="fa fa-pencil"></i>
			</button>';
		}
		if($global->detail){
			echo '
			<a  href="'.site_url($segment.'/detail/'.md5($rowid)).'" class="btn btn-primary btn-circle" data-toggle="tooltip" title="Detail">
				<i class="fa fa-folder-open"></i>
			</a>';
		}
		if($global->extendlink){
			echo '
			<button type="button" onclick="popuplaporan(\''.base_url($global->url.'qrcode/'.md5($rowid)).'\')" class="btn btn-success btn-circle" data-toggle="tooltip" title="Share" >
				<i class="fa fa-qrcode"></i>
			</button>
			';
		}
		if($global->delete){
			echo '	
			<button type="button" data-toggle="tooltip" title="" class="hapus btn btn-danger btn-circle" data-original-title="Hapus" url="'.base_url($global->url.'hapus/').'"  id="'.$rowid.'">
				<i class="fa fa-trash"></i>
			</button>
			'; 
		}		
	}
?>