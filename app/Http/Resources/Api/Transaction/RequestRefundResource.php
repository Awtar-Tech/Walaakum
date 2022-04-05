<?php

namespace App\Http\Resources\Api\Transaction;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestRefundResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['user_id'] = $this->getUserId();
        $Objects['transaction_id'] = $this->getTransactionId();
        $Objects['token_id'] = $this->getTokenId();
        $Objects['name'] = $this->getName();
        $Objects['iban'] = $this->getIban();
        $Objects['swift_code'] =$this->getSwiftCode();
        $Objects['address_1'] = $this->getAddress1();
        $Objects['address_2'] = $this->getAddress2();
        $Objects['address_3'] = $this->getAddress3();
        $Objects['amount'] = $this->getAmount();
        $Objects['status'] = $this->getStatus();
        return $Objects;
    }
}
