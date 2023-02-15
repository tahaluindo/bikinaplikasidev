@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Email</th><th>Password</th><th>No Hp</th><th>Level</th><th>Status</th><th>Foto</th><th>Verified At</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $user->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->email }}</td><td>{{ $item->password }}</td><td>{{ $item->no_hp }}</td><td>{{ $item->level }}</td><td>{{ $item->status }}</td><td>{{ $item->foto }}</td><td>{{ $item->verified_at }}</td>
        </tr>
    </tbody>
</table>
@endsection