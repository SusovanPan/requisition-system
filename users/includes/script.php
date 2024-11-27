 <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script scr="table2excel.js"></script>

    <script type="text/javascript" src="tableToExcel.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!--Sweet alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
    {
      ?> 
    <script>
      swal(
        {
          title:"<?php echo $_SESSION['status']; ?>",
          //text:"You Clicked the button",
          icon:"<?php echo $_SESSION['status_code']; ?>",
          button:"OK!",
        }
      );
    </script>
    <?php
    unset($_SESSION['status']);
    }