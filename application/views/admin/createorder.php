<section class="content-header">
      <h1>
        Form Order Media
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Form Order Media</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk menambahkan Order Media.
        <div class="pull-right">
            <a href="<?=base_url()?>adminordermedia" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>adminordermedia/save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Media</label>
                <select name="id_media" required id="id_media" class="form-control select2">
                    <option value="">Pilih Media</option>
                    <?php foreach($media as $m) { ?>
                        <option value="<?=$m->id?>">Nama Media : <?=$m->nama_media?> | UKW : <?=($m->nama_penilaian=="")?"Belum Mengisi/Tidak Ada":$m->nama_penilaian?> | Tipe Media : <?=$m->tipe_media?> | Jumlah Order : <?=getJumlahOrder($m->id)?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Keterangan Order</label>
                <textarea name="keterangan_order" required class="form-control"></textarea>
            </div>
            <div class="fowm-group">
                <label for="">Surat Order (1MB PDF)</label>
                <input type="file" name="surat_order" required class="form-control">
            </div>
            <div class="form-group">
                <br>
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
