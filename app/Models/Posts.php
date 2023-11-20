<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'id_user',
        'title',
        'description'
    ];

    public static function getAllPosts($textSearch, $dateSearch)
    {
        // Montamos la consulta, formateando la fecha, para solo mostrar la fecha y no hora, y ordenamos para mostrar lo mas recientes
        $allPosts = DB::table('posts')
        ->select('id', 'title', 'description', DB::raw('DATE(created_at) AS created_at'))
        ->where('state', '=', '1')
        ->where(DB::raw('DATE(created_at)'), '=', strval($dateSearch))
        ->orderBy('created_at', 'desc')
        ->get();

        if(!empty($textSearch)){
            $allPosts = DB::table('posts')
            ->select('id', 'title', 'description', DB::raw('DATE(created_at) AS created_at'))
            ->where('state', '=', '1')
            ->where(DB::raw('DATE(created_at)'), '=', strval($dateSearch))
            ->where('title', 'like', '%'.$textSearch.'%')
            ->orderBy('created_at', 'desc')
            ->get();
        }
        return $allPosts;
    }
}
