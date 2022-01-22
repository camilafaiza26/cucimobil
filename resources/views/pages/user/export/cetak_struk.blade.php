<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>

  </header>
    <main>
      <table>
      <tr>
        <td >No. Pemesanan</td>
        <td >:  {{$pemesanan->id}}</td>
        
      </tr>
      <tr>
        <td >Pelanggan</td>
        <td >:  {{$pemesanan->nama}}</td>
      </tr>
      <tr>
        <td >Tanggal Pemesanan</td>
        <td >:  {{$pemesanan->tanggal_pemesanan}}</td>
      </tr>
      <tr>
        <td >Merek/Plat Mobil</td>
        <td >:  {{$pemesanan->nama_merek}} / {{{$pemesanan->plat}}}</td>
      </tr>
      <tr>
        <td>Kasir</td>
        <td>:  {{$pemesanan->name}}</td>
        
      </tr>
    
</table>


      <table >
        <thead >
          <tr>
            <th >
              Nama Layanan
            </th>
            <th >
                Jenis
            </th>
            <th>
              Harga
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach($layanans as $layanan)
          <tr>
            <td>
                {{$layanan->nama_layanan}}
            </td>
            <td >
              
                {{$layanan->nama_jenis}}
             
            </td>
            <td>
                Rp{{ number_format($layanan->harga,0,',','.') }}
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
               Total
            </td>
            <td >
              {{$totalAwalLayanan}}
            </td>
            <td >
                Diskon({{$totals->diskon}} %) Rp{{ number_format($totals->harga_paket,0,',','.') }}
            </td>
          </tr>

    
        </tbody>
      </table>



    </main>
</body>
                      