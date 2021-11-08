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
        Data Kriteria Penilaian <?=@$kriteria->nama_kriteria?>.
        <div class="pull-right">
            <a href="<?=base_url()?>kriteria" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
        
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>

     
        
     <div class="col-md-6">

        <form method="POST" action="<?=base_url()?>kriteria/savedetail" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Penilaian</label>
                <input type="hidden" name="kriteria_penilaian_id" value="<?=@$kriteria->id?>">
                <input type="text" name="nama_penilaian" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nilai</label>
                <input type="number" name="nilai" required class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
        </div>

    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Nama Penilaian</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)) { foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->nama_penilaian?></td>
                    <td><?=$row->nilai?></td>
                    <td>
                        <button type="button" data-nama_penilaian="<?=$row->nama_penilaian?>" data-nilai="<?=$row->nilai?>" data-kriteria="<?=$row->kriteria_penilaian_id?>" data-id="<?=$row->id?>" class="btn btn-info btn-xs btnEdit"><i class="fa fa-pencil"></i> Ubah Data</button>
                        <a onclick="return confirm('Hapus Data?')" href="<?=base_url()?>kriteria/hapusdetail/<?=$row->id?>/<?=$row->kriteria_penilaian_id?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</a>
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
    <form action="<?=base_url()?>kriteria/updatedetail" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Edit</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Penilaian</label>
                <input type="hidden" name="id" id="id" required>
                <input type="hidden" name="kriteria_penilaian_id" id="kriteria_penilaian_id" required>
                <input type="text" name="nama_penilaian" id="nama_penilaian" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nilai</label>
                <input type="text" name="nilai" id="nilai" required class="form-control">
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