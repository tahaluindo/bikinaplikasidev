<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Hp</th>
            <th>Level</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users->where('level', 'admin') as $user)
        {{-- user yang sedang login tidak perlu melihat datanya disini, dia harus melihatnya melalui profile --}}
        {{-- @php if($user->level == auth()->user()->level): continue; endif; @endphp --}}
        <tr data-id='{{ $user->id }}'>
            <td>
                @if(Str::length($user->foto) <= 3)
                <img class="img" src="{{ Avatar::create($user->nama)->toBase64() }}" width="50" height="50">
                @else
                <img class="img" src="{{ $user->foto }}" width="50" height="50">
                @endif
            </td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->no_hp }}</td>
            <td>{{ $user->level }}</td>
            <td>{{ $user->status }}</td>
            <td>
                <a class="label label-primary"
                    href="{{ url(route('user.show', ['user' => $user->id])) }}">Edit</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('user/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('user/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('user/create') }}";
    var columnOrders = [0, 4, 8];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
    const locationHrefNaikKelas = "{{ route('user.naik_kelas') }}";
</script>