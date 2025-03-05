<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'title' => 'Planning Extreme Programming',
            'description' => 'A guide to XP leads the developer, project manager, and team leader through the software development planning process, offering real world examples and tips for reacting to changing environments quickly and efficiently.',
            'image_link' => 'http://books.google.com/books/content?id=u13hVoYVZa8C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',
            'book_links' => 'http://books.google.co.id/books?id=u13hVoYVZa8C&dq=programming&hl=&source=gbs_api',
            'file' => null
            ]
        ];

        foreach($data as $value){
            Book::insert([
                'title' => $value['title'],
                'file' => $value['file'],
                'description' => $value['description'],
                'image_link' => $value['image_link'],
                'book_links' => $value['book_links'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
