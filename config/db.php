<?php

$HOST = 'mysql';
$DATABASE_NAME = 'toxsl_base';
$DATABASE_USERNAME = 'user';
$DATABASE_PASSWORD = 'pass';

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$HOST};dbname={$DATABASE_NAME}",
    'username' => $DATABASE_USERNAME,
    'password' => $DATABASE_PASSWORD,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
