<?php
return array(
	'bitrix_events' => [
        'main' => [
           'OnAfterUserLogin' => [
                'invokables' => [
                    'CountLoginAttempt' => [
                        'name' => 'My\TaskSec\EventListener\Main\OnAfterUserLogin\CountLoginAttempt',
                    ]
                ]
            ]
        ]
	],
	'service_manager' => [
        'invokables' => [
            'MySuperService' => [ // Имя может быть любой строкой
                'name'=> 'MyService',
                'injector' => [
                            'inject' => [
                                'handler' => 'initializer',
							]
                         ],
                'shared'=> false // сохранение создаваемого объекта для последующего возврата при вызове
            ],
        ]
    ]
 );