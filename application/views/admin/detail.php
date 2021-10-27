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
            <h3>Identitas Media</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nomor KTP</label>
                        <input type="number" disabled required name="nomor_ktp" value="<?=@$proposal->nomor_ktp?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nomor NPWP</label>
                        <input type="number" disabled required name="nomor_npwp" value="<?=@$proposal->nomor_npwp?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipe Media</label>
                        <select readonly="readonly" disabled name="tipemedia_id" required id="" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach($tipemedia as $tp){ ?>
                                <option <?=(@$proposal->tipemedia_id==$tp->id)?"selected":""?> value="<?=$tp->id?>"><?=$tp->nama?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Media</label>
                        <input readonly="readonly" disabled type="text" class="form-control" value="<?=@$proposal->nama_media?>" name="nama_media" id="nama_media" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Pemilik Perusahaan</label>
                        <input readonly="readonly" disabled type="text" class="form-control" value="<?=@$proposal->nama_pic?>" name="nama_pic" id="nama_pic" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select disabled readonly name="jabatan_pic" id="jabatan_pic" required class="form-control">
                            <option value="">Pilih</option>
                        <?php foreach($jabatan as $jbt) { ?>
                            <option <?=@$proposal->jabatan_pic==$jbt->id?"selected":""?> value="<?=$jbt->id?>"><?=$jbt->nama_jabatan?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat Website Media</label>
                        <input readonly="readonly" disabled type="text" class="form-control" value="<?=@$proposal->website?>" name="website" id="website" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat Redaksi 1</label>
                        <textarea readonly="readonly" disabled name="alamat_redaksi_1" id="alamat_redaksi_1" required class="form-control"><?=@$proposal->alamat_redaksi_1?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat Redaksi 2</label>
                        <textarea readonly="readonly" disabled name="alamat_redaksi_2" id="alamat_redaksi_2" required class="form-control"><?=@$proposal->alamat_redaksi_2?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" value="<?=@explode('_',@$proposal->provinsi)[1]?>" readonly disabled class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" value="<?=@$proposal->kota?>" readonly disabled class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode POS</label>
                        <input readonly="readonly" disabled type="text" value="<?=@$proposal->kode_pos?>" class="form-control" name="kode_pos" id="kode_pos" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Perusahaan</label>
                        <input readonly="readonly" disabled type="text" value="<?=@$proposal->email_redaksi?>" class="form-control" name="email_redaksi" id="email_redaksi" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No. Telp/HP Perusahaan</label>
                        <input readonly="readonly" disabled type="text" value="<?=@$proposal->kontak_redaksi?>" class="form-control" name="kontak_redaksi" id="kontak_redaksi" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No. Rekening</label>
                        <input type="text" disabled value="<?=@$proposal->nomor_rekenig?>" class="form-control" name="nomor_rekenig" id="nomor_rekenig" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="text" disabled value="<?=@$proposal->nama_bank?>" class="form-control" name="nama_bank" id="nama_bank" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Rekening</label></br>
                        <a target="_blank" href="<?=base_url()?>berkas/proposal/<?=@$proposal->upload_rekening?>">Lihat Dokumen</a>
                    </div>
                </div>
                        </div>


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Kelengkapan Berkas</a></li>
                <li><a data-toggle="tab" href="#menu1">Ceklis Persyaratan</a></li>
                <li><a data-toggle="tab" href="#menu2">Pengiriman Bukti Tayang</a></li>
            </ul>


            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Kelengkapan Berkas</h3>
                    <div class="table-responsive">
                        <form action="<?=base_url()?>adminpengajuan/validasi" method="post">
                        <input type="hidden" name="proposal_id" value="<?=$proposal->id?>">
                        <table class="table table-bordered">
                            <input type="hidden" name="id" value="<?=$proposal->id?>">
                            <tr
                            <?php if(@$proposal->akta_perusahaan_status=="1") { ?>
                                class="bg-success"
                                <?php }else if(@$proposal->akta_perusahaan_status=="0") { ?>
                                    class="bg-secondary"
                                <?php }else { ?>
                                    class="bg-danger"
                                <?php }?>>
                                <th>Akta Perusahaan (PDF *1MB)</th>
                                <td>
                                    <?php if(@$proposal->akta_perusahaan!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->akta_perusahaan?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="akta_perusahaan_ket" id="akta_perusahaan_ket" cols="30" rows="10" class="form-control"><?=@$proposal->akta_perusahaan_ket?></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="check" value="1-akta_perusahaan"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-akta_perusahaan"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->kartu_identitas_pic!="") { ?>
                                    <img class="img-responsive" width="150"  src="<?=base_url()?>berkas/proposal/<?=@$proposal->kartu_identitas_pic?>" alt="">
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="kartu_identitas_pic_ket" id="kartu_identitas_pic_ket" cols="30" rows="10" class="form-control"><?=@$proposal->kartu_identitas_pic_ket?></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="check" value="1-kartu_identitas_pic"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-kartu_identitas_pic"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->sk_pic!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->sk_pic?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea  name="sk_pic_ket" id="sk_pic_ket" cols="30" rows="10" class="form-control"><?=@$proposal->sk_pic_ket?></textarea>
                                </td>
                                <td>

                                    <button class="btn btn-success" type="submit" name="check" value="1-sk_pic"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-sk_pic"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->surat_permohonan_kerjasama!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->surat_permohonan_kerjasama?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="surat_permohonan_kerjasama_ket" id="surat_permohonan_kerjasama_ket" cols="30" rows="10" class="form-control"><?=@$proposal->surat_permohonan_kerjasama_ket?></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="check" value="1-surat_permohonan_kerjasama"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-surat_permohonan_kerjasama"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->proposal_penawaran!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->proposal_penawaran?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="proposal_penawaran_ket" id="proposal_penawaran_ket" cols="30" rows="10" class="form-control"><?=@$proposal->proposal_penawaran_ket?></textarea>
                                </td>
                                <td>
                                <button class="btn btn-success" type="submit" name="check" value="1-proposal_penawaran"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-proposal_penawaran"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->siup_situ!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->siup_situ?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="siup_situ_ket" id="siup_situ_ket" cols="30" rows="10" class="form-control"><?=@$proposal->siup_situ_ket?></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="check" value="1-siup_situ"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-siup_situ"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->npwp!="") { ?>
                                        <img class="img-responsive" width="150" src="<?=base_url()?>berkas/proposal/<?=@$proposal->npwp?>">
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="npwp_ket" id="npwp_ket" cols="30" rows="10" class="form-control"><?=@$proposal->npwp_ket?></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="check" value="1-npwp"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-npwp"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->sertifikat_kemenkumham!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->sertifikat_kemenkumham?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="sertifikat_kemenkumham_ket" id="sertifikat_kemenkumham_ket" cols="30" rows="10" class="form-control"><?=@$proposal->sertifikat_kemenkumham_ket?></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="check" value="1-sertifikat_kemenkumham"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-sertifikat_kemenkumham"><i class="fa fa-remove"></i></button>
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
                                    <?php if(@$proposal->sertifikat_dewan_pers!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->sertifikat_dewan_pers?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="sertifikat_dewan_pers_ket" id="sertifikat_dewan_pers_ket" cols="30" rows="10" class="form-control"><?=@$proposal->sertifikat_dewan_pers_ket?></textarea>
                                </td>
                                <td>
                                <button class="btn btn-success" type="submit" name="check" value="1-sertifikat_dewan_pers"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-sertifikat_dewan_pers"><i class="fa fa-remove"></i></button>
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
                                <th>Sertifikat Dewan PERS (PDF *1MB)</th>
                                <td>
                                    <?php if(@$proposal->spt_tahun_terakhir!="") { ?>
                                        <a target="_blank" class="btn btn-warning" href="<?=base_url()?>berkas/proposal/<?=@$proposal->spt_tahun_terakhir?>">Lihat Berkas</a>
                                    <?php }?>
                                </td>
                                <td>
                                    <textarea name="spt_tahun_terakhir_ket" id="spt_tahun_terakhir_ket" cols="30" rows="10" class="form-control"><?=@$proposal->spt_tahun_terakhir_ket?></textarea>
                                </td>
                                <td>
                                <button class="btn btn-success" type="submit" name="check" value="1-spt_tahun_terakhir"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-danger"type="submit" name="check" value="9-spt_tahun_terakhir"><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
           
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Ceklis Persyaratan</h3>
                    <form action="<?=base_url()?>adminpengajuan/ceklis" method="post">
                    <?php if(!empty($ceklis)){ ?> 
                        <div class="table-responsive">
                        <input type="hidden" name="proposal_id" value="<?=$proposal->id?>">
                        <table class="table table-bordered">
                        <?php $nilai = 0; foreach($ceklis as $ck){ $nilai = $nilai + $ck['nilai']; ?>
                            <tr>
                                <th>
                                    <label><?=$ck['nama_kriteria']?></label>
                                    <input type="hidden" name="kriteria_id[]" value="<?=$ck['id_kriteria']?>">
                                </th>
                                <th>
                                    <select name="kriteriadetail_id[]" id="" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php foreach($ck['detail'] as $cd){ ?>
                                            <option <?=($cd['id']==$ck['pilih'])?"selected":""?> value="<?=$cd['id']."_".$cd['nilai']?>"><?=$cd['nama_nilai']?></option>
                                        <?php }?>
                                    </select>
                                    <?php if($ck['file']!=""){ ?>
                                    <a target="_blank" href="<?=base_url()?>berkas/proposal/<?=$ck['file']?>">Lihat Dokumen</a>
                                    <?php }else { echo "Tidak Upload Dokumen"; } ?>
                                </th>
                                <th>
                                    <?=$ck['nilai']?>
                                </th>
                            </tr>
                    <?php } ?> 
                    <tr class="bg-info">
                        <th colspan="2"></th>
                        <th><?=$nilai?></th>
                    </tr>
                    <tr class="bg-info">
                        <th colspan="2"></th>
                        <th>Rp. 6.000.000</th>
                    </tr>
                    </table>
                    </div>
                    <?php }?>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                    </form>
                </div>

                <div id="menu2" class="tab-pane fade">
                    Data Pengiriman Bukti Tayang
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Kolom</th>
                                <th>Value</th>
                            </tr>
                            <?php foreach ($bukti as $k =>$b){ ?>
                                <tr>
                                    <td><?=$k+1?></td>
                                    <td><?=$b->kolom?></td>
                                    <td>
                                        <?php if($b->tipe=='file'){ ?>
                                            <?=$b->value?>
                                        <?php }else { ?>
                                            <?=$b->value?>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>

    </div>

    <div class="box-footer">
            <form action="">
                <div class="form-group">
                    <label for="">Status Saat ini Adalah : <?=strtoupper($proposal->status)?></label>
                    <a onclick="return confirm('Terima DATA?')" href="<?=base_url()?>adminpengajuan/approve/<?=$proposal->id?>" class="btn btn-success pull-right"><span class="fa fa-check"></span> Terima</a>
                    <a onclick="return confirm('Tolak DATA?')" href="<?=base_url()?>adminpengajuan/decline/<?=$proposal->id?>"  class="btn btn-danger pull-right"><span class="fa fa-remove"></span> Tolak</a>
                </div>
            </form>
    </div>
</div>


</section>