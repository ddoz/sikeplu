<section class="content-header">
      <h1>
        Divisi
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Divisi</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Data Divisi.
        <div class="pull-right">
            <a href="<?=base_url()?>divisi/form" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)) { foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->divisiNama?></td>
                    <td>
                        <button onclick="window.location.href='<?=base_url()?>divisi/form/<?=$row->divisiId?>'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                        <button onclick="var w = confirm('Hapus Data Ini?'); if(w){ window.location.href='<?=base_url()?>divisi/delete/<?=$row->divisiId?>'; }" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
