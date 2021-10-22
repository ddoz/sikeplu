<section class="content-header">
      <h1>
        Kategori
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Kategori</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Form untuk menambahkan Kategori.
        <div class="pull-right">
            <a href="<?=base_url()?>kategori" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form id="" method="POST" action="<?=base_url()?>kategori/<?=$mode?>" target="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="hidden" name="kategoriId" <?php if(!empty($form)){ echo "value='".$form->kategoriId."'"; } ?>>
                <input type="text" <?php if(!empty($form)){ echo "value='".$form->kategoriNama."'"; } ?> name="kategoriNama" required class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
