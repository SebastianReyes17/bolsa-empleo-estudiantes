<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Job extends Model
{
    protected $fillable = ['company_id','title','company_name','location','modality','type','description','requirements','salary','is_active','expires_at'];
    protected function casts(): array { return ['is_active'=>'boolean','expires_at'=>'date']; }
    public function company(): BelongsTo { return $this->belongsTo(User::class, 'company_id'); }
    public function applications(): HasMany { return $this->hasMany(Application::class); }
}
