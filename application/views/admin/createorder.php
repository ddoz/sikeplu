<section class="content-header">
      <h1>
        Form Order Media
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Form Order Media</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk menambahkan Order Media.
        <div class="pull-right">
            <a href="<?=base_url()?>adminordermedia" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                 <th>Nama Media</th>
                <th>Tipe Media</th>
                <th>UKW</th>
                <th>Jumlah Order</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($media as $m) { ?>
                    <tr class="rowclick">
                        <td><?=$m->nama_media?></td>
                        <td><?=$m->tipe_media?></td>
                        <td><?=($m->nama_penilaian=="")?"Belum Mengisi/Tidak Ada":$m->nama_penilaian?></td>
                        <td><?=getJumlahOrder($m->id)?></td>
                        <td>
                            <button class="btn btn-primary modalpilih" data-id="<?=$m->id?>" data-media="<?=$m->nama_media?>">Pilih</button>
                        </td>
                    </tr>
                    <?php }?>
        <tfoot>
            <tr>
                <th>Nama Media</th>
                <th>Tipe Media</th>
                <th>UKW</th>
                <th>Jumlah Order</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
       
        
           
    </div>
</div>
</section>



<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Order Media</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?=base_url()?>adminordermedia/save" enctype="multipart/form-data">
            <input type="hidden" name="id_media" required id="id_media">
            <div class="form-group">
                <label for="">Media</label>
                <input type="text" id="nama_media" readonly disabled class="form-control">
            </div>
            <div class="form-group">
                <label for="">Keterangan Order</label>
                <textarea name="keterangan_order" required class="form-control"></textarea>
            </div>
            <div class="fowm-group">
                <label for="">Surat Order (1MB PDF)</label>
                <input type="file" name="surat_order" required class="form-control">
            </div>
            <div class="form-group">
                <br>
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>

  </div>
</div>
