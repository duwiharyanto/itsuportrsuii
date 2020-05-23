<<!DOCTYPE html>
<html>
<head>
  <title>Cetak</title>
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
<table width="100%" border="0" cellpadding="5" cellspacing="0">
      <thead>
        <tr >
          <th >No</th>
          <th >Nama</th>
          <th >Email</th>
          <th >Tlp</th>
          <th >Alamat</th>
          <th >Tersimpan</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;?>
        <?php foreach($data AS $row):?>
        <tr>
          <td><?=$i?></td>
          <td><?=ucwords($row->reg_nama)?></td>
          <td><?=$row->reg_email?></td>
          <td><?=$row->reg_notlp?></td>
          <td><?=ucwords($row->reg_alamat)?></td>
          <td><?=date('d-m-Y',strtotime($row->created_at))?></td>
        </tr>
      <?php $i++;?>  
      <?php endforeach;?>
      </tbody>
</table>  

</body>
</html>