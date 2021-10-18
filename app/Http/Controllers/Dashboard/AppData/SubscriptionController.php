<?php

namespace App\Http\Controllers\Dashboard\AppData;

use App\Http\Controllers\Dashboard\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Subscription;
use App\Traits\AhmedPanelTrait;

class SubscriptionController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/app_data/subscriptions');
        $this->setEntity(new Subscription());
        $this->setTable('subscriptions');
        $this->setLang('Subscription');
        $this->setColumns([
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>false,
                'order'=>false
            ],
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'name_ar'=> [
                'name'=>'name_ar',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'months'=> [
                'name'=>'months',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'price'=> [
                'name'=>'price',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'active'=> [
                'name'=>'active',
                'type'=>'active',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true
            ],
            'name_ar'=> [
                'name'=>'name_ar',
                'type'=>'text',
                'is_required'=>true
            ],
            'description'=> [
                'name'=>'description',
                'type'=>'textarea',
                'is_required'=>true
            ],
            'description_ar'=> [
                'name'=>'description_ar',
                'type'=>'textarea',
                'is_required'=>true
            ],
            'months'=> [
                'name'=>'months',
                'type'=>'number',
                'is_required'=>true
            ],
            'price'=> [
                'name'=>'price',
                'type'=>'number',
                'is_required'=>true
            ],
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>true
            ],
            'active'=> [
                'name'=>'active',
                'type'=>'active',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }
}
