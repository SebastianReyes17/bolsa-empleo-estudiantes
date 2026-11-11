<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['name','email','password','role','career','phone','bio'];
    protected $hidden = ['password','remember_token'];
    protected function casts(): array { return ['email_verified_at'=>'datetime','password'=>'hashed']; }
    public function jobs(): HasMany { return $this->hasMany(Job::class, 'company_id'); }
    public function applications(): HasMany { return $this->hasMany(Application::class); }
}
