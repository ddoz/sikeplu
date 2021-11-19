<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<section class="content-header">
      <h1>
        CMS
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> CMS</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Content Management.
        <div class="pull-right">
            
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status')?></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
       
        <form action="<?=base_url()?>cms/save" method="post">
    
            <div class="form-group">
                <label for="">Tentang</label>
                <textarea name="tentang" required class="form-control summernote"><?=@$cms->tentang?></textarea>
            </div>

            <div class="form-group">
                <label for="">FAQ</label>
                <textarea name="faq" required class="form-control summernote"><?=@$cms->faq?></textarea>
            </div>

            <div class="form-group">
                <label for="">Bantuan</label>
                <textarea name="bantuan" required class="form-control summernote"><?=@$cms->bantuan?></textarea>
            </div>

            <div class="form-group">
                <label for="">Survey</label>
                <textarea name="survey" required class="form-control summernote"><?=@$cms->survey?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
            </div>

        </form>

        </div>
    </div>
</div>
</section>
