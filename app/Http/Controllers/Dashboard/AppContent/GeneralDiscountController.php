<?php

namespace App\Http\Controllers\Dashboard\AppContent;

use App\Http\Controllers\Dashboard\Controller;
use App\Models\GeneralDiscount;
use App\Traits\AhmedPanelTrait;

class GeneralDiscountController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/app_content/general_discounts');
        $this->setEntity(new GeneralDiscount());
        $this->setTable('general_discounts');
        $this->setLang('GeneralDiscount');
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
            'type'=> [
                'name'=>'type',
                'type'=>'select',
                'data'=>[
                    GeneralDiscount::Types['MostWatch'] =>__('crud.GeneralDiscount.Types.'.GeneralDiscount::Types['MostWatch'],[],session('my_locale')),
                    GeneralDiscount::Types['NewDiscount'] =>__('crud.GeneralDiscount.Types.'.GeneralDiscount::Types['NewDiscount'],[],session('my_locale')),
                ],
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
            'code'=> [
                'name'=>'code',
                'type'=>'text',
                'is_required'=>true
            ],
            'url'=> [
                'name'=>'url',
                'type'=>'url',
                'is_required'=>true
            ],
            'type'=> [
                'name'=>'type',
                'type'=>'select',
                'data'=>[
                    GeneralDiscount::Types['MostWatch'] =>__('crud.GeneralDiscount.Types.'.GeneralDiscount::Types['MostWatch'],[],session('my_locale')),
                    GeneralDiscount::Types['NewDiscount'] =>__('crud.GeneralDiscount.Types.'.GeneralDiscount::Types['NewDiscount'],[],session('my_locale')),
                ],
                'is_required'=>true
            ],
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>false,
                'is_required_update'=>false
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
