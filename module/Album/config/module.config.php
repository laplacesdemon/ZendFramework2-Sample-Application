<?php
/*
 * The Album module specific configuration
 */
return array(
    // 'di' parameter configures the zf2's dependency injection
    'di' => array(
        'instance' => array(
            'alias' => array(
                'album' => 'Album\Controller\AlbumController'
            ),
            'Album\Controller\AlbumController' => array(
                'parameters' => array(
                    'albumTable' => 'Album\Model\AlbumTable'
                )
            ),
            'Album\Model\AlbumTable' => array(
                'parameters' => array(
                    'config' => 'Zend\Db\Adapter\Mysqli'
                )
            ),
            'Zend\Db\Adapter\Mysqli' => array(
                'parameters' => array(
                    'config' => array(
                        'host' => 'localhost',
                        'username' => 'root',
                        'password' => '',
                        'dbname' => 'zf2tutorial'
                    )
                )
            ),
            // we are adding view directory to the view renderer for the album module
            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'options' => array(
                        'script_paths' => array(
                            'album' => __DIR__ . '/../views'
                        )
                    )
                )
            )
        )
    )
);