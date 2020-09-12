<div id="content-page" class="content group">
    <div class="hentry group">

        <form action="{{ isset($menu->id) ? route('menus.update',['menus'=>$menu->id]) : route('menus.store') }}" method="POST" class="contact-form" enctype="multipart/form-data">
            @csrf
            <ul>
                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Зоголовок:</span>
                        <br>
                        <span class="sublabel">Зоголовок пункта</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" name="title"  class="form-control input-text" value="{{ isset($menu->title) ? $menu->title : old('title') }}" placeholder="Ввидите название страницы">
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Родительский пункт меню:</span>
                        <br>
                        <span class="sublabel">Родитель</span><br>
                    </label>
                    <div class="input-prepend">
                        {!! Form::select('parent',$menus,isset($menu->parent) ? $menu->parent : null) !!}
                    </div>
                </li>
            </ul>

                <h1>Тип меню:</h1>

                <div id="accordion">
                    <h3>{!! Form::radio('type','customLink',(isset($type) && $type == 'customLink') ? TRUE : FALSE,['checked']) !!}
                        <span class="label">Ползовательская ссылка:</span></h3>

                    <ul>
                        <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">Путь для ссылки:</span>
                                <br>
                                <span class="sublabel">Путь для ссылки</span><br>
                            </label>
                            <div class="input-prepend">
                                   {!! Form::text('custom_link',(isset($menu->path) && $type == 'customLink') ? $menu->path : old('path'),['placeholder'=>'Ввидите название страницы']) !!}
                            </div>
                        </li>
                        <div style="clear: both"></div>
                    </ul>

                    <h3>{!! Form::radio('type','blogLink',(isset($type) && $type == 'blogLink') ? TRUE : FALSE) !!}
                        <span class="label">Раздел блог:</span></h3>

                    <ul>
                        <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">Ссылка на категорию блога:</span>
                                <br>
                                <span class="sublabel">Ссылка на категорию блога</span><br>
                            </label>
                            <div class="input-prepend">
                                @if($categories)
                                    {!! Form::select('category_alias',$categories,(isset($option) && $option) ? $option : false) !!}
                                @endif
                            </div>
                        </li>

                        <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">Ссылка на метриал блога:</span>
                                <br>
                                <span class="sublabel">Ссылка на метриал блога</span><br>
                            </label>
                            <div class="input-prepend">
                                @if($articles)
                                {!! Form::select('article_alias',$articles,(isset($option) && $option) ? $option : 'Не используется') !!}
                                @endif
                            </div>
                        </li>
                    <div style="clear: both"></div>
                 </ul>

                    <h3>{!! Form::radio('type','portfolioLink',(isset($type) && $type=='portfolioLink') ? TRUE : FALSE) !!}
                        <span class="label">Раздел Портфолио:</span></h3>

                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Ссылка на запис портфолио:</span>
                            <br>
                            <span class="sublabel">Ссылка на запис портфолио</span><br>
                        </label>
                        <div class="input-prepend">
                            {!! Form::select('portfolio_alias',$portfolios,(isset($option) && $option) ? $option : false) !!}
                        </div>
                    </li>

                     <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">Портфолио:</span>
                                <br>
                                <span class="sublabel">Портфолио</span><br>
                            </label>
                            <div class="input-prepend">
                                {!! Form::select('filter_alias',$filters,(isset($option) && $option) ? $option : false) !!}
                            </div>
                     </li>
                </ul>

              </div>

            <br>

                @if(isset($menu->id))
                    <input type="hidden" name="_method" value="PUT">
                @endif
            <ul>
                <li class="submit-button">
                    <button class="btn btn-the-salmon-dance-3" type="submit">Сохранить</button>
                </li>
            </ul>

        </form>


    </div>
</div>

<script>
    jQuery(function($) {
        $("#accordion").accordion({
            activate:function (e, obj) {
                obj.newPanel.prev().find('input[type=radio]').attr('checked','checked');
            }
        });
       var active = 0;
        $("#accordion input[type=radio]").each(function (ind,it) {
            if($(this).prop('checked')){
                active = ind;
            }
        });
        $("#accordion").accordion('option','active',active)
    })
</script>


{{--                    Путь для ссылки:--}}