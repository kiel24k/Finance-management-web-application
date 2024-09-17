<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{
    use HasFactory;

    protected $table = 'budget_plans';
    protected $fillable = [
        'user_id',
        'date',
        'category',
        'description',
        'plan_name',
        'target_date',
        'amount',
    ];
}
