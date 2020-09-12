بص  اولا 
هتعمل tinker كدة بالترتيب 
$ factory(App\User::class, 5)->create();
$ factory(App\Post::class, 5)->create();
وبعدها هترن السيدر  بتاع الكاتيجورى 
وبعدها 
هترن السيدر بتاع اليوزر 
وابقي ادخل الداتا بيز عدل type بتاع اى يوزر خليه واحد علشان يبقي ادمين 
admin@admin.com
123456
$php artisan db:seed --class=UserSeeder
$php artisan db:seed --class=CategoriesTableSeeder

$ php artisan tinker
$ factory(App\CategoryPost::class, 100)->create();
