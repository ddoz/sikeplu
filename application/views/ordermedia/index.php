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
            <?php if($this->session->userdata('userLevel')=="1") { ?>
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
                    <th>Tanggal Order</th>
                    <th>Bukti Tayang</th>
                </tr>
            </thead>
            <tbody>
            <?php $array_status = array("0"=>"Order", "1"=>"Diterima", "9"=>"Ditolak"); $i = 1; if(!empty($proposal)) { foreach($proposal as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->nama_media?></td>
                    <td><?=$row->keterangan_order?></td>
                    <td><a href="<?=base_url()?>berkas/proposal/<?=$row->surat_order?>"><i class="fa fa-download"></i></a> </td>
                    <td><?=$row->created_at?></td>
                    <th>
                        <a href="<?=base_url()?>dataupload/list/<?=$row->id_media?>/<?=$row->id?>" class="btn btn-primary btn-xs">Upload Bukti Tayang</a>
                    </th>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
