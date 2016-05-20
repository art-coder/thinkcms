<?php




return array(
    //'配置项'=>'配置值'
//    'LAYOUT_ON' => true,
//    'LAYOUT_NAME' => 'layout',
//    'LAYOUT_NAME'=>'Layout/layout',

    'navs' => [
        'relation' => [
            'system' => ['name' => '系统', 'link' => 'Index/index', 'lists' => ['Index']],
            'users' => ['name' => '用户', 'link' => 'Manage/index', 'lists' => ['Manage', 'Group', 'Logs', 'User']],
            'content' => ['name' => '内容', 'link' => 'Article/index', 'lists'  => ['Article', 'Comment', 'Category']],
            'model' => ['name' => '应用', 'link' => 'DB/index', 'lists'  => ['DB', 'Addons']],
        ],
        'system' => [//系统
            'level' => 1,
            'items' => [
                ['name' => '首页', 'uri' => 'Index/index', 'icon' => 'fa-home'],
                ['name' => '系统配置', 'uri' => 'Index/web', 'icon' => 'fa-cogs'],
                ['name' => '专用于测试', 'uri' => 'Index/test.hide', 'icon' => 'fa-cogs'],
            ],
        ],
        'users' => [//用户
            'level' => 2,
            'items' => [
                [
                    'name' => '后台用户', 'group' => 'Manage', 'icon' => 'fa-user-md', 'lists' => 'Manage,Logs',
                    'items' => [
                        ['name' => '管理员列表', 'uri' => 'Manage/index', 'icon' => 'fa-list-alt'],
                        ['name' => '添加管理员', 'uri' => 'Manage/add', 'icon' => 'fa-plus-circle'],
                        ['name' => '修改管理员资料', 'uri' => 'Manage/edit.hide', 'icon' => 'fa-pencil-square'],
                        ['name' => '管理员回收站', 'uri' => 'Manage/recycle', 'icon' => 'fa-recycle'],
                        ['name' => '后台用户行为', 'uri' => 'Logs/index', 'icon' => 'fa-pencil-square-o'],
                    ]
                ],
                [
                    'name' => '注册用户', 'group' => 'User', 'icon' => 'fa-users', 'lists' => 'User',
                    'items' => [
                        ['name' => '用户列表', 'uri' => 'User/index', 'icon' => 'fa-list-alt'],
                        ['name' => '添加用户', 'uri' => 'User/add', 'icon' => 'fa-plus-circle'],
                        ['name' => '修改用户', 'uri' => 'User/edit.hide', 'icon' => 'fa-pencil-square'],
                        ['name' => '回收站', 'uri' => 'User/recycle', 'icon' => 'fa-recycle'],
                    ]
                ],
            ],
        ],
        'content' => [//内容
            'level' => 2,
            'items' => [
                [
                    'name' => '栏目管理', 'group' => 'Category', 'icon' => 'fa-columns', 'lists' => 'Category',
                    'items' => [
                        ['name' => '栏目列表', 'uri' => 'Category/index', 'icon' => 'fa-list-alt'],
                        ['name' => '添加栏目', 'uri' => 'Category/add', 'icon' => 'fa-plus-circle'],
                        ['name' => '编辑栏目', 'uri' => 'Category/edit.hide', 'icon' => 'fa-pencil-square'],
                        ['name' => '回收站', 'uri' => 'Category/recycle', 'icon' => 'fa-recycle'],
                    ]
                ],
                [
                    'name' => '文章管理', 'group' => 'Article', 'icon' => 'fa-book', 'lists' => 'Article',
                    'items' => [
                        ['name' => '文章列表', 'uri' => 'Article/index', 'icon' => 'fa-list-alt'],
                        ['name' => '添加文章', 'uri' => 'Article/add', 'icon' => 'fa-plus-circle'],
                        ['name' => '编辑文章', 'uri' => 'Article/edit.hide', 'icon' => 'fa-pencil-square'],
                        ['name' => '回收站', 'uri' => 'Article/recycle', 'icon' => 'fa-recycle'],
                    ]
                ],
                [
                    'name' => '评论管理', 'group' => 'Comment', 'icon' => 'fa-comments', 'lists' => 'Comment',
                    'items' => [
                        ['name' => '评论列表', 'uri' => 'Comment/index', 'icon' => 'fa-list-alt'],
                        ['name' => '编辑评论', 'uri' => 'Comment/edit.hide', 'icon' => 'fa-pencil-square'],
                        ['name' => '回收站', 'uri' => 'Comment/recycle', 'icon' => 'fa-recycle'],
                    ]
                ],
            ],
        ],
        'model' => [//应用
            'level' => 2,
            'items' => [
                [
                    'name' => '数据库管理', 'group' => 'DB', 'icon' => 'fa-database', 'lists' => 'DB',
                    'items' => [
                        ['name' => '数据库备份', 'uri' => 'DB/index', 'icon' => 'fa-list-alt'],
                        ['name' => '数据库恢复', 'uri' => 'DB/undo', 'icon' => 'fa-undo'],
                    ]
                ],
                [
                    'name' => '插件管理', 'group' => 'Addons', 'icon' => 'fa-briefcase', 'lists' => 'Addons',
                    'items' => [
                        ['name' => '插件列表', 'uri' => 'Addons/index', 'icon' => 'fa-list-alt'],
                        ['name' => '回收站', 'uri' => 'Addons/recycle', 'icon' => 'fa-recycle'],
                    ]
                ],
            ],
        ],
    ],

);