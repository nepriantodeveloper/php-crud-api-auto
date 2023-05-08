$config = new Config([
        'driver' => 'mysql', //driver bisa mysql,mssql,postgresql,sqlite
        'address' => 'localhost', //ipserver
        'port' => '3306', //port server database
        'username' => 'root', //userbname database
        'password' => '', //password database
        'database' => 'php_cud_api', //nama database
        'debug' => false, //debugging aktif/tidak aktif
        'middlewares' => 'dbAuth,cors,authorization', //otorisasi akses api DbAuth berarti berdasarkan nilai dari  kolom username dan password pada tabel
        'authorization.tableHandler' => function ($operation, $tableName) {
            return $tableName != 'users';
        },
        "dbAuth.usernameColumn"=>"username", //nilai kolom yang akan dicek untuk otorisasi pengkasesan api
        "dbAuth.passwordColumn"=>"password", // kolom password yang akan dicek untuk otorisasi pengkasesan api
        "dbAuth.dbAuth.passwordLength"=>"8", //nilai kolom yang akan dicek untuk otorisasi pengkasesan api
        "dbAuth.registerUser"=>"1", //url register di aktifkan
        'cors.allowedOrigins'=>  '*', //cors dari semua IP diaktifkan
        
    ]);
