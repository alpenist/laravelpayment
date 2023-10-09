<?php

namespace App\Models;

use App\Models\QueryBuilders\PaymentQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "payments";

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
