<section class="content-header">
      <h1>
        Sub Kategori
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Sub Kategori</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Data Sub Kategori.
        <div class="pull-right">
            <a href="<?=base_url()?>subkategori/form" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Sub Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; if(!empty($table)){ foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->kategoriNama?></td>
                    <td><?=$row->subkategoriNama?></td>
                    <td>
                        <button onclick="window.location.href='<?=base_url()?>subkategori/form/<?=$row->subkategoriId?>'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                        <button onclick="var w = confirm('Hapus Data Ini?'); if(w){ window.location.href='<?=base_url()?>subkategori/delete/<?=$row->subkategoriId?>'; }" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                    </td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
