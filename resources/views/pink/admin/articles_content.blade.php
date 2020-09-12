@if($articles)
    <div id="content-page" class="content group">
        <div class="hentry group">
        <h2>Добавление Стати</h2>
            <div class="short-table white">
                <table style="width: 100%;">
                <thead>
                <tr>
                    <th class="align-left">ID</th>
                    <th>Зоголовок</th>
                    <th>Текст</th>
                    <th>Изоброжение</th>
                    <th>Категория</th>
                    <th>Псевдоним</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td class="align-left">{{ $article->id }}</td>
                        <td class="align-left"><a href="{{ route('article.edit',['articles'=>$article->alias]) }}">{{ $article->title }}</a></td>
                        <td class="align-left">{!! str_limit($article->text,200) !!}</td>
                        <td>
                            @if(isset($article->img->mini))
                                <img src="{{ asset(env("THEME")) }}/images/articles/{!! $article->img->mini !!} " alt="">
                            @endif
                        </td>
                        <td>{!! $article->category->title !!}</td>
                        <td>{!! $article->alias !!}</td>
                        <td>
                            <form action="{{ route('article.destroy',['articles'=>$article->alias]) }}" method="POST" class="form-horizontal">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-french-5" type="submit">Удалить</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('article.create') }}" class="btn btn-the-salmon-dance-3">Добавить материал</a>
        
    </div>
</div>

@endif