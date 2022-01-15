<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('username')" role="button" href="#">
                    Username
                    @include('components.sort-icon', ['field' => 'username'])
                </a></th>
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                    Email
                    @include('components.sort-icon', ['field' => 'email'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nohp')" role="button" href="#">
                    No Hp
                    @include('components.sort-icon', ['field' => 'nohp'])
                </a></th>
                <th><a wire:click.prevent="sortBy('isDirectur')" role="button" href="#">
                    Status
                    @include('components.sort-icon', ['field' => 'isDirectur'])
                </a></th>
                <th><a wire:click.prevent="sortBy('alamat')" role="button" href="#">
                    Alamat
                      @include('components.sort-icon', ['field' => 'alamat'])
                  </a></th>
                <th class="forDirectur">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nohp}}</td>
                    @if ($user->isDirectur == 1)
                         <td>Direktur</td>   
                    @else 
                    <td>Pegawai</td>
                    @endif
                    <td>{{ $user->alamat}}</td>
                    <td class="whitespace-no-wrap row-action--icon forDirectur">
                        <a role="button" href="/user/edit/{{ $user->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
@push('js')
<script>
    document.getElementById("status_pembayaran").style.visibility="hidden";
  </script>
  @if (Auth::user()->isDirectur == 0)
  <script>
    document.getElementById("buttonAdd").style.visibility="hidden";
    document.getElementById("buttonExport").style.visibility="hidden";
    $('table tr').find('td:eq(7),th:eq(7)').remove();

  </script>
  
  @endif
@endpush

