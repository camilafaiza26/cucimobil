
    @push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css" >
 
    @endpush

<div>
    <div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
        <div class="p-8 pt-4 mt-2 bg-white">      
            <p class="mb-4">Laporan Bulanan </p>
            <div class="">
                <table class="table w-auto -ml-3">
                    </thead>
                    <tbody>
                        <tr> 
                            <td>
                           
                          
                                <div class="mb-3 xl:w-96">
                                <label for="min">Pilih Bulan </label>
                                <select class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                  <option selected>Pilih Bulan</option>
                                  <option value="01">Januari</option>
                                  <option value="02">Februari</option>
                                  <option value="03">Maret</option>
                                  <option value="04">April</option>
                                  <option value="05">Mei</option>
                                  <option value="06">Juni</option>
                                  <option value="07">Juli</option>
                                  <option value="08">Agustus</option>
                                  <option value="09">September</option>
                                  <option value="10">Oktober</option>
                                  <option value="11">November</option>
                                  <option value="12">Desember</option>
                              </select>
                            </div>
                            
                            
                          
                            </td>
                        <td>
                            <a  href="" class=" text-blue-700 font-semibold  py-2 px-4 border border-blue-500 rounded-full transform transition duration-500 hover:scale-110">
                                 Cetak Laporan
                            </a>
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
                        @foreach($bulanans as $bulanans)
                        <tr>
                            <td>{{$bulanans->id}}</td>
                            <td>{{$bulanans->tanggal_pemesanan}}</td>
                            <td>{{$bulanans->nama_paket}}</td>
                            <td>{{$bulanans->harga_paket}}</td>
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
       

            $('#table_id').append('<caption style="caption-side: bottom">Laporan Bulanan Cuci Mobil</caption>');
            var table = $('#table_id').DataTable( {
                buttons: [ 'copy',
                {
                extend: 'csv',
                messageTop: 'Laporan bulanans',
                title: function() {
                  return 'Laporan bulanans Cuci Mobil' + $("#min").val() + ' - ' + $("#max").val();
                 }
                 },
                {
                extend: 'print',
                messageTop: 'Laporan bulanans',
                title: function() {
                  return 'Laporan bulanans Cuci Mobil' + $("#min").val() + ' - ' + $("#max").val();
                 }
                 },
                {
                extend: 'excel',
                messageTop: 'Laporan bulanans',
                title: function() {
                  return 'Laporan bulanan Cuci Mobil' + $("#min").val() + ' - ' + $("#max").val();
                 }
                 },
                 {
                extend: 'pdf',
                title: function() {
                  return 'Laporan bulanans Cuci Mobil' + $("#min").val() + ' - ' + $("#max").val();
                 }
                 }, 
                'colvis' ],
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

    </script>
    @endpush



    {{-- {{ $dataJadwalR->links() }} --}}

    <!-- End of Main Content -->
