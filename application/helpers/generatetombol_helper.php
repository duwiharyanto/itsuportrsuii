<?php
	function tombolaksi($global,$rowid,$segment=null,$berkasfile=null){
		if($global->edit){
			echo '
			<button type="button"  id="'.$rowid.'" url="'.base_url($global->url.'edit').'" class="edit btn btn-primary btn-circle" data-toggle="tooltip" title="Edit">
				<i class="fa fa-pencil"></i>
			</button>';
		}
		if($global->detail){
			echo '
			<a href="javascript:void(0)"  url="'.site_url($global->url.'/detail').'" id="'.$rowid.'" class="detail btn btn-success btn-circle" data-toggle="tooltip" title="Detail">
				<i class="fa fa-info"></i>
			</a>';
		}
		if($global->qrcode){
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
		if($global->download){
			echo '
			<a href="javascript:void(0)"  url="'.site_url($global->url.'/previewfile/'.$berkasfile).'" class="preview btn btn-primary btn-circle" data-toggle="tooltip" title="Download">
				<i class="fa fa-download"></i>
			</a>';
			echo '
			<button type="button"  id="'.$rowid.'" url="'.base_url($global->url.'send').'" class="sendemail btn btn-danger btn-circle" data-toggle="tooltip" title="Kirim Email">
				<i class="fa fa-envelope"></i>
			</button>';			
		}		
	}
?>
