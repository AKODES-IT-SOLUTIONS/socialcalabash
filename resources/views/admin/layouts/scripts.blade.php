   <!-- JS ============================================ -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


<script>
    $(document).ready(function() {
        $('.data-table-default').DataTable({
            responsive: true,
            language: {
                paginate: {
                    previous: '',
                    next: ''
                }
            }
        });
    });
</script>



<!-- Global Vendor, plugins & Activation JS -->
<script src="{{asset('admin/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/bootstrap.min.js')}}"></script>
<!--Plugins JS-->
<script src="{{asset('admin/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/tippy4.min.js.js')}}"></script>
<!--Main JS-->
<script src="{{asset('admin/js/main.js')}}"></script>

<!-- Plugins & Activation JS For Only This Page -->

<!--Moment-->
<script src="{{asset('admin/js/plugins/moment/moment.min.js')}}"></script>

<!--Daterange Picker-->
<script src="{{asset('admin/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('admin/js/plugins/daterangepicker/daterangepicker.active.js')}}"></script>

<!--Echarts-->
<script src="{{asset('admin/js/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/chartjs/chartjs.active.js')}}"></script>

<!--VMap-->
<script src="{{asset('admin/js/plugins/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/vmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('admin/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('admin/js/plugins/vmap/vmap.active.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#my_table').DataTable();
    });
</script>
