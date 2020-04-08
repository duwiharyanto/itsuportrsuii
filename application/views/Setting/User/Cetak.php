<<!DOCTYPE html>
<html>
<head>
  <title>Cetak</title>
</head>
<body>
<table width="100%" style="margin-bottom: 20px" >
  <tr>
    <td width="10%">
      <img src="<?=base_url()?>/plugins/images/logohead.png" width="60px" height="60px" style="display:block;margin: auto">
    </td>
    <td width="40%"><h2 align="left"><?=ucwords($global->headline)?></h2><h5>Dicetak : <?=date('d-m-Y')?></h5>
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
        <th>Nama</th>
        <th >Email</th>
        <th >Username</th>
        <th>Password</th>
        <th >Akses</th>
        <th >Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1;?>
      <?php foreach($data AS $row):?>
      <tr>
        <td><?=$i?></td>
        <td><?=ucwords($row->user_nama)?></td>
        <td><?=$row->user_email?></td>
        <td><?=$row->user_username?></td>
        <td><?=$row->user_password?></td>
        <td><?=$row->level_nama?></td>
        <td><?=$row->user_status==1 ? '<span class="text-success">Aktif</span>':'<span class="text-danger">Non Aktif</span>'?></td>
      </tr>
      <?php $i++;?>  
      <?php endforeach;?>
    </tbody>
</table>  

</body>
</html>