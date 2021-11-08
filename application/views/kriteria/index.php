<section class="content-header">
      <h1>
        Kriteria Penilaian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Kriteria Penilaian</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Kriteria Penilaian.
        <div class="pull-right">
            <a href="<?=base_url()?>kriteria/form" class="btn btn-success"><i class="fa fa-plus"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)) { foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->nama_kriteria?></td>
                    <td><?=$row->keterangan?></td>
                    <td>
                    <button type="button" data-keterangan="<?=$row->keterangan?>" data-nama_kriteria="<?=$row->nama_kriteria?>" data-id="<?=$row->id?>" class="btn btn-warning btn-xs btnEditKriteria"><i class="fa fa-pencil"></i></button>
                        <a href="<?=base_url()?>kriteria/detail/<?=$row->id?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Lihat Detail</a>
                        <a onclick="return confirm('Hapus Data?')" href="<?=base_url()?>kriteria/hapus/<?=$row->id?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</a>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?=base_url()?>kriteria/update" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Edit</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Penilaian</label>
                <input type="hidden" name="id" id="id" required>
                <input type="text" name="nama_kriteria" id="nama_kriteria" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Keterangan dibagian input</label>
                <input type="text" name="keterangan" id="keterangan" required class="form-control">
            </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>

  </div>
</div>