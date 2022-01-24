<section class="content-header">
      <h1>
        Jadwal Pengajuan Proposal
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Jadwal Pengajuan Proposal</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Jadwal Pengajuan Proposal.
        <div class="pull-right">
            <a href="<?=base_url()?>jadwal/form" class="btn btn-success"><i class="fa fa-plus"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)) { foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->waktu_mulai?></td>
                    <td><?=$row->waktu_selesai?></td>
                    <td><?=($row->status_jadwal=="1")?"Aktif":"Tidak Aktif"?></td>
                    <td>
                    <button type="button" data-waktu_mulai="<?=$row->waktu_mulai?>" data-status="<?=$row->status_jadwal?>" data-waktu_selesai="<?=$row->waktu_selesai?>" data-id="<?=$row->id?>" class="btn btn-warning btn-xs btnEdit"><i class="fa fa-pencil"></i></button>
                        <a onclick="return confirm('Hapus Data?')" href="<?=base_url()?>jadwal/hapus/<?=$row->id?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</a>
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
    <form action="<?=base_url()?>jadwal/update" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Edit</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="">Waktu Mulai</label>
                <input type="hidden" name="id" id="id" required>
                <input type="text" name="waktu_mulai" id="waktu_mulai" required class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="">Waktu Selesai</label>
                <input type="text" name="waktu_selesai" id="waktu_selesai" required class="form-control datepicker">
            </div>
            
            <div class="form-group">
                <label for="">Waktu Selesai</label>
                <select name="status_jadwal" id="status_jadwal" required class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
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