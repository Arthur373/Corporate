
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Ползаватели</h2>
            <div class="short-table white">
                <table style="width: 100%;" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                @if($users)

                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ route('users.edit',['users'=>$user->id]) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->implode('name',', ') }}</td>
                            <td>
                                <form action="{{ route('users.destroy',['users'=>$user->id]) }}" method="POST" class="form-horizontal">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-french-5" type="submit">Удалить</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                @endif
                </table>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-the-salmon-dance-3">Добавить Ползавателя</a>

        </div>
    </div>

