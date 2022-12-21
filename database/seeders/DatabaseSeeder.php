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
            'nama_author' => 'test',
            'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make("test")
        ]);
        Author::create([
            'nama_author' => 'test1',
            'username' => 'test1',
            'email' => 'tes1t@gmail.com',
            'password' => Hash::make("test")
        ]);
        Author::create([
            'nama_author' => 'test2',
            'username' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => Hash::make("test")
        ]);
        Category::create([
            'nama_category' => 'Programming',
            'slug' => 'programming',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama_category' => 'Desain',
            'slug' => 'desain',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama_category' => 'Security',
            'slug' => 'security',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama_category' => 'Networking',
            'slug' => 'networking',
            'deskripsi' => 'test'
        ]);
        Category::create([
            'nama_category' => 'Random',
            'slug' => 'random',
            'deskripsi' => 'test'
        ]);

        Book::create([
            'author_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 5),
            'judul' => "test-book",
            'penerbit' => "test",
            'kota_penerbitan' => "test",
            'ISBN' => 123,
            'tahun_terbit' => "2022-11-04",
            'sampul' => '/img/product/test.jpg',
        ]);

        Book::create([
            'author_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 5),
            'judul' => "test-book1",
            'penerbit' => "test1",
            'kota_penerbitan' => "test1",
            'ISBN' => 1234,
            'tahun_terbit' => "2022-02-17",
            'sampul' => '/img/product/test.jpg',
        ]);

        Book::create([
            'author_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 5),
            'judul' => "test-book2",
            'penerbit' => "test2",
            'kota_penerbitan' => "test2",
            'ISBN' => 12345,
            'tahun_terbit' => "2022-10-03",
            'sampul' => '/img/product/test.jpg',
        ]);
    }
}
