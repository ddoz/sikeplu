<section class="section colored" id="pricing-plans">
        <div class="container mt-4">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Daftar Media</h2>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>No</th>
                                <th>Nama Media</th>
                                <th>Tipe</th>
                                <th>Kontak Redaksi</th>
                                <th>Email Redaksi</th>
                            </tr>
                            <?php foreach($media as $key => $med){ ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$med->nama_media?></td>
                                <td><?=$med->nama?></td>
                                <td><?=$med->kontak_redaksi?></td>
                                <td><?=$med->email_redaksi?></td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br><br>