<div class="row">
<div class="col-md-12">
  <div class="card">
  	<div class="card-header">
		<h4 class="card-title"><?= ucwords($global->headline)?> <small class="float-right"><button  onclick ="loaddata()"  class="btn btn-danger btn-sm"><i class=" mdi mdi-keyboard-backspace "></i>Kembali</button></small></h4>  		
  	</div>
    <div class="card-body">
    	<?php if(file_exists($cekfile)):?>
    		<embed src="<?=$file?>" type="application/pdf" width="100%" height="800px" />
    	<?php else:?>
    		<div class="text-center">
    			<img src="<?=base_url('plugins/images/filenotfound.png')?>" style="margin-top:50px;width: 120px;height: 120px"><br><br>
    			<p>File tidak ditemukan</p>	
          <p><?=$file?></p>
    		</div>
    	<?php endif?>
    </div>
  </div>
</div>
</div>
<?php include 'action.php'; ?>
