<h1>Listagem dos usuários</h1>

<ul>
    @foreach ($users as $user)
    <li>
        {{ $user->name }} - 
        {{ $user->email }}
        | <a href="{{route('users.show', $user->id)}}">Details</a>
    </li>
    @endforeach
</ul>