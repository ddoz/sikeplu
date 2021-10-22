<section class="content-header">
      <h1>
        Data Upload
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Data Upload</li>
        <li class="active"><i class="fa fa-info"></i> Detail</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Data Master
        <div class="pull-right">
            <a href="<?=base_url()?>uploadlist" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <?php $idMaster = ''; if(!empty($table['master'])) {
            $master = $table['master'];
            $idMaster = $master->plmasterId;
            ?>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Tujuan Upload</label>
                        </div>
                        <div class="col-md-9">
                            <div for="" class="alert alert-info"><?=$master->plmasterTujuan?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Kategori Upload</label>
                        </div>
                        <div class="col-md-9">
                            <div for="" class="alert alert-info"><?=$master->subkategoriNama?></div>
                        </div>
                    </div>
                    <?php if($master->plmasterTujuan=='Arsip') {
                        ?>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Status Arsip</label>
                        </div>
                        <div class="col-md-9">
                            <div for="" class="alert alert-info"><?=$master->plmasterStatusArsip?></div>
                        </div>
                    </div>
                        <?php
                    } ?>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Tanggal Upload</label>
                        </div>
                        <div class="col-md-9">
                            <div for="" class="alert alert-info"><?=$master->plmasterTanggal?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Deskripsi</label>
                        </div>
                        <div class="col-md-9">
                            <div for="" class="alert alert-info"><?=$master->plmasterDeskripsi?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="mailbox-attachments clearfix">
                                <li>
                                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> File Ikhtisar</a>
                                            <span class="mailbox-attachment-size">
                                            <a href="<?=base_url()?>berkas/ikhtisar/<?=$master->plmasterFileIkhtisar?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                            </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>

            <?php
        } ?>
    </div>
    <div class="box-footer">
        <button class="btn btn-warning btnIkhtisarRevisi" data-id="<?=$idMaster?>"><i class="fa fa-pencil"></i> Upload File Revisi</button>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        Data Detail
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <ul class="mailbox-attachments clearfix">
        <?php if(!empty($table['detail'])) {
            $detail = $table['detail'];
            $i=1;
            foreach($detail as $dt) {
            ?>

                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Lampiran <?=$i++;?></a>
                        <span class="mailbox-attachment-size">
                          <a href="<?=base_url()?>berkas/lampiran/<?=$dt->pldetailNamaFile?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
            <?php
            }
        } ?>
        </ul>
    </div>
    <div class="box-footer">
        <button class="btn btn-warning btnDetailRevisi" data-id="<?=$idMaster?>"><i class="fa fa-pencil"></i> Upload File Revisi</button>
    </div>
</div>

<?php if(!empty($table['tagarsip'])) { ?>
<div class="box box-primary">
    <div class="box-header with-border">
        Data Tag Arsip
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <ul>
        <?php if(!empty($table['tagarsip'])) {
            $detail = $table['tagarsip'];
            $i=1;
            foreach($detail as $dt) {
            ?>

                <li class="alert alert-info">
                    <?php echo $i.". "; echo $dt->divisiNama." - ".$dt->userNamaLengkap;?>
                </li>
            <?php
            $i++;
            }
        } ?>
        </ul>
    </div>
    <div class="box-footer">
        <button class="btn btn-warning btnTagRevisi" data-id="<?=$idMaster?>"><i class="fa fa-pencil"></i> Revisi Tag Arsip</button>
    </div>
</div>
<?php }?>

<?php if(!empty($table['persetujuan'])) { ?>
<div class="box box-primary">
    <div class="box-header with-border">
        Data Persetujuan
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <?php if(!empty($table['persetujuan'])) {
            $detail = $table['persetujuan'];
            $i=1;
            $arr = array("Belum"=>"warning","Setuju"=>"success","Tidak Setuju"=>"danger","Tunggu"=>"warning");
            foreach($detail[0] as $dt) {
            ?>
                <div class="alert alert-info">
                    <?php echo $i.". "; echo $dt->divisiNama." - ".$dt->userNamaLengkap. ". Persetujuan Level ".$dt->plpersetujuanLevel;?>
                    <label for="" class="label label-<?=$arr[$dt->plpersetujuanRespon]?>"><?=$dt->plpersetujuanRespon?></label>
                    <?php if($dt->plpersetujuanRespon=='Tidak Setuju') { echo "( Pengajuan Ditolak Karena : ". $dt->plpersetujuanKeterangan." )"; } ?>
                </div>
            <?php
            $i++;
            }
        } ?>
    </div>
    <div class="box-footer">
        <button class="btn btn-warning btnPersetujuanRevisi" data-id="<?=$idMaster?>"><i class="fa fa-pencil"></i> Revisi Persetujuan</button>
    </div>
</div>
<?php }?>
</section>

<!-- Modal -->
<div id="modalRevisiIkhtisar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Revisi Ikhtisar</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>uploadlist/revisiikhtisar" enctype="multipart/form-data" method="post">
            <input type="hidden" name="masterIdIkhtisar" id="masterIdIkhtisar" required>
            <div class="form-group">
                <label for="">File Revisi</label>
                <input type="file" name="fileIkhtisar" id="" required>
            </div>
            <button class="btn btn-primary" type="submit">Upload</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modalRevisiDetail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Revisi Detail</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>uploadlist/revisidetail" enctype="multipart/form-data" method="post">
            <input type="hidden" name="masterIdDetail" id="masterIdDetail" required>
            <div class="form-group">
                <label for="">File Revisi</label>
                <input type="file" name="fileDetail" id="" required>
            </div>
            <button class="btn btn-primary" type="submit">Upload</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>