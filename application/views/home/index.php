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
            <?php if(@$media != "") { ?>
                <li class="list-group-item">Nama Media <b class='pull-right'> <?=$media->nama_media?></b></li>
                <li class="list-group-item">Tipe Media <b class='pull-right'> <?=$media->nama?></b></li>
                <li class="list-group-item">Status Kerjasama <b class='pull-right'> <?=strtoupper($media->status)?></b></li>
            <?php }else { echo "<center class='text-danger'>Anda Belum Melakukan Pengajuan Kerjasama</center>"; } ?>
            </ul>
        </div>
    </div>
</div>

</section>