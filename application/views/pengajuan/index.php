<section class="content-header">
      <h1>
        Kelengkapan Data
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-plus"></i> Kelengkapan Data</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk Submit / Upload.
     <div id="info-alert"><?=$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" id="formUpload" action="<?=base_url()?>pengajuan/save" target="" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin akan mengirim data yang sudah di inputkan?')">
            <h3>Identitas Media</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nomor KTP</label>
                                <input type="number" required name="nomor_ktp" value="<?=@$proposal->nomor_ktp?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nomor NPWP</label>
                                <input type="number" required name="nomor_npwp" value="<?=@$proposal->nomor_npwp?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipe Media</label>
                                <select name="tipemedia_id" required id="tipemedia_id" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach($tipemedia as $tp){ ?>
                                        <option <?=(@$proposal->tipemedia_id==$tp->id)?"selected":""?> value="<?=$tp->id?>"><?=$tp->nama?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Media</label>
                                <input type="text" class="form-control" value="<?=@$proposal->nama_media?>" name="nama_media" id="nama_media" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Pemilik Perusahaan</label>
                                <input type="text" class="form-control" value="<?=@$proposal->nama_pic?>" name="nama_pic" id="nama_pic" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="jabatan_pic" id="jabatan_pic" required class="form-control">
                                    <option value="">Pilih</option>
                                <?php foreach($jabatan as $jbt) { ?>
                                    <option <?=@$proposal->jabatan_pic==$jbt->id?"selected":""?> value="<?=$jbt->id?>"><?=$jbt->nama_jabatan?></option>
                                <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Website Media</label>
                                <input type="text" class="form-control" value="<?=@$proposal->website?>" name="website" id="website">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Redaksi 1</label>
                                <textarea name="alamat_redaksi_1" id="alamat_redaksi_1" required class="form-control"><?=@$proposal->alamat_redaksi_1?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Redaksi 2</label>
                                <textarea name="alamat_redaksi_2" id="alamat_redaksi_2" required class="form-control"><?=@$proposal->alamat_redaksi_2?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" value="<?=@explode('_',@$proposal->provinsi)[1]?>" readonly disabled class="form-control">
                                <select name="provinsi" id="provinsi" class="form-control selectUser" style="width:100%">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" value="<?=@$proposal->kota?>" readonly disabled class="form-control">
                                <select name="kota" id="kota" class="form-control selectUser" style="width:100%">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode POS</label>
                                <input type="text" value="<?=@$proposal->kode_pos?>" class="form-control" name="kode_pos" id="kode_pos" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <input type="text" value="<?=@$proposal->email_redaksi?>" class="form-control" name="email_redaksi" id="email_redaksi" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No. Telp/HP Perusahaan</label>
                                <input type="text" value="<?=@$proposal->kontak_redaksi?>" class="form-control" name="kontak_redaksi" id="kontak_redaksi" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No. Rekening</label>
                                <input type="text" value="<?=@$proposal->nomor_rekening?>" class="form-control" name="nomor_rekening" id="nomor_rekening" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" value="<?=@$proposal->nama_bank?>" class="form-control" name="nama_bank" id="nama_bank" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload Rekening</label>
                                <input <?php  if(@$proposal->upload_rekening==null){ echo 'required'; }?> type="file" value="<?=@$proposal->upload_rekening?>" class="form-control" name="upload_rekening" id="upload_rekening">
                                <?php if(@$proposal->upload_rekening!=null){ ?>
                                <a href="<?=base_url()?>berkas/proposal/<?=$proposal->upload_rekening?>">Lihat Dokumen</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?=base_url()?>assets/alur_user.png" class="img-responsive img-thumbnail" alt="">
                </div>
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
                            <tr
                            <?php if(@$proposal->akta_perusahaan_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->akta_perusahaan_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>
                            >
                                <th>Akta Perusahaan Terakhir (Lengkap) (PDF *5MB)</th>
                                <td>
                                    <input type="file" name="akta_perusahaan" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->akta_perusahaan!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->akta_perusahaan?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"><?=@$proposal->akta_perusahaan_ket?></textarea>
                                </td>
                                <td>

                                <?php if(@$proposal->akta_perusahaan_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->akta_perusahaan_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                        
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
                                <th>Surat Tugas Kepala Biro (PDF *1MB)</th>
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
                                <th>NIB (IU/SIUP/SITU) (PDF *1MB)</th>
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
                                <th>Sertifikat KEMENKUMHAM (PDF *1MB)</th>
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
                            <tr
                            <?php if(@$proposal->spt_tahun_terakhir_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->spt_tahun_terakhir_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>SPT Tahun Terakhir (PDF *1MB)</th>
                                <td>
                                    <input type="file" name="spt_tahun_terakhir" accept=".pdf" class="form-control">
                                    <?php if(@$proposal->spt_tahun_terakhir!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->spt_tahun_terakhir?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea readonly="readonly" disabled="disabled" name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </td>
                                <td>
                                <?php if(@$proposal->spt_tahun_terakhir_status=="1") { ?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php }else if(@$proposal->spt_tahun_terakhir_status=="0") { ?>
                                        <i class="fa fa-minus"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-remove text-danger"></i>
                                    <?php }?>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="form-group">
                    <label for="" class="text text-danger">*Bisa diubah sebelum status menjadi diterima</label> 
                    <?php if(strtolower(@$proposal->status)!='diterima'){ ?>
                       <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-save"></span> Kirim</button>
                       <?php }?>
                    </div>
           
           </form>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Ceklis Persyaratan</h3>
                    <form action="<?=base_url()?>pengajuan/ceklis" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin akan mengirim data yang sudah di inputkan?')">
                    <div class="row">
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
                            <div class="form-group">
                                <label for="">Upload Data (<?=$ck['keterangan']?>)</label>
                                <input type="file" name="bukti[]" class="form-control">
                                <?php if($ck['file']!=""){ ?>
                                <a target="_blank" href="<?=base_url()?>berkas/proposal/<?=$ck['file']?>" class="text text-danger">Lihat Dokumen <?=$ck['nama_kriteria']?> yang sudah diupload</a>
                                <?php }else { echo "Belum Upload bukti data ".$ck['nama_kriteria']; }?>
                            </div>
                        </div>

                    <?php }}?>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="text text-danger">*Bisa Di Isi setelah anda melakukan submit Identitas Media dan Kelengkapan Berkas</label><br>
                        <label for="" class="text text-danger">*Bisa diubah sebelum status menjadi diterima</label> 
                        <?php if(!empty($ceklis)){ if(strtolower(@$proposal->status)!='diterima'){ ?>
                       <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-save"></span> Kirim</button>
                       <?php }}?>
                    </div>
                    </form>
                </div>
            </div>

    </div>
    <div class="box-footer">
            <form action="">
                <div class="form-group">
                    <label for="">Status Saat ini Adalah : <?=strtoupper(@$proposal->status)?></label>
                </div>
            </form>
    </div>
</div>


</section>