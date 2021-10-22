<section class="content-header">
      <h1>
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Pengguna</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Data Pengguna.
        <div class="pull-right">
            <a href="<?=base_url()?>pengguna/form" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Grup Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)){ foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->name?></td>
                    <td><?=$row->user_level?></td>
                    <td>
                        <button onclick="var w = confirm('Hapus Data Ini?'); if(w){ window.location.href='<?=base_url()?>pengguna/delete/<?=$row->id?>'; }" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                        <button title="Reset Password" onclick="var w = confirm('Reset Password?'); if(w){ window.location.href='<?=base_url()?>pengguna/resetpassword/<?=$row->id?>'; }"class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i></button>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
