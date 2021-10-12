<?php


use App\Helpers\Constant;

return [

    'Employee'=>[
        'crud_names' => 'الموظفين',
        'crud_name' => 'موظف',
        'crud_the_name' => 'الموظف',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'active' => 'الحالة',
        'image' => 'الصورة الشخصية',
        ],
    'User'=>[
        'crud_names' => 'المستخدمين',
        'crud_name' => 'مستخدم',
        'crud_the_name' => 'المستخدم',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'mobile' => 'رقم الجوال',
        'avatar' => 'الصورة',
        'type' => 'نوع البروفايل',
        'balance' => 'الرصيد',
        'address' => 'العنوان',
        'app_locale' => 'اللغة',
        'active' => 'الحالة',
        'created_at' => 'تاريخ الإنشاء',
        'Types'=>[
            ''.Constant::USER_TYPE['Customer']=>'عميل',
            ''.Constant::USER_TYPE['Provider']=>'مزود',
        ],
        'Links'=>[
            'active_mobile_email'=>'تفعيل الايميل والجوال'
        ]
    ],
    'Setting'=>[
        'crud_names' => 'الإعدادات',
        'crud_name' => 'اعداد',
        'crud_the_name' => 'الاعداد',
        'key' => 'الإعداد',
        'name' => 'الاسم انجليزي',
        'name_ar' => 'الاسم عربي',
        'value' => 'القيمة',
        'value_ar' => 'القيمة عربي',
        'pages'=>'الصفحات الثابته',
        'notifications'=>'الاشعارات',
        'other'=>'اعدادات اخرى'
    ],
    'Faq'=>[
        'crud_names' => 'الأسئلة الشائعة',
        'crud_name' => 'سؤال شائع',
        'crud_the_name' => 'السؤال الشائع',
        'faq_category_id' => 'تصنيف الأسئلة الشائعة',
        'question' => 'السؤال انجليزي',
        'question_ar' => 'السؤال عربي',
        'answer' => 'الإجابة انجليزي',
        'answer_ar' => 'الإجابة عربي',
        'active' => 'الحالة',
    ],
    'Log'=>[
        'crud_names' => 'التقارير',
        'crud_name' => 'تقرير',
        'crud_the_name' => 'التقرير',
        'employee_id' => 'المنفذ',
        'ref_id' => 'الهدف',
        'ip' => 'الاي بي',
        'created_at' => 'التاريخ',
        'type' => 'النوع',
        'Types'=>[
            ''.\App\Models\Log::$Type['Login']=>'تسجيل دخول',
            ''.\App\Models\Log::$Type['Logout']=>'تسجيل خروج',
        ]
    ],
    'Ticket'=>[
        'crud_names' => 'التذاكر',
        'crud_name' => 'تذكرة',
        'crud_the_name' => 'التذكرة',
        'id' => '#',
        'user_id' => 'المستخدم',
        'name' => 'الاسم',
        'email' => 'الايميل',
        'title' => 'العنوان',
        'message' => 'الرسالة',
        'status' => 'الحالة',
        'Statuses'=>[
            ''.\App\Helpers\Constant::TICKETS_STATUS['Open']=>'مفتوحة',
            ''.\App\Helpers\Constant::TICKETS_STATUS['Closed']=>'مغلقة',
        ]
    ],
    'Permission'=>[
        'crud_names' => 'الصلاحيات',
        'crud_name' => 'صلاحية',
        'crud_the_name' => 'الصلاحية',
        'id' => '#',
        'name' => 'الاسم انجليزي',
        'name_ar' => 'الاسم عربي',
    ],
    'Role'=>[
        'crud_names' => 'الأدوار',
        'crud_name' => 'دور',
        'crud_the_name' => 'الدور',
        'id' => '#',
        'name' => 'الاسم انجليزي',
        'name_ar' => 'الاسم عربي',
        'permissions' => 'الصلاحيات',
    ],
    'Country'=>[
        'crud_names' => 'الدول',
        'crud_name' => 'دولة',
        'crud_the_name' => 'الدولة',
        'name' => 'الاسم انجليزي',
        'name_ar' => 'الاسم عربي',
        'country_code' => 'كود الدولة',
        'active' => 'الحالة',
    ],
    'City'=>[
        'crud_names' => 'المدن',
        'crud_name' => 'مدينة',
        'crud_the_name' => 'المدينة',
        'country_id' => 'الدولة',
        'name' => 'الاسم انجليزي',
        'name_ar' => 'الاسم عربي',
        'active' => 'الحالة',
    ],
    'SplashScreen'=>[
        'crud_names' => 'شاشات السبلاش',
        'crud_name' => 'شاشة السبلاش',
        'crud_the_name' => 'الشاشة',
        'title' => 'العنوان',
        'description' => 'الوصف',
        'title_ar' => 'العنوان عربي',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'order' => 'الترتيب',
        'active' => 'الحالة',
    ],
];
