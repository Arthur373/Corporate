<div id="content-page" class="content group">
    <div class="hentry group">

        <h3 class="title_page">Привилегии</h3>

        <form action="{{ route('permissions.store') }}" method="POST">
          @csrf
            {{ csrf_field() }}

            <div class="short-table white">
                <table style="width: 100%;">

                    <thead>
                        <th>Привилегии</th>
                    @if(!$roles->isEmpty())
                        @foreach($roles as $item)
                            <th>{{ $item->name }}</th>
                        @endforeach
                    @endif
                    </thead>
                    <tbody>

                    @if(!$priv->isEmpty())
                        @foreach($priv as $val)
                        <tr>
                            <td>{{ $val->name }}</td>
                            @foreach($roles as $rol)
                                <td>
                                 @if($rol->hasPermission($val->name))
                                     <input type="checkbox" name="{{ $rol->id }}[]" value="{{ $val->id }}" checked>
                                 @else
                                     <input type="checkbox" name="{{ $rol->id }}[]" value="{{ $val->id }}">
                                 @endif
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    @endif

                    </tbody>

                </table>
            </div>

            <input type="submit" class="btn btn-the-salmon-dance-3" value="Обнавить">
            
        </form>
        
    </div>
</div>