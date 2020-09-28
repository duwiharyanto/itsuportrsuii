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
      <barcode code="haryanto.duwi" type="C128B"/>
    </td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
<thead>
  <tr >
    <th width="5%">No</th>
    <th class="text-center" width="10%">Status</th>
    <th width="5%">Ticket</th>
    <th width="15%">Trouble</th>
    <th width="25%">Deskripsi</th>
    <th width="25%">Catatan</th>
  </tr>
</thead>
<tbody>
  <?php $i=1;?>
  <?php foreach($data AS $row):?>
  <tr>
      <td><?=$i?></td>
      <td class="text-center"><?=($row->trobelsistem_idstatus==1 ? '<span class="badge badge-danger">'.ucwords($row->status_status).'</span>':($row->trobelsistem_idstatus==2 ? '<span class="badge badge-success">'.ucwords($row->status_status).'</span>':($row->trobelsistem_idstatus==3 ? '<span class="badge badge-warning">'.ucwords($row->status_status).'</span>':($row->trobelsistem_idstatus==4 ? '<span class="badge badge-info">'.ucwords($row->status_status).'</span>':($row->trobelsistem_idstatus==5 ? '<span class="badge badge-warning">'.ucwords($row->status_status).'</span>':($row->trobelsistem_idstatus==6 ? '<span class="badge badge-primary">'.ucwords($row->status_status).'</span>':'error'))))))?></td>
      <td><?=ucwords($row->trobelsistem_ticket)?></td>                      
      <td><?=ucwords($row->trobelsistem_nama)?><br><small class="text-danger">Di ajukan oleh :<?=ucwords($row->user_nama)?><br>Disimpan : <?=date('d-m-Y',strtotime($row->created_at))?>
        <br>Lokasi : <?=ucwords($row->unit_nama)?>
        </small></td>
      <td><?=word_limiter(ucwords($row->trobelsistem_deskripsi),7)?></td>
      <td><?=ucwords($row->trobelsistem_catatan ? word_limiter($row->trobelsistem_catatan,5):'-')?><br><small>
        <?=ucwords($row->trobelsistem_idpic ? 'Ditambahkan : '.$row->pic:'')?>
      </small></td>    
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