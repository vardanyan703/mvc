<div class="container">
    <div class="row">

        <form class="col-4 offset-lg-4" method="post" action="/public/home/signin">
            <?php if(Session::get('login_error')):
                Session::remove('login_error');
                ?>
                <div class="alert alert-danger mt-5" role="alert">
                    Логин или пароль неверны
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Войти в систему</button>
        </form>
    </div>
</div>