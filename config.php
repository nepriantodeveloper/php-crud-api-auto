$config = new Config([
        'driver' => 'mysql', //driver bisa mysql,mssql,postgresql,sqlite
        'address' => 'localhost', //ipserver
        'port' => '3306', //port server database
        'username' => 'root', //userbname database
        'password' => '', //password database
        'database' => 'toko_online', //nama database
        'debug' => false, //debugging aktif/tidak aktif
        'middlewares' => 'apiKeyDbAuth,cors,authorization', //otorisasi akses api apiKeyDbAuth berarti berdasarkan nilai dari sebuah kolom pada tabel
        "apiKeyDbAuth.header"=> "X-API-Key", //jenis permintaan belakang layar yang diaktifkan
        "apiKeyDbAuth.usersTable"=>"users", //tabel yang digunakan untuk otorisasi api
        "apiKeyDbAuth.apiKeyColumn"=>"api_key", //nilai kolom yang akan dicek untuk otorisasi pengkasesan api
        "apiKeyDbAuth.registerUser"=>"1", //url register di aktifkan
        'cors.allowedOrigins'=>  '*', //cors dari semua IP diaktifkan
        'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
            return !($tableName == 'users' && in_array($columnName, ['password','api_key'])); //membatasi tabel dan kolom yang dapat diakses
        },
    ]);
