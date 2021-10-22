<section class="content-header">
      <h1>
        Tipe Media
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Tipe Media</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Data Tipe Media.
        <div class="pull-right">
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
                    <td><?=$row->nama?></td>
                    <td>
                        <a href="<?=base_url()?>tipemedia/form/<?=$row->id?>" class="btn btn-warning btn-xs">Formulir Bukti Tayang</a>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
