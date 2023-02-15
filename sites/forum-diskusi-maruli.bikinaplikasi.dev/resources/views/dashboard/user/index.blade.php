@extends('dashboard.layout.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto Profile</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ url($user->foto_profile ?? "img/anonymous.png") }}" width="150"/>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                        <a href="{{ url("dashboard/user/$user->id") }}/banned" class="badge bg-warning"
                           style="text-decoration: none" onclick="return confirm('Yakin akan banned user ini?');">
                            <span data-feather="slash"></span>
                        </a>

                        <form action="{{ url("dashboard/users/$user->id") }}" method="user" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure delete this user?')"><span
                                    data-feather="x"></span></button>
                        </form>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
