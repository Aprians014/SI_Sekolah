<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>assets/admin/js/demo/datatables-demo.js"></script>


<script>
    function deleteConfirm(url){
    	$('#btn-delete').attr('href', url);
    	$('#deleteModal').modal();
    }
    </script>

<script type="text/javascript">
    $(document).ready(function(){
      $('#data').DataTable();
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#kd_kelas').on('input',function(){
                
        var kd_kelas=$(this).val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('page/get_kd_kelas')?>",
            dataType : "JSON",
            data : {kd_kelas: kd_kelas},
            cache:false,
            success: function(data){
                $.each(data,function(kd_kelas, kelas){
                    $('[name="kelas"]').val(data.kelas);
                    
                });
            }
        });
        return false;
    });

  })

</script>

</body>
</html>