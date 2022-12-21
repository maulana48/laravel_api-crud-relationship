<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{ Author, Category, Book };
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Author::create([
            'nama' => 'test',
            'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make("test")
        ]);
        Author::create([
            'nama' => 'test1',
            'username' => 'test1',
            'email' => 'tes1t@gmail.com',
            'password' => Hash::make("test")
        ]);
        Author::create([
            'nama' => 'test2',
            'username' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => Hash::make("test")
        ]);
        Category::create([
            'nama' => 'Programming',
            'slug' => 'programming',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama' => 'Desain',
            'slug' => 'desain',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama' => 'Security',
            'slug' => 'security',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama' => 'Networking',
            'slug' => 'networking',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama' => 'Random',
            'slug' => 'random',
            'deskripsi' => 'test'
        ]);

        Book::create([
            'author_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 5),
            'judul' => "test-book",
            'tahun_terbit' => "2022-11-04",
            'sampul' => '/img/product/shoe.jpg',
        ]);

        Book::create([
            'author_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 5),
            'judul' => "test-book1",
            'tahun_terbit' => "2022-02-17",
            'sampul' => '/img/product/shoe.jpg',
        ]);

        Book::create([
            'author_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 5),
            'judul' => "test-book",
            'tahun_terbit' => "2022-10-03",
            'sampul' => '/img/product/shoe.jpg',
        ]);
    }
}
