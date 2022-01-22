
    @push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css" >
 
    @endpush

<div>
    <div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
        <div class="p-8 pt-4 mt-2 bg-white">      
            <p class="mb-4">Laporan Harian Tanggal : </p>
            <div class="">
                <table class="table w-auto -ml-3">
                    </thead>
                    <tbody>
                        <tr> 
                            <td>
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="min">Tanggal Awal : </label>
                                <input type="text" class="form-control" id="min" name="min" >
                            </div>
                            <div class=" ml-2 col-xs-2">
                                <label for="max">Tanggal Akhir : </label>
                                <input type="text" class="form-control" id="max" name="max" >
                            </div>
                          </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered table-striped text-sm text-gray-600"id="table_id">
                   
                    <thead>
                        <tr>
                            <th>Nomor Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Paket</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($harians as $harian)
                        <tr>
                            <td>{{$harian->id}}</td>
                            <td>{{$harian->tanggal_pemesanan}}</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
 
           
        </div>
    </div>
</div> 


    @push('js')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js" >  </script>
    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js" >  </script>

 
    <script>

$(document).ready(function() {
            var table = $('#table_id').DataTable( {
                buttons: [ 'copy','csv','print', 'excel', 'pdf', 'colvis' ],
                dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ]
            } );
        
            table.buttons().container()
                .appendTo( '#table_wrapper .col-md-5:eq(0)' );
        } );

       var minDate, maxDate;

 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[1] );
         console.log(date)
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
     // DataTables initialisation
     var table = $('#table_id').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });

    </script>
    @endpush



    {{-- {{ $dataJadwalR->links() }} --}}

    <!-- End of Main Content -->
