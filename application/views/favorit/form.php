<section class="content-header">
      <h1>
        Favorit
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-star"></i> Favorit</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Form untuk menambahkan favorit.
        <div class="pull-right">
            <a href="<?=base_url()?>favorit" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form id="" method="POST" action="<?=base_url()?>favorit/<?=$mode?>" target="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Favorit</label>
                <input type="hidden" name="favoritId" <?php if(!empty($form)){ echo "value='".$form->favoritId."'"; } ?>>
                <input type="text" <?php if(!empty($form)){ echo "value='".$form->favoritJudul."'"; } ?> name="favoritJudul" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">User</label>
                <select name="favoritdetailUserId[]" id="" required class="form-control selectUser" style="width:100%" multiple="multiple">
                    <?php if(!empty($user)){ foreach($user as $u){ ?>
                    <option value="<?=$u->userId?>"><?=$u->divisiNama."-".$u->userNamaLengkap?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
