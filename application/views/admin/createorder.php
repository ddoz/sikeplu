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
                <select name="id_media" required id="id_media" class="form-control">
                    <option value="">pilih</option>
                    <?php foreach($media as $m) { ?>
                        <option value="<?=$m->id?>"><?=$m->nama_media?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Keterangan Order</label>
                <textarea name="keterangan_order" required class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
