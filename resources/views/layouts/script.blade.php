

<!---------javascript links template-------->



<script src="{{asset('../app-assets/vendors/js/core/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/core/popper.min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/prism.min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/jquery.matchHeight-min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/screenfull.min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/pace/pace.min.js')}}"></script>
    <script src="{{asset('../app-assets/vendors/js/chartist.min.js')}}"></script>
    <script src="{{asset('../app-assets/js/app-sidebar.js')}}"></script>
    <script src="{{asset('../app-assets/js/notification-sidebar.js')}}"></script>
    <script src="{{asset('../app-assets/js/customizer.js')}}"></script>
    <script src="{{asset('../app-assets/js/dashboard-ecommerce.js')}}"></script>





<!----------javascript links datatables--------->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

 <!----------javascript links export buttons--------->


 <script
 type="text/javascript"
 charset="utf8"
 src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js">
 </script>
 <script
 type="text/javascript"
 charset="utf8"
 src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
 </script>
 <script
 type="text/javascript"
 charset="utf8"
 src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
 </script>
 <script
 type="text/javascript"
 charset="utf8"
 src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js">
 </script>
 <script
 type="text/javascript"
 charset="utf8"
 src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js
 ">
 </script>


 <script>
 $(document).ready(function() {
 $('#example').DataTable(
     {
     dom: 'Blfrtip',
     buttons: [
         'copy', 'csv', 'excel', 'pdf', 'print'
     ]
 }
 );
 } );
 </script>
