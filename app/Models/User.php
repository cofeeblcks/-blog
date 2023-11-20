<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'document',
        'first_name',
        'last_name',
        'email',
        'birthdate',
        'password',
        'state'
    ];

    protected $hidden = [
        'password'
    ];

    public static function getAllUsers($textSearch)
    {
        // Montamos la consulta, formateando la fecha, para solo mostrar la fecha y no hora, y ordenamos para mostrar lo mas recientes
        $allUsers = DB::table('users')
        ->select('id', 'document', 'first_name', 'last_name', 'email', 'birthdate', DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age'), 'state', DB::raw('DATE(created_at) AS created_at'))
        ->orderBy('created_at', 'desc')
        ->get();

        if(!empty($textSearch)){
            $allUsers = DB::table('users')
            ->select('id', 'document', 'first_name', 'last_name', 'email', 'birthdate', DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age'), 'state', DB::raw('DATE(created_at) AS created_at'))
            ->where('first_name', 'like', '%'.$textSearch.'%')
            ->orWhere('last_name', 'like', '%'.$textSearch.'%')
            ->orderBy('created_at', 'desc')
            ->get();
        }
        return $allUsers;
    }

    public static function changeState($id, $state){
        try {
            $updated = DB::table('users')
            ->where('id', $id)
            ->update([
                'state' => $state
            ]);
        } catch (\Throwable $e) {
            $updated = false;
        }
        
        return $updated;
    }
}
