<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        </div>
    </x-slot>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- General Report -->
            <!-- card -->
          
                <div class="card rounded-lg  transform transition duration-500 hover:scale-105 ">
                    <div class="card-body flex flex-col ">
                       <!-- top -->
                        <div class="flex flex-row justify-between items-center">
                            <img src="https://img.icons8.com/clouds/48/000000/car.png"/>
                            <span class="rounded-full text-white badge bg-blue-700 text-xs">
                                All Day 
                                {{-- <i class="fas fa-chevron-up"></i> --}}
                            </span>
                        </div>
                        <!-- end top -->
        
                        <!-- bottom -->
                        <div class="mt-2">
                            <h1 class="font-semibold text-indigo-700 text-4xl">{{$pemesananHariIni}}</h1>
                            <p>Jumlah Pemesanan</p>
                        </div>                
                        <!-- end bottom -->
            
                    </div>
                </div>
              
          
            <!-- end card -->
        
    
            <div class="card rounded-lg  transform transition duration-500 hover:scale-105">
                <div class="card-body flex flex-col">
                   <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <img src="https://img.icons8.com/external-justicon-flat-justicon/47/000000/external-hourglass-ecology-justicon-flat-justicon.png"/>
                        <span class="rounded-full text-white badge bg-blue-700 text-xs">
                            All Day 
                            {{-- <i class="fas fa-chevron-up"></i> --}}
                        </span>
                    </div>
                    <!-- end top -->
    
                    <!-- bottom -->
                    <div class="mt-2">
                        <h1 class="font-semibold text-indigo-700 text-4xl">{{$belumBayarNow}}</h1>
                        <p>Pemesanan Belum dibayar</p>
                    </div>                
                    <!-- end bottom -->
        
                </div>
            </div>
            <!-- end card -->
        
        
            <div class="card rounded-lg  transform transition duration-500 hover:scale-105 ">
                <div class="card-body flex flex-col">
                   <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <img src="https://img.icons8.com/color/48/000000/check-all.png"/>
                        <span class="rounded-full text-white badge bg-blue-700 text-xs">
                            All Day 
                            {{-- <i class="fas fa-chevron-up"></i> --}}
                        </span>
                    </div>
                    <!-- end top -->
    
                    <!-- bottom -->
                    <div class="mt-2">
                        <h1 class="font-semibold text-indigo-700 text-4xl">{{$sudahBayarNow}}</h1>
                        <p>Pemesanan sudah dibayar</p>
                    </div>                
                    <!-- end bottom -->
        
                </div>
            </div>
        
            
            <div class="card rounded-lg  transform transition duration-500 hover:scale-105 ">
                <div class="card-body flex flex-col ">
                   <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <img src="https://img.icons8.com/fluency/48/000000/money.png"/>
                        <span class="rounded-full text-white badge bg-blue-700 text-xs">
                            All Day 
                            {{-- <i class="fas fa-chevron-up"></i> --}}
                        </span>
                    </div>
                    <!-- end top -->
    
                    <!-- bottom -->
                    <div class="mt-2">
                        <h1 class="font-semibold text-indigo-700 text-4xl">Rp{{number_format($totalHariIni,0,',','.'); }}</h1>
                        <p>Total Pendapatan</p>
                    </div>                
                    <!-- end bottom -->
        
                </div>
            </div>
            <!-- card -->

            <!-- end card -->
     </div> 
    
     <div class="flex">
        <div class="w-1/2 mr-2" >
        <canvas id="pie-chart"></canvas>
        </div>
      
          <div class="w-1/2 " >
            <canvas id="myChart2" width="400"></canvas>
          </div>
        </div>

          <script>
            $(function(){
               
                //get the pie chart canvas
                var cData = JSON.parse(`<?php echo $data; ?>`);
     
                var ctx = $("#pie-chart");
           
                //pie chart data
                var data = {
                  labels: cData.label,
                  datasets: [
                    {
                      label: "Users Count",
                      data: cData.data,
                      backgroundColor: [
                        "#DEB887",
                        "#A9A9A9",
                        "#DC143C",
                        "#F4A460",
                        "#2E8B57",
                        "#1D7A46",
                        "#CDA776",
                      ],
                      borderColor: [
                        "#CDA776",
                        "#989898",
                        "#CB252B",
                        "#E39371",
                        "#1D7A46",
                        "#F4A460",
                        "#CDA776",
                      ],
                      borderWidth: [1, 1, 1, 1, 1,1,1]
                    }
                  ]
                };
           
                //options
                var options = {
                  responsive: true,
                  title: {
                    display: true,
                    position: "top",
                    text: "Data Pelanggan Baru Bedasarkan Hari",
                    fontSize: 18,
                    fontColor: "#111"
                  },
                  legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                      fontColor: "#333",
                      fontSize: 16
                    }
                  }
                };
           
                //create Pie Chart class object
                var chart1 = new Chart(ctx, {
                  type: "pie",
                  data: data,
                  options: options
                });
           
            });
          </script>
</x-app-layout>
