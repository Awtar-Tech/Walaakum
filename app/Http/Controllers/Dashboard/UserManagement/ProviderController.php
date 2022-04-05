<?php

namespace App\Http\Controllers\Dashboard\UserManagement;

use App\Helpers\Constant;
use App\Http\Controllers\Dashboard\Controller;
use App\Http\Requests\Admin\UserManagement\User\ActiveEmailMobileRequest;
use App\Models\User;
use App\Traits\AhmedPanelTrait;

class ProviderController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/user_managements/providers');
        $this->setEntity(((new User())->where('type',Constant::USER_TYPE['Provider'])));
        $this->setViewShow('Dashboard.UserManagement.User.show');
        $this->setTable('users');
        $this->setLang('User');
        $this->setCreate(false);
        $this->setColumns([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'mobile'=> [
                'name'=>'mobile',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'email'=> [
                'name'=>'email',
                'type'=>'email',
                'is_searchable'=>true,
                'order'=>true
            ],
            'type'=> [
                'name'=>'type',
                'type'=>'text-custom',
                'custom'=>function($Object){
                    return __('crud.User.Types.'.$Object->type);
                },
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
        $this->SetLinks([
            'active_mobile_email'=>[
                'route'=>'active_mobile_email',
                'icon'=>'fa-check-square',
                'lang'=>__('crud.User.Links.active_mobile_email',[],session('my_locale')),
                'condition'=>function ($Object){
                    return (is_null($Object->email_verified_at)|| is_null($Object->mobile_verified_at));
                }
            ],
            'active',
            'show',
            'change_password',
            'delete',
        ]);
    }
    public function active_mobile_email($id,ActiveEmailMobileRequest $request){
        return $request->preset($this,$id);
    }
}
