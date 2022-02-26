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
            <a href="<?=base_url()?>adminordermedia" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="box-body">
        
    <div class="form-group">
        </div>
       
        <div class="table-responsive">
            <table class="table table-hover exporting-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kolom</th>
                        <th>Isi</th>
                        <th>Waktu Submit</th>
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
                       
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
