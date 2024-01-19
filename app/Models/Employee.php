<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_id'];
    protected $dates = ['deleted_at'];

    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
