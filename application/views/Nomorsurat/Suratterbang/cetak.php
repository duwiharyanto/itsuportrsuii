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
        <th >Nomo Surat</th>
        <th >Bulan</th>
        <th >No RM</th>
        <th >Nama</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1;?>
      <?php foreach($data AS $row):?>
      <tr>
        <td><?=$i?></td>
        <td><?=$row->suratterbang_nomor?><br><small class="text-danger">Disimpan oleh :<?=ucwords($row->user_nama)?><br>Disimpan : <?=date('d-m-Y',strtotime($row->created_at))?></small></td>
        <td><?=ucwords($row->suratterbang_bulan)?></td>
        <td><?=ucwords($row->suratterbang_norm)?></td>
        <td><?=ucwords($row->suratterbang_nama)?></td>
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