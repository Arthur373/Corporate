@foreach($items as $item)
                    <tr>
                        <td style="text-align: left">{{ $paddingLeft }}<a href="{{ route('menus.edit',['menus'=>$item->id]) }}">{{$item->title}}</a></td>
                        <td>{{ $item->url() }}</td>
                        <td>
                            <form action="{{ route('menus.destroy',['menus'=>$item->id]) }}" method="POST" class="form-horizontal">
                                    {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-french-5" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
    @if($item->hasChildren())
        @include(config('settings.theme').'.admin.custom-menu-items',array('items'=>$item->children(),'paddingLeft'=>$paddingLeft.'--'))
    @endif
@endforeach