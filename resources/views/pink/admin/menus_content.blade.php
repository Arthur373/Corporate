<div id="content-page" class="content group">
    <div class="hentry group">
        <h3 class="title_page">Ползователи</h3>

             <div class="short-table white">
                <table style="width: 100%;" cellpadding="0" cellspacing="0">

                    <thead>
                      <th>Name</th>
                      <th>Link</th>
                      <th>Удалить</th>
                    </thead>
                    @if($menus)
                        @include(config('settings.theme').'.admin.custom-menu-items',array('items'=>$menus->roots(),'paddingLeft'=>''))
                    @endif
                </table>
             </div>
        <a href="{{ route('menus.create') }}" class="btn btn-the-salmon-dance-3">Дабавить пункт</a>
    </div>
</div>