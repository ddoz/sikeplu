<section class="content-header">
      <h1>
        Sub Kategori
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Sub Kategori</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Form untuk menambahkan Sub Kategori.
        <div class="pull-right">
            <a href="<?=base_url()?>subkategori" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form id="" method="POST" action="<?=base_url()?>subkategori/<?=$mode?>" target="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Pilih Kategori</label>
                   <select name="kategoriId" id="" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <?php if(!empty($kategori)){ foreach($kategori as $kat){ 
                            
                    ?>
                    <option <?php if(!empty($form)) { ?> <?=($form->subkategoriId==$kat->kategoriId)?'selected':''; }?> value="<?=$kat->kategoriId?>"><?=$kat->kategoriNama?></option>
                    <?php }}?>
                   </select>
            </div>
            <div class="form-group">
                <label>Nama Sub Kategori</label>
                <input type="hidden" name="subkategoriId" value="<?php if(!empty($form)) { echo $form->subkategoriId; } ?>">
                <input <?php if(!empty($form)){ echo "value='".$form->subkategoriNama."'"; }?> type="text" required name="subkategoriNama" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
