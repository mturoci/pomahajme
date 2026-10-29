<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private const SIGNATURE_FIELDS = ['AccountId', 'Amount', 'Currency', 'Type', 'ResultCode', 'CounterAccount', 'CounterAccountName', 'OrderId', 'PaymentId', 'Reference', 'RefuseReason'];

    public function notification(Request $request)
    {
        $params = $request->all();
        $sigData = implode('/', array_filter(array_map(fn ($f) => $params[$f] ?? null, self::SIGNATURE_FIELDS), fn ($v) => $v !== null && $v !== ''));
        $signature = strtoupper(hash_hmac('sha256', $sigData, env('TRUSTPAY_SECRET', '')));
        $valid = hash_equals($signature, strtoupper($params['Signature'] ?? ''));

        // Counter account fields hold donor names and IBANs - keep them out of logs.
        $context = array_merge($request->except(['CounterAccount', 'CounterAccountName', 'Signature']), ['signatureValid' => $valid]);
        if (($params['ResultCode'] ?? null) === '0' && $valid) {
            Log::info('Finby payment notification', $context);
        } else {
            Log::warning('Finby payment notification', $context);
        }

        // Anything other than 200 makes finby retry for up to 75 hours.
        return response('OK', 200);
    }
}
