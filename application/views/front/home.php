<?php $this->load->view('front/welcome_area'); ?>
<!-- ***** Pricing Plans Start ***** -->
<section class="section colored" id="pricing-plans">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Jadwal Pengajuan Proposal</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <?=date('d M Y H:i:s', strtotime(@$jadwal->waktu_mulai));?> Sampai Dengan <?=date('d M Y H:i:s', strtotime(@$jadwal->waktu_selesai));?>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            
        </div>
    </section>
    <!-- ***** Pricing Plans End ***** -->

    <!-- ***** Counter Parallax Start ***** -->
    <section class="counter">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom">
                            <strong><?=@$media?></strong>
                            <span>Media</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="count-item decoration-top">
                            <strong><?=@$kerjasama?></strong>
                            <span>Kerjasama</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="count-item">
                            <strong><?=@$bukti?></strong>
                            <span>Penayangan</span>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- ***** Counter Parallax End ***** -->   