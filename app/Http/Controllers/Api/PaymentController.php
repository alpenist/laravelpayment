<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\PaymentValidationException;
use App\Http\Services\PaymentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws PaymentValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'account' => 'required',
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw (new PaymentValidationException(
                $validator,
                response(
                    ['errMsg' => 'MandatoryFieldsNotComplete'],
                    Response::HTTP_BAD_REQUEST)
            ));
        }

        $payment = new PaymentService($request);

        return response()->json(
            $payment->create()->toArray(),
            201
        );
    }
}
