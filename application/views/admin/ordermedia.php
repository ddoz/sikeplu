<section class="content-header">
      <h1>
        Data Order Media
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Data Order Media</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Order Media.
        <div class="pull-right">
            <?php if($this->session->userdata('userLevel')=="1"||$this->session->userdata('userLevel')=="3" ) { ?>
            <a href="<?=base_url()?>adminordermedia/form" class="btn btn-success"><i class="fa fa-plus"></i></a>
            <?php }?>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        
        <div class="table-responsive">
            
        <table class="table table-hover exporting-table">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Nama Media</th>
                    <th>Keterangan Order</th>
                    <th>Surat Order</th>
                    <th>Status Order</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $array_status = array("0"=>"Order", "1"=>"Diterima", "9"=>"Ditolak"); $i = 1; if(!empty($proposal)) { foreach($proposal as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->nama_media?> | Total Order Diterima : (<?=getJumlahOrder($row->id_proposal)?>)</td>
                    <td><?=$row->keterangan_order?></td>
                    <td><a href="<?=base_url()?>berkas/proposal/<?=$row->surat_order?>"><i class="fa fa-download"></i></a> </td>
                    <td><?=$array_status[$row->status_order]?></td>
                    <td><?=$row->created_at?></td>
                    <td>
                    <?php if($this->session->userdata('userLevel')=="1"||$this->session->userdata('userLevel')=="3") { ?>
                        <button onclick="var w = confirm('Hapus Data Ini?'); if(w){ window.location.href='<?=base_url()?>adminordermedia/delete/<?=$row->id?>'; }" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</button>
                    <?php }?>
                    <?php if($this->session->userdata('userLevel')=="2") { ?>
                        <?php if($row->status_order=="0") { ?>
                        <a onclick="return confirm('Terima DATA?')" href="<?=base_url()?>adminordermedia/approve/<?=$row->id?>" class="btn btn-success pull-right"><span class="fa fa-check"></span> Terima</a>
                        <a onclick="return confirm('Tolak DATA?')" href="<?=base_url()?>adminordermedia/decline/<?=$row->id?>"  class="btn btn-danger pull-right"><span class="fa fa-remove"></span> Tolak</a>
                        <?php }?>
                    <?php }?>
                    <?php if($row->status_order=="1") { ?>
                    <a href="<?=base_url()?>adminordermedia/buktitayang/<?=$row->id?>" class="btn btn-info btn-xs">Lihat Bukti Tayang</a>
                    <?php }?>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
