<?php

namespace App\Http\Controllers\Dashboard\AppContent;

use App\Http\Controllers\Dashboard\Controller;
use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Product;
use App\Traits\AhmedPanelTrait;

class AdvertisementController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/app_content/advertisements');
        $this->setEntity(new Advertisement());
        $this->setTable('advertisements');
        $this->setLang('Advertisement');
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
            'popup'=> [
                'name'=>'popup',
                'type'=>'active',
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
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>false,
                'is_required_update'=>false
            ],
            'popup'=> [
                'name'=>'popup',
                'type'=>'active',
                'is_required'=>true
            ],
            'active'=> [
                'name'=>'active',
                'type'=>'active',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'active',
            'edit',
            'delete',
        ]);
    }
}
