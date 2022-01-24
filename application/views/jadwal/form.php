<section class="content-header">
      <h1>
        Form Jadwal
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Form Jadwal</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk menambahkan Jadwal.
        <div class="pull-right">
            <a href="<?=base_url()?>jadwal" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>jadwal/save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Waktu Mulai</label>
                <input type="text" name="waktu_mulai" required class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="">Waktu Selesai</label>
                <input type="text" name="waktu_selesai" required class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="">Status Jadwal</label>
                <select name="status_jadwal" required class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
