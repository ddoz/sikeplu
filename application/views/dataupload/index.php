<section class="content-header">
      <h1>
        Pengiriman Bukti Tayang
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Data</li>
        <li class="active"><i class="fa fa-list"></i> Pengiriman Bukti Tayang</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Bukti Tayang.
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        
    <div class="form-group">
        <button class="btn btn-primary btnFilter"><i class="fa fa-plus"></i> Tambah Data</button>
        </div>
        <form action="<?=base_url()?>dataupload/save" method="post" style="display:none" id="formFilter" enctype="multipart/form-data">
                <input type="hidden" name="proposal_id" value="<?=$proposal_id?>">
                <input type="hidden" id="statusFilter" value="0">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-lg-4">
                        <div class="box box-warning">
                        <div class="box-body">
                            <?php foreach($formula as $f){ 
                                $arr_tipe = array(
                                    'file' => 'file',
                                    'string' => 'text',
                                    'date' => 'text',
                                    'integer' => 'number'
                                );
                                ?>
                                <div class="form-group">
                                    <label for=""><?=$f->kolom?></label>
                                    <input type="hidden" name="formula_id[]" value="<?=($f->id)?>">
                                    <input name="value[]" type="<?=$arr_tipe[$f->tipe]?>" class="form-control <?=($f->tipe=='date')?"datepicker":""?>" required>
                                </div>
                            <?php }?>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-default form-control">Simpan</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kolom</th>
                        <th>Value</th>
                        <th>Created At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
