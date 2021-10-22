<section class="content-header">
      <h1>
        Upload
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-plus"></i> Upload</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Form untuk Submit / Upload.
     <div id="info-alert"><?=$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" id="formUpload" action="<?=base_url()?>uploads/save" target="" enctype="multipart/form-data">
            <h3>Data Upload berkas</h3>
            <div class="form-group">
                <label>Sub Kategori</label>
                <select name="subkategoriId" id="subkategoriId" class="form-control selectUser" required style="width:100%">
                    <?php if(!empty($subkategori)){ foreach($subkategori as $sub){ ?>
                    <option value="<?=$sub->subkategoriId?>"><?=$sub->kategoriNama." - ".$sub->subkategoriNama?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <select name="plmasterTujuan" id="plmasterTujuan" class="form-control" required>
                    <option value="">Pilih Tujuan</option>
                    <option value="Arsip">Arsip</option>
                    <option value="Persetujuan">Persetujuan</option>
                </select>
            </div>
            <div class="form-group" id="plmasterStatusArsipHtml" style="display:none">
                <label>Status Arsip</label>
                <select name="plmasterStatusArsip" id="plmasterStatusArsip" class="form-control">
                    <option value="">Pilih Status Arsip</option>
                    <option value="Private">Private</option>
                    <option value="Public">Public</option>
                    <option value="Tag">Tag</option>
                </select>
            </div>
            <div class="form-group" id="plmasterTagArsipHtml" style="display:none">
                <label>Tag Pengguna</label> <!-- <button type="button" class="btn btn-primary btn-xs favArsip"><i class="fa fa-star"></i> Ambil Favorit</button> -->
                <select name="plmasterTagArsip[]" id="plmasterTagArsip" class="form-control selectUser" multiple="multiple" style="width:100%">
                    <?php if(!empty($user)){ foreach($user as $usr){ ?>
                    <option value="<?=$usr->userId?>"><?=$usr->userNamaLengkap?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="form-group" id="plmasterPersetujuanUserHtml" style="display:none">
                <label>Persetujuan Pengguna Dari</label>
                <select name="plmasterPersetujuanUser[]" id="plmasterPersetujuanUser" class="form-control selectUser" style="width:100%" multiple="multiple">
                    <?php if(!empty($user)){ foreach($user as $usr){ ?>
                    <option value="<?=$usr->userId?>"><?=$usr->userNamaLengkap?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="plmasterDeskripsi" id="plmasterDeskripsi" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>File Ikhtisar (Excel,Word)</label>
                <input type="file" name="plmasterIkhtisar" id="plmasterIkhtisar" required>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th class="col-md-4">File yang akan di upload (Excel,Word)</th>
                        <td><button id="btnTambahFile" type="button" class="btn btn-success btn-xs">+</button></td>
                    </tr>
                    <tr class="warning">
                        <th>
                            <input type="file" name="pldetailNamaFile[]" id="" required>
                        </th>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <button type="submit" id="btnSimpanUpload" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>

<div id="modalArsip" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Favorit Tag</h4>
      </div>
      <div class="modal-body">
        <?php if(!empty($favorit)) { $i=0;
            foreach($favorit as $fav){ 
                $arr = array();
                foreach($fav->detail as $dt) {
                    $arr[] = $dt->favoritdetailUserId;
                }
                $ho = implode('.',$arr);
                ?>
            <button class="btn btn-primary favArsipBtn" data-id="<?=$ho?>" type="button"><?=$fav->favoritJudul?></button>
        <?php $i++;}}?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

