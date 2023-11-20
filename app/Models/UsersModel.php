<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'document',
        'first_name',
        'last_name',
        'email',
        'birthdate',
        'password'
    ];

    public static function getAllUsers($textSearch)
    {
        // Montamos la consulta, formateando la fecha, para solo mostrar la fecha y no hora, y ordenamos para mostrar lo mas recientes
        $allUsers = DB::table('users')
        ->select('id', 'title', 'description', DB::raw('DATE(created_at) AS created_at'))
        ->where('state', '=', '1')
        ->orderBy('created_at', 'desc')
        ->get();

        if(!empty($textSearch)){
            $allUsers = DB::table('users')
            ->select('id', 'title', 'description', DB::raw('DATE(created_at) AS created_at'))
            ->where('state', '=', '1')
            ->where('first_name', 'like', '%'.$textSearch.'%')
            ->orderBy('created_at', 'desc')
            ->get();
        }
        return $allUsers;
    }
}
