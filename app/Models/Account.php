<?php

namespace App\Models;

use App\Models\QueryBuilders\AccountQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "accounts";

    public function newEloquentBuilder($query): AccountQueryBuilder
    {
        return new AccountQueryBuilder($query);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
