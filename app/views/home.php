<div class="container">

    <table class="table">
        <thead>

        <tr>
            <th scope="col"><a href="<?php $this->uelGenerate('name'); ?>">Имени пользователя</a></th>
            <th scope="col"><a href="<?php $this->uelGenerate('email'); ?>">E-mail</a></th>
            <th scope="col">Текста задачи</th>
            <th scope="col"><a href="<?php $this->uelGenerate('status'); ?>">Статус</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['posts'] as $item): ?>
        <tr <?php if($item['status'] == 1): echo 'style="background: silver"'; endif?>>
            <td><?= $item['name'] ?></td>
            <td><?= $item['email'] ?></td>
            <td><?= $item['text'] ?></td>
            <?php if(Session::get('loggin')): ?>
                <td><input type="checkbox" class="form-control check" data-id="<?=$item['id']?>" value="1" name="status" <?php  if($item['status'] == 1): echo 'checked'; endif?>></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$item['id']?>">
                        Редактировать
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?=$item['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="post" action="/public/post/__postEdit">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if(Session::get('login_error')):
                                            Session::remove('login_error');
                                            ?>
                                            <div class="alert alert-danger mt-5" role="alert">
                                                Логин или пароль неверны
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Имени пользователя</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$item['name'] ?>">
                                            <input type="hidden" class="form-control" name="id" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$item['id'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">E-mail</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputPassword1"  value="<?=$item['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Текст задачи</label>
                                            <textarea class="form-control" name="text" placeholder="Text"><?=$item['text'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Обновить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            <?php endif ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="...">
        <ul class="pagination pagination-sm">
            <?php

                if(isset($_GET['page'])){
                    $current = $_GET['page'];
                }elseif (!isset($_GET['page'])){
                    $current = 1;
                }
            ?>
            <?php for ($i = 1 ; $i <= $data['page_count'];$i++):?>
            <li class="page-item <?php if($current == $i):  echo 'active'; endif;?> ">
                <?php if(count($_GET) == 0): ?>
                    <a class="page-link" href="<?php echo $_SERVER['REQUEST_URI'] ?>?page=<?=$i?>"><?= $i ?> </a>
                <?php else:?>
                    <a class="page-link" href="<?php echo str_replace('page='.$_GET['page'],'page='.$i,$_SERVER['REQUEST_URI']) ?>"><?= $i ?> </a>
                <?php endif; ?>
            </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>