<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(base_path("database/dummyData.json"));

        // Convert to an array
        $posts = json_decode($json, true);

        // Use a standard foreach loop (easier for arrays)
        foreach ($posts as $post) {
            Post::create([
                "title"            => $post['title'],
                "description"      => $post['description'],
                "Notifications_id" => $post['Notifications_id'],
                "department"       => $post['department'],
                "isVacancy" => $post["isVacancy"],
                "vacancy"          => $post['vacancy'],
                "qualification"    => $post['qualification'],
                "apply_start_date" => $post['apply_start_date'],
                "apply_end_date"   => $post['apply_end_date'],
                "official_website" => $post["official_website"],
                "notification_link" => $post["notification_link"],
                "Apply_link" => $post["Apply_link"],

            ]);
        }
    }
}

// $table->string('title');
// $table->string('description');
// $table->string('Notifications_id')->nullable();
// $table->string('department')->nullable();
// $table->integer('vacancy')->nullable();
// $table->string('qualification')->nullable();
// $table->date('apply_start_date')->nullable();
// $table->date('apply_end_date')->nullable();
// // $table->string('official_website')->nullable();

// // 🔥 IMPORTANT FIELD
// $table->json('important_links')->nullable();
