<?php

namespace App\Http\Services;

use App\Models\Account;
use App\Models\Payment;
use App\Models\QueryBuilders\AccountQueryBuilder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PaymentService
{

    protected Account $account;
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->account = $this->getAccount($request->input('account'));
    }

    public function create(): Payment
    {
        return Payment::query()->create([
            'id' => $this->request->input('id'),
            'account' => $this->account->{'id'},
            'amount' => $this->request->input('amount'),
        ]);
    }

    /**
     * @param int|string $id
     * @return Account
     * @throws ModelNotFoundException
     */
    private function getAccount(int|string $id): Account
    {
        /** @var AccountQueryBuilder $account */
        $account = Account::query();

        return $account->withId($id);
    }
}