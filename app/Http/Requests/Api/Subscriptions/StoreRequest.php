<?php

namespace App\Http\Requests\Api\Subscriptions;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\DiscountResource;
use App\Http\Resources\Api\Transaction\TransactionResource;
use App\Models\Discount;
use App\Models\Provider;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'subscription_id'=>'required|exists:subscriptions,id',
        ];
    }
    public function run(): JsonResponse
    {
        $subscription = Subscription::find($this->subscription_id);
        $User = auth()->user();
        $provider = Provider::where('user_id', $User->getId())->first();
        $Balance = Functions::UserBalance($provider->getUserId());
        if ($Balance >= $subscription->getPrice()) {
            $Transaction = new Transaction();
            $Transaction->setUserId($provider->getUserId());
            $Transaction->setRefId($subscription->getId());
            $Transaction->setType(Constant::TRANSACTION_TYPES['Holding']);
            $Transaction->setValue($subscription->getPrice());
            $Transaction->setStatus(Constant::TRANSACTION_STATUS['Paid']);
            $Transaction->save();
        }else{
            return $this->failJsonResponse([__('messages.dont_have_credit')],[
                'request_amount'=>($subscription->getPrice()-$Balance)
            ]);
        }

        return $this->successJsonResponse([__('messages.created_successful')],new TransactionResource($Transaction),'Transaction');

    }
}
