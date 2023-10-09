<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;

class AccountController extends Controller
{
    public function store(Request $request)
    {
        $account = Account::query()->create([
            'balance' => $request->input('balance') ?? 0,
        ]);
        return response()->json($account->toArray(), 201);
    }

    /**
     * @param int|string $id
     * @param Request $request
     * @return JsonResponse
     */
    public function get(int|string $id, Request $request): JsonResponse
    {
        $account = Account::query()->findOrFail((int)$id);

        return response()->json($account);
    }
}