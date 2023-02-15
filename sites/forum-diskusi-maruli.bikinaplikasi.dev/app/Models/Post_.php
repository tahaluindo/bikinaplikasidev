<?php

namespace App\Models;


class Post
{
    private static $blog_post = [
        [
            "title" => "Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Saud Maruli Panjaitan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis earum natus ad itaque similique.
    Error perspiciatis dicta veritatis alias non. Expedita ipsam quo omnis veniam officiis ea esse fugiat!
    Soluta harum est, laboriosam quia at consequuntur officia unde provident, recusandae explicabo eos
    voluptate? Sunt magni aliquid fuga quibusdam. Ea praesentium earum alias velit, voluptates tempora!
    Possimus repellendus doloremque amet eaque culpa ipsam veritatis at sint, explicabo maxime nobis
    commodi deserunt animi enim aut reprehenderit tenetur minus blanditiis? Numquam, amet porro!"
        ],
        [
            "title" => "Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Paul Panjaitan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis earum natus ad itaque similique.
     Error perspiciatis dicta veritatis alias non. Expedita ipsam quo omnis veniam officiis ea esse fugiat!
    Soluta harum est, laboriosam quia at consequuntur officia unde provident, recusandae explicabo eos
    voluptate? Sunt magni aliquid fuga quibusdam. Ea praesentium earum alias velit, voluptates tempora!
    Possimus repellendus doloremque amet eaque culpa ipsam veritatis at sint, explicabo maxime nobis
    commodi deserunt animi enim aut reprehenderit tenetur minus blanditiis? Numquam, amet porro! "

        ]
    ];


    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $post = static::all();
        return $post->firstWhere('slug', $slug);
    }

}
