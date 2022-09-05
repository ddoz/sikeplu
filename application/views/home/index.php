<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        SIKEPLU SYSTEM 
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">

        <h4>Selamat Datang</h4>
        <div class="col-md-6">
            <ul class='list-group'>
            <?php if($this->session->userdata('userLevel')=='0'){ 
                if(@$media != "") { ?>
                <li class="list-group-item">Nama Media <b class='pull-right'> <?=$media->nama_media?></b></li>
                <li class="list-group-item">Tipe Media <b class='pull-right'> <?=$media->nama?></b></li>
                <li class="list-group-item">Status <b class='pull-right'> <?php  echo (strtoupper($media->status)=="DITERIMA")?"Berkas & Persyaratan Lengkap":"Berkas & Persyaratan Tidak Lengkap/Terdapat Kesalahan";?></b></li>
            <?php }else { echo "<center class='text-danger'>Anda Belum Melakukan Pengajuan Kerjasama</center>"; }} ?>
            </ul>
            <?php if($this->session->userdata('userLevel')!='0'){ ?>
                <a href="<?=base_url()?>assets/Manual Book SIKEPLU_Admin.pdf" class="btn btn-primary">Download Manual Book Admin</a>
            <?php }else { ?>
                <a href="<?=base_url()?>assets/Manual Book SIKEPLU_User.pdf" class="btn btn-primary">Download Manual Book User</a>
            <?php }?>
        </div>
    </div>
</div>


<div class="box box-secondary">
    <div class="box-header with-border">
        ALUR SIKEPLU
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
            <h4>ALUR USER</h4>
            <img src="<?=base_url()?>assets/alur_user.png" class="img-responsive img-thumbnail" alt="">

       
    </div>
</div>

</section>