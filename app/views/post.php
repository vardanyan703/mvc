<div class="container">
    <div class="row">

        <form class="col-6 offset-lg-3" method="post" action="/public/post/__postStore">
            <?php if(Session::get('login_error')):
                Session::remove('login_error');
                ?>
                <div class="alert alert-danger mt-5" role="alert">
                    Логин или пароль неверны
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Имени пользователя</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">E-mail</label>
                <input type="email" class="form-control" name="email" id="exampleInputPassword1" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Текст задачи</label>
                <textarea class="form-control" name="text" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Добавлять</button>
        </form>
    </div>
</div>