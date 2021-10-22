<section class="content-header">
      <h1>
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Pengguna</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Form untuk menambahkan Pengguna.
        <div class="pull-right">
            <a href="<?=base_url()?>pengguna" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>pengguna/<?=$mode?>" target="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Pilih Divisi</label>
                <select name="userDivisi" id="" class="form-control" required>
                    <option value="">Pilih Divisi</option>
                    <?php if(!empty($divisi)){ foreach($divisi as $dv){ ?>
                    <option <?php if(!empty($form)){ if($form->userDivisi==$dv->divisiId){ echo 'selected'; } } ?> value="<?=$dv->divisiId?>"><?=$dv->divisiNama?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="form-group">
                <label>Username</label>
                <?php if(!empty($form)){ ?>
                <input type="hidden" name="userNameOld" value="<?=$form->userName?>">
                <input type="hidden" name="userId" value="<?=$form->userId?>">
                <?php }?>
                <input <?php if(!empty($form)){ echo "value='".$form->userName."'"; }?> type="text" name="userName" required class="form-control">
            </div>
            <?php if(empty($form)) { ?>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="userPassword" required class="form-control">
            </div>
            <?php }?>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="userNamaLengkap" <?php if(!empty($form)){ echo "value='".$form->userNamaLengkap."'"; }?> class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="cetak" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
