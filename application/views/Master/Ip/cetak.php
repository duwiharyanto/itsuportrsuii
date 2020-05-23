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
        <th >No</th>
        <th width="10%">Nomor Rumah</th>
        <th width="20%">Nama</th>
        <th >No.HP</th>
        <th >Kelamin</th>
        <th width="20%">Status Tinggal</th>
        <th >Domisili</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1;?>
      <?php foreach($data AS $row):?>
        <tr>
          <td><?=$i?></td>
          <td><?='Nomor :'.$row->warga_nomorrumah?></td>
          <td><?=ucwords($row->warga_nama).'<br><i>Lahir : '.date('d-m-Y',strtotime($row->warga_tanggallahir)).'</i>'?></td>
          <td><?=$row->warga_nomorhp?></td>
          <td><?=ucwords($row->warga_jeniskelamin)?></td>
          <td><?=ucwords($row->warga_statustempattinggal)?></td>
          <td><?=str_replace('_',' ',ucwords($row->warga_domisili))?></td>
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
<!--
<table width="100%" style="margin-top: 100px">
  <tr>
    <td width="50%"></td>
    <td width="50%" align="center">
    <p> Disahkan, <?=date('d-m-Y')?></p><br><br><br><br>
    <p style="margin-top: 50px"> <?=ucwords($atributsistem->setting_namapemilik)?></p>
    </td>
  </tr>
</table>
-->
</body>
</html>