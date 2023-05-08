$config = new Config([
        'driver' => 'mysql',
        'address' => 'localhost',
        'port' => '3306',
        'username' => 'root',
        'password' => '',
        'database' => 'toko_online',
        'debug' => false,
        'middlewares' => 'apiKeyDbAuth,cors,authorization',
        "apiKeyDbAuth.header"=> "X-API-Key",
        "apiKeyDbAuth.usersTable"=>"users",
        "apiKeyDbAuth.apiKeyColumn"=>"api_key",
        'cors.allowedOrigins'=>  '*',
        'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
            return !($tableName == 'users' && in_array($columnName, ['password','api_key']));
        },
    ]);
