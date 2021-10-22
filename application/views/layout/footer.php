
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>Copyright &copy; 2019-<?=date('Y')?></strong>. All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bluef/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bluef/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/bluef/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?=base_url()?>assets/bluef/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/bluef/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bluef/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script async src="<?=base_url()?>assets/bluef/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script async src="<?=base_url()?>assets/bluef/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script async src="<?=base_url()?>assets/bluef/dist/js/demo.js"></script>

<script src="<?=base_url()?>assets/footable-bootstrap.latest/js/footable.js"></script>

<script src="<?php echo base_url().'assets/bluef/toast/jquery.toast.min.js'?>"></script>

<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
// production
  // var OneSignal = window.OneSignal || [];
  // OneSignal.push(function() {
  //   OneSignal.init({
  //     appId: "6f7d87c2-0b29-4418-be0d-4508876994e1",
  //   });
  // });
  // var OneSignal = window.OneSignal || [];
  // OneSignal.push(function() {
  //   OneSignal.init({
  //     appId: "abe96e29-11f2-4795-bf37-b4c73710f166",
  //   });
  // });

</script>


<script type="text/javascript">
$('.datepicker').datepicker({
      autoclose: true
});

$(document).ready( function () {
    // $('.table-hover').DataTable();
} );

// jQuery(function($){
// 		$('.table-hover').data({
// 			"paging": {
// 				"enabled": true,
//         "limit" : 3
// 			},
// 			"filtering": {
// 				"enabled": true
// 			},
// 		});
// 	});

</script>

  <?php
  if(@$script!='') {
    $this->load->view($script);
  }
  ?>


</body>
</html>
