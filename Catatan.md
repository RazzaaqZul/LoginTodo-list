Jika baru saja Nge-clone dari github lakukan

-   composer update
-   composer dump-autoload
-   membuat env dan buat encypt key dengan:
    php artisan key:generate

2 logic yang terpisah

-   Logic untuk Login
-   Logic Todolist

Usahakan jangan sampai semua logic di controller
Controller hanya logic Web nya saja, Logic business dipisahkan dan taro di service

1. Membuat User Service

    - Membuat Singleton sebuah depedency injection
    - Membuat folder app/Services. Membuat Interface berama UserService.php
    - Membuat folder app/Services/impl untuk detail logic nya. Kita akan gunakan kontrak dari UserService.php. Salah satu file implementasi nya adalah UserServiceImpl.php.

2. Membuat UserProvider

    - UserServiceProvider.php meng-implementasi DefferableProvider untuk bersifat lazy.
    - UserServiceProvider di daftarkan dalam config/app.php bagian provider=[] agar autoload saat aplikasi dijalankan.

3. Implementasi Logic Login

    - Implementasikan di Kontrak, yaitu App\Services\UserService.
    - Jabarkan kodenya pada Kontrak Implementasi dengan App\Sevices\Impl\UserServiceImpl
    - Karena belum mempelajari DB jadi simpen di memory terlebih dahulu
    - Lakukan Test Pada UserServiceTest.php

4. Tamplate

    - Buat folder User di resources/views/user
    - Buat file pada Login.blade.php
    - Lakukan Render View pada Route di web.php
    - buat user/login.blade.php

5. Membuat User Controller

    - Buat function untuk doLogin, View, doLogout
    - Buat route di web.php
    - Membuat doLogin
    - Membuat dologout

6. Membuat Middleware Guest (Belum Login/Sudah Login)
7. Membuat Middleware Member (Sudah Login)
8. Membuat Controller Homepage
9. Membuat Todolist Service
    - Membuat bisnis logic dalam bentuk service
    - Buat interface todolist beserta implementasinya
    - Dafarkan singleton di provider TodolistServiceProvider
10. Membuat Todolist Controller sesuai aksinya.