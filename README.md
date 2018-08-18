# Code Test
Ini adalah kode test operation crud content, aplikasi ini dibangun base on framework LARAVEL 5.4, 
php version 7.1 >

### Install
1. Clone Repo ini
```bash
## Clone repo
git clone https://github.com/gempals/code-test.git code-test
```


2. Copy file .env.example menjadi .env 
```bash
cd code-test
cp .env.example .env
```

3. Lengkapi Configurasi DATABASE koneksi di file .env
```bash
DB_CONNECTION=mysql	
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DB_DATABASE
DB_USERNAME=DB_USERNAME
DB_PASSWORD=DB_PASSWORD
```

4. Import DB ke database yang dibuat , lokasi File DB :
   `code-test/database/dbseed.sql`

5. Setup App
```bash
1. composer install
2. php artisan key:generate
```

5. login App
`username:editor@detik.com`
`password:admin12345`


### Author
Created by [andri-putra.com](http://andri-putra.com)

### Demo
[https://code-test.andri-putra.com](https://code-test.andri-putra.com)

## License

[MIT license](http://opensource.org/licenses/MIT).