<div id="content-page" class="content group">
    <div class="hentry group">

        <form action="{{ isset($user->id) ? route('users.update',['users'=>$user->id]) : route('users.store') }}" method="POST" class="contact-form" enctype="multipart/form-data">
            @csrf
            <ul>
                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">имя:</span>
                        <br>
                        <span class="sublabel">Имя пользователя</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" name="name"  class="form-control input-text" value="{{ isset($user->name) ? $user->name : old('name') }}" placeholder="Ввидите название пользователя">
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Email:</span>
                        <br>
                        <span class="sublabel">Email пользователя</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input type="email" name="email"  class="form-control input-text" value="{{ isset($user->email) ? $user->email : old('email') }}" placeholder="Ввидите email">
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Пороль:</span>
                        <br>
                        <span class="sublabel">Пороль</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input type="password" name="password" placeholder="Ввидите пороль">
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Категория:</span>
                        <br>
                        <span class="sublabel">Категория материала</span><br>
                    </label>
                    <div class="input-prepend">
                        {!! Form::select('role_id',$roles,isset($user) ? $user->roles()->first()->id : null) !!}
                    </div>
                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Повтор Поролья:</span>
                        <br>
                        <span class="sublabel">Повтор Поролья</span><br>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input type="password" name="password_confirmation" placeholder="Повторите пороль">
                    </div>
                </li>




                @if(isset($user->id))
                    <input type="hidden" name="_method" value="PUT">
                @endif

                <li class="submit-button">
                    <button class="btn btn-the-salmon-dance-3" type="submit">Сохранить</button>
                </li>

            </ul>
        </form>



    </div>
</div>
