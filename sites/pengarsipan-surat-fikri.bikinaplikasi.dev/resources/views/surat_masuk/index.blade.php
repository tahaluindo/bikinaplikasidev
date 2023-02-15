@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Sifat Surat</th>
            <th>User Unit Kerja</th>
            <th>Waktu Masuk</th>
            <th>Nomor</th>
            <th>Pengirim</th>
            <th>Perihal</th>
            <th>Isi Ringkas</th>
            <th>Lampiran</th>

            @if(in_array(auth()->user()->level, ['Admin', 'Unit Kerja', 'Ketua']))
            <th class="text-center">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($surat_masuk as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->sifat_surat }}</td>
            <td>{{ $item->user_unit_kerja->name }}</td>
            <td>{{ $item->waktu_masuk }}</td>
            <td>{{ $item->nomor }}</td>
            <td>{{ $item->pengirim }}</td>
            <td>{{ $item->perihal }}</td>
            <td>{{ $item->isi_ringkas }}</td>
            <td>
                <a href="{{ url(Storage::url($item->lampiran)) }}" download='lampiran {{ $item->perihal }}'>
                    Lihat
                </a>
                
            </td>

            @if(in_array(auth()->user()->level, ['Admin', 'Unit Kerja', 'Ketua']))
            <td class="text-center">
                @if((!$item->disposisi) && in_array(auth()->user()->level, ['Unit Kerja', 'Ketua']))
                @if(auth()->user()->level == 'Ketua')
                    <a class="label label-info" href="{{ url("/disposisi/create?surat_masuk_id=$item->id") }}">
                        <i for="" class="fa fa-share"></i>
                        
                        Disposisikan
                    </a>
                        @else
                        @endif
                @elseif($item->disposisi && auth()->user()->level == 'Ketua')
                <a class="label label-success" href="{{ url("/disposisi/{$item->disposisi->id}") }}">
                    <i for="" class="fa fa-share"></i>
                    {{ $item->disposisi->status }}
                </a>
                @elseif(auth()->user()->level == 'Unit Kerja' && isset($item->disposisi))
                    @if($item->disposisi->status == 'Belum Ditindak Lanjuti')
                    <a class="label label-success" href="{{ url("/disposisi/{$item->disposisi->id}/status?status=Tindak Lanjuti") }}" onclick='return confirm("Yakin akan menindak lanjuti?");'>
                        <i for="" class="fa fa-share"></i>
                        Tindak Lanjuti
                    </a>
                    @endif
                @elseif(isset($item->disposisi))
                    @if($item->disposisi->status == 'Belum Ditindak Lanjuti')
                        <a class="label label-success" href="#">
                            <i for="" class="fa fa-share"></i>
                            {{ $item->disposisi->status }}
                        </a>
                    @endif
                @endif
                
                @if(!in_array(auth()->user()->level, ['Ketua']))
                    @if(in_array(auth()->user()->level, ['Admin']))
                    <a class="label label-primary" href="{{ url('/surat_masuk/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/surat_masuk' . '/' . $item->id) }}" method='post' style='display: inline;'
                        onsubmit="return confirm('Yakin akan menghapus data ini?')">
                        @method('DELETE')
                        @csrf
                        <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                            style='cursor: pointer;'>Hapus</label>
                        <button type="submit" id='btnSubmit-{{ $item->id }}' style="display: none;"></button>
                    </form>
                    @endif
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('surat_masuk/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('surat_masuk/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('surat_masuk/create') }}";
    
    var urlSearch = "{{ url('surat_masuk') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";

@if(!in_array(auth()->user()->level, ['Ketua']))
    @if(in_array(auth()->user()->level, ['Admin']) || auth()->user()->unit_kerja->sub_bagian->id == 3)
    var tampilkan_buttons = true;
    var button_manual = true;
    @endif
    @endif

    var columnOrders = [{{ $surat_masuk_count }}];
</script>
@endsection