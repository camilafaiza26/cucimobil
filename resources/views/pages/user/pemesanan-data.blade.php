<style>
.clock {
    background: #396afc;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #2948ff, #396afc);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #2948ff, #396afc); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    display: flex;
    padding: 35px 0px 35px 0px;
    flex-direction: column;
    height: 100%;
}
.clock .time {
    font-size: 35px;
    margin: auto;
}
.clock .date {
    font-size: 15px;
    margin: auto;
}
    </style>
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Daftar Pemesanan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Daftar Pemesanan</a></div>
        </div>
    </x-slot>

    
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-5">
    <!-- General Report -->
        <!-- card -->
      
            <div class="card rounded-lg  transform transition duration-500 hover:scale-105 ">
                <div class="card-body flex flex-col ">
                   <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <img src="https://img.icons8.com/clouds/48/000000/car.png"/>
                        <span class="rounded-full text-white badge bg-blue-700 text-xs">
                            Hari Ini 
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
                        Hari Ini 
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
                        Hari Ini 
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
                        Hari Ini 
                        {{-- <i class="fas fa-chevron-up"></i> --}}
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-2">
                    <h1 class="font-semibold text-indigo-700 text-4xl">Rp{{number_format(340,2,',','.'); }}</h1>
                    <p>Total Pendapatan</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <!-- card -->
        <div class="card rounded-lg transform transition duration-500 hover:scale-105 ">
            <div class="card-body flex flex-col p-0 ">
                    <div class="clock ">
                        <span class="date text-white font-semibold" id="date"></span>
                        <span class="time text-white font-semibold" id="time"></span>
                    </div>  
                </div>                
                <!-- end bottom -->
    
            </div>
        <!-- end card -->
 </div>     


    <div>
        <livewire:table.main name="pemesanan" :model="$pemesanan" />
    </div>


</x-app-layout>
<script>
const displayTime = () =>  {
moment.locale("id");
$("#time").text(moment().format("LTS"));
$("#date").text(moment().format("LL"));

}
const updateTime = () =>{
displayTime();
setTimeout(updateTime,1000)
};

updateTime();
</script>