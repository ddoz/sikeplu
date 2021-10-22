<section class="content-header">
      <h1>
        Data Upload
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-list"></i> Data Upload</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Data Upload.
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
    <div class="form-group">
        <button class="btn btn-primary btnFilter"><i class="fa fa-filter"></i> Filter Data</button>
        <button onclick="location.href='<?=base_url()?>uploadlist'" class="btn btn-warning"><i class="fa fa-refresh"></i> Reload Data</button>
        </div>
        <form action="<?=base_url()?>uploadlist/filter" method="get" style="display:none" id="formFilter">
                <input type="hidden" name="" id="statusFilter" value="<?=($this->input->get('dariTanggal')!==null)?'1':'0';?>">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-lg-4">
                        <div class="box box-warning">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Dari Tanggal</label>
                                <input type="text" name="dariTanggal" value="<?=($this->input->get('dariTanggal')!==null)?$this->input->get('dariTanggal'):'';?>" placeholder="Dari Tanggal" class="form-control datepicker">
                            </div>
                            <div class="form-group">
                                <label for="">Sampai Tanggal</label>
                                <input type="text" name="sampaiTanggal" value="<?=($this->input->get('sampaiTanggal')!==null)?$this->input->get('sampaiTanggal'):'';?>" placeholder="Sampai Tanggal" class="form-control datepicker">
                            </div>
                            <div class="form-group">
                                <label for="">Sub Kategori</label>
                                <select name="subKategori" id="" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php if(!empty($kategori)){foreach($kategori as $kat){ ?>
                                    <option value="<?=$kat->subkategoriId?>" <?php if(@$_GET['subKategori']!==null && @$_GET['subKategori']==$kat->subkategoriId){ echo 'selected'; } ?>><?=$kat->subkategoriNama?></option>
                                    <?php }}?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tujuan</label>
                                <select name="tujuan" id="" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Arsip" <?php if(@$_GET['tujuan']!==null && @$_GET['tujuan']=='Arsip'){ echo 'selected'; } ?>>Arsip</option>
                                    <option value="Persetujuan" <?php if(@$_GET['tujuan']!==null && @$_GET['tujuan']=='Persetujuan'){ echo 'selected'; } ?>>Persetujuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default form-control">Filter</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        </form>
    <div class="table-responsive">
        <table class="table table-hover" data-paging-limit="3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengguna</th>
                    <th>Divisi</th>
                    <th data-type="date" data-format-string="Do MMMM YYYY">Tanggal</th>
                    <th>Kategori</th>
                    <th>Tujuan</th>
                    <th>Deskripsi</th>
                    <th>Host Komputer</th>
                    <th>IP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; if(!empty($table)){ foreach($table as $row){ ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row->userNamaLengkap?></td>
                    <td><?=$row->divisiNama?></td>
                    <td><?=$row->plmasterTanggal?></td>
                    <td><?=$row->subkategoriNama?></td>
                    <td><?=$row->plmasterTujuan?></td>
                    <td><?=$row->plmasterDeskripsi?></td>
                    <td><?=$row->plmasterHost?></td>
                    <td><?=$row->plmasterIP?></td>
                    <td>
                        <button onclick="if(confirm('Hapus data ini? Data tidak akan bisa dikembalikan!'))window.location.href='<?=base_url()?>uploadlist/delete/<?=$row->plmasterId?>'" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle="tooltip"><i class="fa fa-remove"></i></button>
                        <button onclick="window.location.href='<?=base_url()?>uploadlist/detail/<?=$row->plmasterId?>'" class="btn btn-info btn-xs" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-eye"></i></button>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
