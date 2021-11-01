<section class="content-header">
      <h1>
        Formula Penilaian
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Formula Penilaian</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk menambahkan Formula Penilaian.
        <div class="pull-right">
            <a href="<?=base_url()?>tipemedia" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>tipemedia/savepenilaian" enctype="multipart/form-data">
        <input type="hidden" name="tipemedia_id" value="<?=$id?>">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Total</label>
                    <input type="text" class="form-control" placeholder="NILAI TOTAL" readonly disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Simbol</label>
                    
                    <select name="simbol" required id="" class="form-control">
                        <option value="">Pilih</option>
                        <?php
                        foreach ($simbol as $key=>$value)
                        { ?>
                            <option value="<?=$value?>"><?=$value?></option>    
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Nilai</label>
                    <input type="text" required name="nilai" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Hasil</label>
                    <input type="text" required name="hasil" class="form-control">
                </div>
            </div>
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>

        <div class="table-responsive">
            <h4 class="text-danger">*Untuk Saat ini hanya support simbol <=</h4>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Simbol</th>
                <th>Nilai</th>
                <th>Hasil</th>
                <th></th>
            </tr>
            <?php foreach($form as $k => $v){ ?>
                <tr>
                    <td><?=$k+1?></td>
                    <td><?=$v->simbol?></td>
                    <td><?=$v->nilai?></td>
                    <td><?=$v->hasil?></td>
                    <td><a onclick="return confirm('Hapus Data?')"class="btn btn-danger btn-xs" href="<?=base_url()?>tipemedia/hapuspenilaian/<?=$v->id?>/<?=$id?>"><i class="fa fa-remove"></i></a></td>
                </tr>    
            <?php }?>
        </table>
        </div>

    </div>
</div>
</section>
