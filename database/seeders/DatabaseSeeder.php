<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         

        User::create([
            'name' => 'Clarissa Nabila',
            'username' => 'clarissa',
            'email' => 'clarissa@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::factory(3)->create();

        /*User::create([
            'name' => 'Icha',
            'email' => 'icha@gmail.com',
            'password' => bcrypt('test123')
        ]); */

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]); 

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        /* Post::create([
            'title' => 'Judul Pertama',
            'user_id' => 1,
            'category_id' => 1,
            'slug' => 'judul-pertama',
            'excerpt' => 'lorem ipsum pertama',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam aperiam doloribus illum ipsa, officiis ullam quam aut, a itaque porro repudiandae omnis pariatur non dignissimos eos illo nisi doloremque? Porro quasi, reiciendis quam autem laborum harum minus, doloribus aperiam itaque dolore ut distinctio error sint temporibus voluptas voluptatem consequuntur recusandae doloremque explicabo cupiditate repudiandae! Nobis ab laboriosam, voluptatibus vero illum atque velit facilis eveniet. Saepe sint accusantium et hic provident eum repudiandae odit assumenda placeat velit ex, non enim nesciunt cupiditate sit quisquam ab expedita atque, sequi vero rem? Laborum quia molestiae rem sed dolores, itaque sapiente ullam ex nihil.',
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'user_id' => 1,
            'category_id' => 2,
            'slug' => 'judul-kedua',
            'excerpt' => 'lorem ipsum kedua',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam aperiam doloribus illum ipsa, officiis ullam quam aut. </p> <p>a itaque porro repudiandae omnis pariatur non dignissimos eos illo nisi doloremque? Porro quasi, reiciendis quam autem laborum harum minus, doloribus aperiam itaque dolore ut distinctio error sint temporibus voluptas voluptatem consequuntur recusandae doloremque explicabo cupiditate repudiandae! Nobis ab laboriosam, voluptatibus vero illum atque velit facilis eveniet. Saepe sint accusantium et hic provident eum repudiandae odit assumenda placeat velit ex, non enim nesciunt cupiditate sit quisquam ab expedita atque, sequi vero rem? Laborum quia molestiae rem sed dolores, itaque sapiente ullam ex nihil.</p>',
        ]);
            
        Post::create([
            'title' => 'Judul Ketiga',
            'user_id' => 2,
            'category_id' => 1,
            'slug' => 'judul-ketiga',
            'excerpt' => 'lorem ipsum ketiga',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam aperiam doloribus illum ipsa, officiis ullam quam aut. </p> <p>a itaque porro repudiandae omnis pariatur non dignissimos eos illo nisi doloremque? Porro quasi, reiciendis quam autem laborum harum minus, doloribus aperiam itaque dolore ut distinctio error sint temporibus voluptas voluptatem consequuntur recusandae doloremque explicabo cupiditate repudiandae! Nobis ab laboriosam, voluptatibus vero illum atque velit facilis eveniet. Saepe sint accusantium et hic provident eum repudiandae odit assumenda placeat velit ex, non enim nesciunt cupiditate sit quisquam ab expedita atque, sequi vero rem? Laborum quia molestiae rem sed dolores, itaque sapiente ullam ex nihil.</p>',
        ]); */
    }
}
