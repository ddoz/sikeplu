<section class="content-header">
      <h1>
        Kelengkapan Data
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-plus"></i> Kelengkapan Data</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Form untuk Submit / Upload.
     <div id="info-alert"><?=$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" id="formUpload" action="<?=base_url()?>pengajuan/save" target="" enctype="multipart/form-data">
            <h3>Identitas Media</h3>
            <div class="form-group">
                <label>Tipe Media</label>
                <select name="tipemedia_id" required id="" class="form-control">
                    <option value="">Pilih</option>
                    <?php foreach($tipemedia as $tp){ ?>
                        <option <?=(@$proposal->tipemedia_id==$tp->id)?"selected":""?> value="<?=$tp->id?>"><?=$tp->nama?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Media</label>
                <input type="text" class="form-control" value="<?=@$proposal->nama_media?>" name="nama_media" id="nama_media" required>
            </div>
            <div class="form-group">
                <label>Nama PIC</label>
                <input type="text" class="form-control" value="<?=@$proposal->nama_pic?>" name="nama_pic" id="nama_pic" required>
            </div>
            <div class="form-group">
                <label>Jabatan PIC</label>
                <input type="text" class="form-control" value="<?=@$proposal->jabatan_pic?>" name="jabatan_pic" id="jabatan_pic" required>
            </div>
            <div class="form-group">
                <label>Alamat Website Media</label>
                <input type="text" class="form-control" value="<?=@$proposal->website?>" name="website" id="website" required>
            </div>
            <div class="form-group">
                <label>Alamat Redaksi 1</label>
                <textarea name="alamat_redaksi_1" id="alamat_redaksi_1" required class="form-control"><?=@$proposal->alamat_redaksi_1?></textarea>
            </div>
            <div class="form-group">
                <label>Alamat Redaksi 2</label>
                <textarea name="alamat_redaksi_2" id="alamat_redaksi_2" required class="form-control"><?=@$proposal->alamat_redaksi_2?></textarea>
            </div>
            <div class="form-group">
                <label>Provinsi</label>
                <input type="text" value="<?=@explode('_',@$proposal->provinsi)[1]?>" readonly disabled class="form-control">
                <select name="provinsi" id="provinsi" class="form-control selectUser" style="width:100%">
                    <option value="">Pilih</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kota</label>
                <input type="text" value="<?=@$proposal->kota?>" readonly disabled class="form-control">
                <select name="kota" id="kota" class="form-control selectUser" style="width:100%">
                    <option value="">Pilih</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kode POS</label>
                <input type="text" value="<?=@$proposal->kode_pos?>" class="form-control" name="kode_pos" id="kode_pos" required>
            </div>
            <div class="form-group">
                <label>Email Redaksi</label>
                <input type="text" value="<?=@$proposal->email_redaksi?>" class="form-control" name="email_redaksi" id="email_redaksi" required>
            </div>
            <div class="form-group">
                <label>Kontak Redaksi</label>
                <input type="text" value="<?=@$proposal->kontak_redaksi?>" class="form-control" name="kontak_redaksi" id="kontak_redaksi" required>
            </div>
            


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Kelengkapan Berkas</a></li>
                <li><a data-toggle="tab" href="#menu1">Ceklis Persyaratan</a></li>
            </ul>


            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Kelengkapan Berkas</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        
                            <tr <?php if(@$proposal->kartu_identitas_pic_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->kartu_identitas_pic_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>Kartu Identitas PIC (JPG *1MB)

                            
                                </th>
                                
                                <td>
                                    <input type="file" name="kartu_identitas_pic" accept=".jpg,.png" class="form-control">
                                    <?php if(@$proposal->kartu_identitas_pic!="") { ?>
                                    <img class="img-responsive" width="150" src="<?=base_url()?>berkas/proposal/<?=@$proposal->kartu_identitas_pic?>" alt="">
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"><?=@$proposal->kartu_identitas_pic_ket?></textarea>
                                </td>
                                <td>
                                    <?php if(@$proposal->kartu_identitas_pic_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->kartu_identitas_pic_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr
                            <?php if(@$proposal->sk_pic_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->sk_pic_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>
                            >
                                <th>SK PIC (PDF *1MB)</th>
                                <td>
                                    <input type="file" name="sk_pic" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->sk_pic!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->sk_pic?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>

                                <?php if(@$proposal->sk_pic_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->sk_pic_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr
                            <?php if(@$proposal->surat_permohonan_kerjasama_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->surat_permohonan_kerjasama_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>Surat Permohonan Kerjasama (PDF *1MB)</th>
                                <td>
                                    <input type="file" name="surat_permohonan_kerjasama" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->surat_permohonan_kerjasama!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->surat_permohonan_kerjasama?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>
                                <?php if(@$proposal->surat_permohonan_kerjasama_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->surat_permohonan_kerjasama_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr
                            <?php if(@$proposal->proposal_penawaran_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->proposal_penawaran_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>Proposal Penawaran (PDF *1MB)</th>
                                <td>
                                    <input type="file" name="proposal_penawaran" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->proposal_penawaran!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->proposal_penawaran?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>
                                <?php if(@$proposal->proposal_penawaran_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->proposal_penawaran_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr
                            <?php if(@$proposal->siup_situ_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->siup_situ_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>SIUP/SITU (PDF *1MB)</th>
                                <td>
                                    <input type="file" name="siup_situ" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->siup_situ!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->siup_situ?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>
                                <?php if(@$proposal->siup_situ_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->siup_situ_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr
                            <?php if(@$proposal->npwp_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->npwp_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>NPWP (JPG *1MB)</th>
                                <td>
                                    <input type="file" name="npwp" accept=".jpg,.png" class="form-control">
                                    <?php if(@$proposal->npwp!="") { ?>
                                        <img class="img-responsive" width="150" src="<?=base_url()?>berkas/proposal/<?=@$proposal->npwp?>">
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>
                                <?php if(@$proposal->npwp_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->npwp_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr
                            <?php if(@$proposal->sertifikat_kemenkumham_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->sertifikat_kemenkumham_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>Sertifikast KEMENKUMHAM (PDF *1MB)</th>
                                <td>
                                    <input type="file" name="sertifikat_kemenkumham" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->sertifikat_kemenkumham!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->sertifikat_kemenkumham?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>
                                <?php if(@$proposal->sertifikat_kemenkumham_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->sertifikat_kemenkumham_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr
                            <?php if(@$proposal->sertifikat_dewan_pers_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->sertifikat_dewan_pers_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>Sertifikat Dewan PERS (PDF *1MB)</th>
                                <td>
                                    <input type="file" name="sertifikat_dewan_pers" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->sertifikat_dewan_pers!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->sertifikat_dewan_pers?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>
                                <?php if(@$proposal->sertifikat_dewan_pers_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->sertifikat_dewan_pers_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                    </div>
           
           </form>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Ceklis Persyaratan</h3>
                    <form action="<?=base_url()?>pengajuan/ceklis" method="post">
                    <?php if(!empty($ceklis)){ foreach($ceklis as $ck){ ?>
                        <input type="hidden" name="proposal_id" value="<?=$proposal->id?>">
                        <div class="form-group col-md-6">
                            <label><?=$ck['nama_kriteria']?></label>
                            <input type="hidden" name="kriteria_id[]" value="<?=$ck['id_kriteria']?>">
                            <select name="kriteriadetail_id[]" id="" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach($ck['detail'] as $cd){ ?>
                                    <option <?=($cd['id']==$ck['pilih'])?"selected":""?> value="<?=$cd['id']."_".$cd['nilai']?>"><?=$cd['nama_nilai']?></option>
                                <?php }?>
                            </select>
                        </div>

                    <?php }}?>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>

    </div>
    <div class="box-footer">
            <form action="">
                <div class="form-group">
                    <label for="">Status Saat ini Adalah : <?=strtoupper($proposal->status)?></label>
                </div>
            </form>
    </div>
</div>


</section>