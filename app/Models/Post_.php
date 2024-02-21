<?php

namespace App\Models;

class Post
{
    private static $IsiBlog = [
        [
            "title" => "judul 1",
            "author" => "nanda",
            "slug" => "judul-tulisan-pertama",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum doloremque temporibus dicta fugit ab ullam, vitae debitis illum excepturi sunt, veritatis dignissimos, omnis modi enim animi eius totam a eaque porro neque? Itaque eveniet at officiis rerum laudantium. Doloremque, consequuntur explicabo corrupti modi fuga corporis eum qui recusandae officia nihil"
        ],
        [
            "title" => "judul 2",
            "author" => "zayuran",
            "slug" => "judul-tulisan-kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum doloremque temporibus dicta fugit ab ullam, vitae debitis illum excepturi sunt, veritatis dignissimos, omnis modi enim animi eius totam a eaque porro neque? Itaque eveniet at officiis rerum laudantium. Doloremque, consequuntur explicabo corrupti modi fuga corporis eum qui recusandae officia nihil"
        ]
    ];
    public static function all()
    {
        return collect(self::$IsiBlog);
    }
    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
