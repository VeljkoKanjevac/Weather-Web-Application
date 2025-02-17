@extends("admin.layout")

@section("content")

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CREATED AT</th>
            <th scope="col">STATUS</th>
            <th scope="col">ACTIONS</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <a href="{{route('user.delete', ['user' => $user->id])}}">Delete</a>
                    @if($user->status === 'active')
                        <a href="{{route('user.block', ['user' => $user->id])}}">Block</a>
                    @else
                        <a href="{{route('user.activate', ['user' => $user->id])}}">Activate</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
