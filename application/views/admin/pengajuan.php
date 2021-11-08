<section class="content-header">
      <h1>
        Data Pengajuan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Data Pengajuan</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Pengajuan.
        <div class="pull-right">
            <!-- <a href="<?=base_url()?>kategori/form" class="btn btn-success"><i class="fa fa-plus"></i></a> -->
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Tipe Media</th>
                    <th>Nama Media</th>
                    <th>Nama PIC</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($proposal)) { foreach($proposal as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->nama?></td>
                    <td><?=$row->nama_media?></td>
                    <td><?=$row->nama_pic?></td>
                    <td><?=$row->status?></td>
                    <td>
                        <a href="<?=base_url()?>adminpengajuan/form/<?=$row->id?>" class="btn btn-warning btn-xs"><i class="fa fa-search"></i> Lihat Detail</a>
                        <button onclick="var w = confirm('Hapus Data Ini?'); if(w){ window.location.href='<?=base_url()?>adminpengajuan/delete/<?=$row->id?>'; }" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</button>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
