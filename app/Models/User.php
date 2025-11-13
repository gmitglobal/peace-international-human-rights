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

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'refer_id',
        'refered_by',
        'email',
        'password',
        'phone',
        'wphone',
        'father_name',
        'mother_name',
        'birth_certificate_no',
        'present_address',
        'permanent_address',
        'division',
        'district',
        'thana',
        'ward',
        'central',
        'photo',
        'nid',
        'signature',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
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
            'password' => 'hashed',
        ];
    }


    // ✅ Define relationship with Division model
    public function divisions()
    {
        // This means: each user (or record in this model)
        // belongs to one Division.
        // The foreign key in this table is 'division' (column name)
        // and it links to the 'id' column in the divisions table.
        return $this->belongsTo(Division::class, 'division');
    }

    // ✅ Define relationship with District model
    public function districts()
    {
        // This means: each user belongs to one District.
        // 'district' is the foreign key column in this model’s table,
        // pointing to the 'id' in the districts table.
        return $this->belongsTo(District::class, 'district');
    }

    // ✅ Define relationship with Thana model
    public function thanas()
    {
        // This means: each user belongs to one Thana (police station area).
        // 'thana' is the foreign key column in this model’s table,
        // referring to 'id' in the thanas table.
        return $this->belongsTo(Thana::class, 'thana');
    }


    public function activities()
    {
        return $this->hasMany(Activites::class);
    }


    // public function referTable()
    // {
    //     return $this->belongsTo(ReferTable::class, 'refered_by', 'refer_id');
    // }

    public function role()
    {
        return $this->belongsTo(MyRole::class, 'role_id');
    }
}
