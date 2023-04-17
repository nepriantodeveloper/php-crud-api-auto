 $config = new Config([
        // 'driver' => 'mysql',
        // 'address' => 'localhost',
        // 'port' => '3306',
        'username' => 'root',
        'password' => '',
        'database' => 'php_crud_api',
        'debug' => true,
        // 'middlewares' => 'authorization',
        //     'authorization.tableHandler' => function ($operation, $tableName) {
        //         return $tableName != 'users';
        // },
        
        'middlewares' => 'apiKeyDbAuth,cors,authorization',
        "apiKeyDbAuth.header"=> "X-API-Key",
        "apiKeyDbAuth.usersTable"=>"users",
        "apiKeyDbAuth.apiKeyColumn"=>"api_key",
        'cors.allowedOrigins'=>  '*',
        // 'authorization.tableHandler' => function ($operation, $columnName) {
        //         return $columnName != 'password';
        // },
        'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
            return !($tableName == 'users' && $columnName == 'password');
        },
        'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
            return !($tableName == 'users'  && $columnName=='api_key');
        },
        
        //disini
        // 'middlewares' => 'apiKeyDbAuth,authorization',
        
       
    ]);
