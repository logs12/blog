<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Обратные заявки', 'icon' => 'fa fa-user fa-lg', 'url' => ['/callback/callback']],
                    ['label' => 'Отзывы', 'icon' => 'fa fa-mobile fa-lg', 'url' => ['/reviews/reviews']],
                    ['label' => 'Переводы', 'icon' => 'fa fa-mobile fa-lg', 'url' => ['/i18n/languages']],
                    [
                        'label' => 'Служебные утилиты',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                        ],
                    ],
                    [
                        'label' => 'Настройки',
                        'icon' => 'fa fa-cog',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Пользователи, роли и разрешения',
                                'icon' => 'fa fa-user fa-lg',
                                'url' => ['/main/options'],
                                'items' => [
                                    ['label' => 'Пользователи', 'icon' => 'fa fa-circle-o', 'url' => '/rbac/user',],
                                    ['label' => 'Назначение', 'icon' => 'fa fa-circle-o', 'url' => '/rbac/assignment',],
                                    ['label' => 'Роли', 'icon' => 'fa fa-circle-o', 'url' => '/rbac/role',],
                                    ['label' => 'Разрешения', 'icon' => 'fa fa-circle-o', 'url' => '/rbac/permission',],
                                    ['label' => 'Маршруты', 'icon' => 'fa fa-circle-o', 'url' => '/rbac/route',],
                                    ['label' => 'Правила', 'icon' => 'fa fa-circle-o', 'url' => '/rbac/rule',],

                                ],
                            ]
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
