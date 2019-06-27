<!-- jQuery 2.2.3 -->
<!-- <script src="{{secure_asset('jQuery/dist/jquery.min.js')}}"></script> -->
<script
  src="https://code.jquery.com/jquery-2.2.3.min.js"
  integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
  crossorigin="anonymous"></script>
<!-- jQuery UI 1.11.4 -->

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>


<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('plugins/morris/morris.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- iCheck 1.0.1 -->
<!-- AdminLTE App -->


<script src="{{asset('dist/js/app.min.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('dist/js/demo.js')}}"></script>



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>

    $(".selections").select2({
        tags: true
    });

</script>


<script>
    $(document).ready(function() {

        $('#example').DataTable( {
            "searching": true,
            "lengthMenu": [[5,10,20,100, -1], [5,10,20,100, "Todo"]],
             responsive: true,
            dom: 'Bfrtip',

            buttons: [
                {extend:'pageLength'
                ,text:'Cantidad a mostrar'},


                {
                    extend: "copy",
                    text: 'Copiar a clipboard',
                    tittleAttr:'Copiar a clipboard',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "csv",
                    text: 'CSV',
                    tittleAttr:'CSV',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "excel",
                    text: '<i class="fa fa-fw fa-file-excel-o"></i>',
                    tittleAttr:'excel',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "pdf",
                    text: '<i class="fa fa-fw fa-file-pdf-o"></i>',
                    tittleAttr:'Pdf',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "print",
                    text: '<i class="fa fa-fw fa-print"></i>',
                    tittleAttr:'Print',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                'colvis'
            ],
            "oLanguage": {
                "sLoadingRecords"  : "Cargando...",
                  "sSearch"     : "Buscar:",
                "sZeroRecords": "No se encontraron resultados",
                "sProcessing":     "Procesando...",
                     "sLengthMenu":     "Mostrar MENU registros",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del START al END de un total de TOTAL registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de MAX registros)",
                "sInfoPostFix":    "",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }   ,
            },

        } );
        // Setup - add a text input to each footer cell
        /*        $('#example tfoot th').each( function () {
                    var title = $(this).text();
                    if(title!=''){
                        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

                    }
                } );

        // DataTable
        var table = $('#example').DataTable();

        // Apply the search
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );*/
        $('#exampleTransferencia').DataTable( {
            "searching": true,
            "lengthMenu": [[5,10,20,100, -1], [5,10,20,100, "Todo"]],
             responsive: true,
            dom: 'Bfrtip',

            buttons: [
                {extend:'pageLength'
                    ,text:'Cantidad a mostrar'},


                {
                    extend: "copy",
                    text: 'Copiar a clipboard',
                    tittleAttr:'Copiar a clipboard',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "csv",
                    text: 'CSV',
                    tittleAttr:'CSV',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "excel",
                    text: '<i class="fa fa-fw fa-file-excel-o"></i>',
                    tittleAttr:'excel',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "pdf",
                    text: '<i class="fa fa-fw fa-file-pdf-o"></i>',
                    tittleAttr:'Pdf',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                {
                    extend: "print",
                    text: '<i class="fa fa-fw fa-print"></i>',
                    tittleAttr:'Print',
                    exportOptions:{
                        columns : ':visible'
                    }

                },
                'colvis'
            ],
            "oLanguage": {
                "sLoadingRecords"  : "Cargando...",
                "sSearch"     : "Buscar:",
                "sZeroRecords": "No se encontraron resultados",
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar MENU registros",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del START al END de un total de TOTAL registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de MAX registros)",
                "sInfoPostFix":    "",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }   ,
            },

        } );



        $('#example1').DataTable( {
            "searching": true,
            "lengthMenu": [[5,10,20,100, -1], [5,10,20,100, "Todo"]],
             responsive: true,
            dom: 'Bfrtip',

            buttons: [
                {extend:'pageLength'
                    ,text:'Cantidad a mostrar'},
               
                'colvis'
            ],
            

        } );
        $('#example2').DataTable( {
            "searching": true,
            "lengthMenu": [[5,10,20,100, -1], [5,10,20,100, "Todo"]],
             responsive: true,
            dom: 'Bfrtip',

            buttons: [
                {extend:'pageLength'
                    ,text:'Cantidad a mostrar'},
               
                'colvis'
            ],
            order:[[0,"desc"]],
            

        } );
        // Setup - add a text input to each footer cell
        /*        $('#example tfoot th').each( function () {
                    var title = $(this).text();
                    if(title!=''){
                        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

                    }
                } );

        // DataTable
        var table = $('#example').DataTable();

        // Apply the search
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );*/
    } );



</script>


