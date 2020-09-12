<div id="content-page" class="content group">
    <div class="hentry group">

        <form action="{{ isset($article->id) ? route('article.update',['article'=>$article->alias]) : route('article.store') }}" method="POST" class="contact-form" enctype="multipart/form-data">
            @csrf
            <ul>
                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Название:</span>
                        <br>
                        <span class="sublabel">Зоголовок матреиала</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" name="title"  class="form-control input-text" value="{{ isset($article->title) ? $article->title : old('title') }}" placeholder="Ввидите название страницы">
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Ключевие слова:</span>
                        <br>
                        <span class="sublabel">Зоголовок материала</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" name="keywords"  class="form-control input-text" value="{{ isset($article->keywords) ? $article->keywords : old('keywords') }}" placeholder="Ввидите ключевие слова">
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Мета описание:</span>
                        <br>
                        <span class="sublabel">Зоголовок материала</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" name="meta_desc"  class="form-control input-text" value="{{ isset($article->meta_desc) ? $article->meta_desc : old('meta_desc') }}" placeholder="Ввидите ключевие слова">
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Псевдоним:</span>
                        <br>
                        <span class="sublabel">Ввидите псевдоним</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" name="alias"  class="form-control input-text" value="{{ isset($article->alias) ? $article->alias : old('alias') }}" placeholder="Ввидите Псевдоним">
                    </div>
                </li>

                <li class="textarea-field">
                    <label for="message-contact-us">
                        <span class="label">Краткое описане:</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <textarea name="desc"  class="form-control input-text"  id="editor">{{ isset($article->desc) ? $article->desc : old('desc') }}</textarea>
                    </div>
                    <div class="msg-error"></div>
                </li>

                <li class="textarea-field">
                    <label for="message-contact-us">
                        <span class="label">Oписание:</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <textarea name="text"  class="form-control input-text" id="editor2">{{ isset($article->text) ? $article->text : old('text') }}</textarea>
                    </div>
                    <div class="msg-error"></div>
                </li>

                @if(isset($article->img->path))
                    <li class="textarea-field">
                        <label for="message-contact-us">
                            <span class="label">Изображение материала:</span>
                        </label>
                        <img src="{!! asset(env("THEME")) !!}/images/articles/{{ $article->img->max }}" alt="" style="width: 400px;">
                        <input type="hidden"  class="form-control input-text" name="old_image" value="{!! $article->img->path !!}">

                    </li>

                @endif

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Изображение:</span>
                        <br>
                        <span class="sublabel">Изображение материала</span><br>
                    </label>
                    <div class="input-prepend">
{{--                        <input type="file"  class="form-control input-text" name="image" class="filestyle" data-buttonText="Виберите изображение" data-buttonName="btn-primary" data-placeholder="Файла нет">--}}
                        {!! Form::file('image',['class'=>"form-control input-text",'name'=>"image",'class'=>"filestyle",'data-buttonText'=>"Виберите изображение",'data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Категория:</span>
                        <br>
                        <span class="sublabel">Категория материала</span><br>
                    </label>
                    <div class="input-prepend">
{{--                        <select name="category_id">--}}
{{--                            @foreach($categories as $category)--}}
{{--                            <option value="{!!  isset($article->category_id) ? $article->category_id : ''  !!}"> $categories </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                        {!! Form::select('category_id',$categories,isset($article->category_id) ? $article->category_id : '') !!}
                    </div>
                </li>

                @if(isset($article->id))
                    <input type="hidden" name="_method" value="PUT">
                @endif

                <li class="submit-button">
                    <button class="btn btn-the-salmon-dance-3" type="submit">Сохранить</button>
                </li>

            </ul>

        </form>

        <script>
            CKEDITOR.replace('editor');
            CKEDITOR.replace('editor2');
        </script>


    </div>
</div>

{{--{{ $categories }}--}}
{{--{{ $category->title }}--}}
{{--value="{!!  isset($article->category_id) ? $article->category_id : '' !!}"--}}