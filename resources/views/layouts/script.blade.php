

<!---------javascript links template-------->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" 
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
    crossorigin="anonymous"></script>
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

<!--------------------------javascript select2------------------------>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
crossorigin="anonymous"
referrerpolicy="no-referrer">
</script>


<!--------------------------javascript select2------------------------>


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


<script>
    $(document).ready(function() {
      $('.salleSelect2').select2();
  });
</script>
@push('scripts')
<script>
     $('.salleSelect2').select2({
        multiple:false
     });
</script>

<script>
    $(document).ready(function() {
      $('.salleSelect2Edit').select2();
  });
</script>
@push('scripts')
<script>
     $('.salleSelect2Edit').select2({
        multiple:false
     });
</script>



 <script>
    $(document).ready(function() {
      $('.stateSelect2').select2();
  });
</script>
@push('scripts')
<script>
     $('.stateSelect2').select2({
        multiple:false
     });
</script>

<script>
    $(document).ready(function() {
      $('.stateSelect2Edit').select2();
  });
</script>
@push('scripts')
<script>
     $('.stateSelect2Edit').select2({
        multiple:false
     });
</script>



