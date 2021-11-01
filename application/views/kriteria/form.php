<section class="content-header">
      <h1>
        Form Kriteria
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Form Kriteria</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk menambahkan Kriteria.
        <div class="pull-right">
            <a href="<?=base_url()?>kriteria" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>kriteria/save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" required class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
