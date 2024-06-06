## Cara Install

-   git clone https://github.com/Sann69/final-project.git
-   cd final-project
-   composer install
-   cp .env.example .env
-   edit file .env
-   php artisan cache:clear
-   composer dump-autoload
-   php artisan key:generate
-   php artisan migrate
-   php artisan db:seed --class=CreateRole
-   composer require laravel/socialite (jika perlu)
-   composer require spatie/laravel-permission (jika perlu)
-   php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" (jika perlu)
-   php artisan storage:link (jika perlu)
-   php artisan serve

## Cara Push (dari lokal ke github)

-   git add .
-   git commit -m "Perubahan apa yang terjadi"
-   git remote add origin https://github.com/Sann69/final-project.git
-   git remote -v (cek remote apakah sudah terhubung dengan benar)
-   git branch -M main
-   git push -u origin main
-   git remote remove origin (untuk disconnect remote)

## Cara Pull (dari github ke lokal)

-   git remote add origin https://github.com/Sann69/final-project.git
-   git pull origin main
-   git remote remove origin (untuk disconnect remote)
