<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    //  protected $with =['emploi'];

    /**
     * 02-The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'emploi_id', 
        'salary', 
        'commission_pct',
        // 'manager_id',
        // 'departement_id',
        'password',
    ];

    /**
     * 03-The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
    public static function filter($request)
    {
        $query = self::query();

        // 04-Filtrage par nom
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // 05--Filtrage par nom de famille
        if ($request->filled('last_name')) {
            $query->where('last_name', 'like', '%' . $request->input('last_name') . '%');
        }

        // 06-Filtrage par email
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        // 07-Filtrage par date de création
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        return $query;
    }

// 10-Reletion avec le modèle Emploi
    public function emploi()
    {
        return $this->belongsTo(Emploi::class);
    }
    // Reletion avec le modèle EmploiHistory
    public function emploi_histories()
{
    return $this->hasMany(EmploiHistory::class);
}
}
