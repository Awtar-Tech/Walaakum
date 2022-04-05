<?php

namespace App\Http\Controllers\Dashboard\AppContent;

use App\Http\Controllers\Dashboard\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\AhmedPanelTrait;

class TransactionController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/app_content/transactions');
        $this->setEntity(new Transaction());
        $this->setTable('transactions');
        $this->setLang('Transaction');
        $this->setColumns([
            'user_id'=> [
                'name'=>'user_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> User::all(),
                    'custom'=>function($Object){
                        return ($Object)?$Object->name:'-';
                    },
                    'entity'=>'user'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'ref_id'=> [
                'name'=>'ref_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Subscription::all(),
                    'custom'=>function($Object){
                        return ($Object)?((app()->getLocale() == 'ar')?$Object->name_ar : $Object->name):'-';
                    },
                    'entity'=>'subscription'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'value'=> [
                'name'=>'value',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],

        ]);
        $this->SetLinks([
            'delete',
        ]);
    }
}
