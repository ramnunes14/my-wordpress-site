<?php return array(
    'root' => array(
        'name' => 'johnpbloch/wordpress-core',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => 'd28f77dcf5f91119da34d02be8cf99f6b0e4e47d',
        'type' => 'wordpress-core',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'johnpbloch/wordpress-core' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'd28f77dcf5f91119da34d02be8cf99f6b0e4e47d',
            'type' => 'wordpress-core',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'phpstan/phpstan' => array(
            'pretty_version' => '2.0.3',
            'version' => '2.0.3.0',
            'reference' => '46b4d3529b12178112d9008337beda0cc2a1a6b4',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpstan/phpstan',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'wordpress/core-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '6.7.1',
            ),
        ),
    ),
);
