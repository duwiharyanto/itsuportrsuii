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
      <barcode code="<?=$this->session->userdata('user_nama')?>" type="C128B"/>
    </td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
      <thead>
        <tr >
          <th width="8%">No</th>
          <th >Nama</th>
          <th >Email</th>
          <th >Tlp</th>
          <th width="30%">Tanda Tangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;?>
        <?php foreach($data AS $row):?>
        <tr >
          <td align="center"><?=$i?></td>
          <td><?=ucwords($row->reg_nama)?></td>
          <td><?=$row->reg_email?></td>
          <td><?=$row->reg_notlp?></td>
          <td height="50"></td>
        </tr>
      <?php $i++;?>  
      <?php endforeach;?>
      </tbody>
</table>  

</body>
</html>