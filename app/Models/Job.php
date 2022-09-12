<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Filterable;

class Job extends Model
{
    use HasFactory;
    use Filterable;
    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }
    
    public function filterCompany($query,$value){
        return $query->where('Company', 'LIKE', '%' . $value . '%');
    }

    protected $fillable =[      
        'salary',
        'location',
        'probation',
        'display_status',
    ];
}
