<section class="content-header">
      <h1>
        Kriteria Penilaian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Kriteria Penilaian</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Kriteria Penilaian Tipe Media <?=$tipemedia->nama?>.
        <div class="pull-right">
            <a href="<?=base_url()?>tipemedia" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
        
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>

     
        
     <div class="col-md-6">

        <form method="POST" action="<?=base_url()?>tipemedia/savedetail" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Kriteria</label>
                <input type="hidden" name="tipemedia_id" value="<?=$tipemedia->id?>">
                <select name="kriteria_id" required class="form-control">
                    <option value="">Pilih</option>
                    <?php foreach ($kriteria as $tp){ ?>
                    <option value="<?=$tp->id?>"><?=$tp->nama_kriteria?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
        </div>

    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Nama Penilaian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)) { foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->nama_kriteria?></td>
                    <td>
                        <a onclick="return confirm('Hapus Data?')" href="<?=base_url()?>tipemedia/hapusdetail/<?=$row->id?>/<?=$tipemedia->id?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>

