
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Keranjang</h1>
        </div>
    </div>

    @include('admin-lte/flash')

    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="tanggal_pinjam">Tanggal Pembelian</label>
            <input wire:model="tanggal_pinjam" type="date" class="form-control" id="tanggal_pinjam">
            @error('tanggal_pinjam') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-2">
            @if ($keranjang->tanggal_pinjam)
                <strong>Tanggal Pembelian: {{$keranjang->tanggal_pinjam}}</strong>
            @else
                <button wire:click="pinjam({{$keranjang->id}})" class="btn btn-sm btn-success">Beli</button>
            @endif
            <strong class="float-right">Kode Pembelian: {{$keranjang->kode_pinjam}}</strong>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Penjual</th>
                        @if (!$keranjang->tanggal_pinjam)
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keranjang->detail_peminjaman as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->buku->judul}}</td>
                            <td>{{$item->buku->penulis}}</td>
                            @if (!$keranjang->tanggal_pinjam)
                                <td>
                                    <button wire:click="hapus({{$keranjang->id}}, {{$item->id}})" class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (!$keranjang->tanggal_pinjam)
                <button wire:click="hapusMasal" class="btn btn-sm btn-danger">Hapus Masal</button>
            @endif        
        </div>
    </div>
</div>
