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
        <div class="pull-right">
            <a href="<?=base_url()?>ordermedia" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        
    <div class="form-group">
        </div>
        <form action="<?=base_url()?>dataupload/save" method="post" enctype="multipart/form-data">
            <?php if(!empty($formula)) { ?>
                <input type="hidden" name="proposal_id" value="<?=$proposal_id?>">
                <input type="hidden" name="id_order" value="<?=$id_order?>">
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
                                    <label for=""><?=$f->kolom?><?=$arr_tipe[$f->tipe]=='file'?' (PDF 5MB)':''?></label>
                                    <input type="hidden" name="formula_id[]" value="<?=($f->id)?>">
                                    <input autocomplete="false" name="value<?=$f->id?>" type="<?=$arr_tipe[$f->tipe]?>" class="form-control <?=($f->tipe=='date')?"datepicker":""?>" required>
                                </div>
                            <?php }?>
                            <div class="form-group">
                                <div class="checkbox-inline">
                                <label><input type="checkbox" name="cheklist" required>Dengan ini SAYA menyatakan bahwa seluruh data yang di unggah diatas adalah BENAR dan bukan hasil REKAYASA serta memastikan link atau bukti tayang tidak akan pernah hilang atau rusak.</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Simpan</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </form>
        <div class="table-responsive">
            <table class="table table-hover exporting-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kolom</th>
                        <th>Isi</th>
                        <th>Waktu Submit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $key => $row){ $id = $row->id; ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$row->kolom?></td>
                        <td>
                            <?php 
                            if($row->tipe=='file') {
                                $val = $row->value;
                                echo "<a target='_blank' href='".base_url()."berkas/buktitayang/".$val."'>Lihat Dokumen</a>";
                            }else {
                                echo $row->value;
                            }
                            ?>
                        </td>
                        <td><?=date('Y-m-d H:i:s',strtotime($row->created_at));?></td>
                        <td>
                        <a onclick="return confirm('Hapus Data?')" href="<?=base_url()."dataupload/hapus/".$id.'/'.$row->proposal_id.'/'.$this->uri->segment(4)?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
