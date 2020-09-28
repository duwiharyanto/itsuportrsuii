<<!DOCTYPE html>
<html>
<head>
  <title><?= ucwords($global->headline)?></title>
</head>
<body>
<table width="100%" style="margin-bottom: 20px" >
  <tr>
    <td width="10%">
      <img src="<?=base_url()?>/upload/sistem/<?=$atributsistem->setting_logo?>?>" width="80px" height="80px" style="display:block;margin: auto">
    </td>
    <td width="40%"><h2 align="left"><?=ucwords($global->headline)?></h2><h4><?=$atributsistem->setting_alamat?><br><?=$atributsistem->setting_email.', '.$atributsistem->setting_notlp?></h4>
    </td>
    <td align="center" width="60%">
      <!--
      <img src="<?=base_url()?>barcode/celeng.png" style="width:84px;height:84px">
      -->
      <barcode code="<?=$this->session->userdata('user_nama')?>" type="C128B"/>
    </td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr >
      <th width="5%">No</th>
      <th class="text-center" width="10%">Status</th>
      <th >Notulen</th>
      <th width="50%">Isi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data AS $row):?>
      <tr>
        <td><?=$i?></td>
        <td class="text-center"><?=$row->notulen_status==1 ? '<span class="badge badge-danger">Close</span>':'<span class="badge badge-danger">Open</span>'?></td>
        <td><?=ucwords($row->notulen_nama)?></td>                      
        <td><?=ucwords($row->notulen_isi)?></td>
      </tr>
      <?php $i++;?>  
    <?php endforeach;?>
  </tbody>
</table> 
<table width="100%" style="margin-top: 5px">
  <tr>
    <td  align="right"><i>Dicetak oleh sistem</i></td>
  </tr>
</table> 
</body>
</html>