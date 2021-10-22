<section class="content-header">
      <h1>
        Favorit
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-star"></i> Favorit</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Data Favorit.
        <div class="pull-right">
            <a href="<?=base_url()?>favorit/form" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th colspan="2">User Persetujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)){ foreach($table as $key => $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->favoritJudul?></td>
                    <td colspan="2">
                        <?php foreach($row->detail as $dd) { ?>
                        
                            <h5>Persetujuan Level <?=$dd->favoritdetailUserLevel?> <?=$dd->divisiNama."-".$dd->userNamaLengkap?></h5>
                        
                        <?php }?>
                    </td>
                    <td>
                        <button onclick="window.location.href='<?=base_url()?>favorit/form/<?=$row->favoritId?>'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                        <button onclick="var w = confirm('Hapus Data Ini?'); if(w){ window.location.href='<?=base_url()?>favorit/delete/<?=$row->favoritId?>'; }" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
