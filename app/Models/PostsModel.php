<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostsModel extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'id_user',
        'title',
        'description'
    ];

    public static function getAllPosts(){
        $allPosts = DB::table('posts')->get();
        return $allPosts;
    }
}
