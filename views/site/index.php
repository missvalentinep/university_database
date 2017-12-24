<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="jumbotron">

        <img width="30%" src=" <?php echo Url::to('@web/novgu.jpg');?>">
        <h1>Добро пожаловать!</h1>

        <p class="lead">Выберите, что вы хотите сделать</p>



    </div>




    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <p><a class="btn btn-lg btn-success" href="/published-work">Добавить печатную работу</a></p>
                <p>Добавить информацию о печатной работе - УМК, учебнике, публикации, диссертации и т.д.</p>
            </div>
            <div class="col-lg-4">
                <p><a class="btn btn-lg btn-success" href="/activity">Добавить орг. деятельность</a></p>
                <p>Добавить информацию о деятельности - руководству чем\кем-либо, оппонированию, организации мероприятий и т.д..</p>
            </div>

            <div class="col-lg-4">
                <p><a class="btn btn-lg btn-success" href="/employee/view?id=<?php echo Yii::$app->user->identity->username ?>">Посмотреть профиль</a></p>
                <p>Посмотреть информацию о своем профиле</p>
            </div>
        </div>

    </div>
</div>
