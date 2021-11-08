<section class="content-header">
      <h1>
        Formulir Bukti Tayang
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Formulir Bukti Tayang</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk menambahkan Formulir Bukti Tayang.
        <div class="pull-right">
            <a href="<?=base_url()?>tipemedia" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>tipemedia/saveformulir" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Kolom</label>
                <input type="hidden" name="tipemedia_id" value="<?=$id?>">
                <input type="text" name="kolom" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tipe</label>
                <?php 
                    $arr_tipe = array(
                        'file',
                        'string',
                        'date',
                        'integer'
                    );
                ?>
                <select name="tipe" required id="" class="form-control">
                    <option value="">Pilih</option>
                    <?php foreach($arr_tipe as $at){ ?>
                        <option value="<?=$at?>"><?=ucfirst($at)?></option>    
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>

        <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Kolom</th>
                <th>Tipe</th>
            </tr>
            <?php foreach($form as $k => $v){ ?>
                <tr>
                    <td><?=$k+1?></td>
                    <td><?=$v->kolom?></td>
                    <td><?=$v->tipe?></td>
                    <td><a onclick="return confirm('Hapus Data?')"class="btn btn-danger btn-xs" href="<?=base_url()?>tipemedia/hapusform/<?=$v->id?>/<?=$id?>"><i class="fa fa-remove"></i> Hapus Data</a></td>
                </tr>    
            <?php }?>
        </table>
        </div>

    </div>
</div>
</section>
