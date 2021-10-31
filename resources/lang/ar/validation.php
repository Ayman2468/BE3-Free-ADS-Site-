<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'لابد من قبول :attribute',
    'accepted_if' => 'لابد من قبول :attribute عندما يكون :other :value.',
    'active_url' => 'ال :attribute ليس رابطا صحيحا',
    'after' => ' ال :attribute لابد ان يكون تاريخ بعد :date.',
    'after_or_equal' => 'ال :attribute لابد ان يكون تاريخ بعد او يساوى :date.',
    'alpha' => 'ال :attribute لابد ان يحتوى على حروف',
    'alpha_dash' => ' ال :attribute لابد ان يحتوى على حروف,ارقام,شرط و شرط تحتي فقط',
    'alpha_num' => ' ال :attribute لابد ان يحتوى على حروف و ارقام فقط',
    'array' => ' ال :attribute لابد ان يكون صف من العناصر',
    'before' => ' ال :attribute لابد ان يكون تاريخ قبل :date.',
    'before_or_equal' => ' ال :attribute لابد ان يكون تاريخ قبل او يساوى :date.',
    'between' => [
        'numeric' => ' ال :attribute لابد ان يكون بين :min و :max',
        'file' => ' ال :attribute لابد ان يكون بين :min و :max كيلوبايت',
        'string' => ' ال :attribute لابد ان يكون بين :min و :max حروف',
        'array' => ' ال :attribute لابد ان يكون بين :min  و :max عناصر',
    ],
    'boolean' => ' ال :attribute لابد ان يكون صح او خطأ',
    'confirmed' => ' ال :attribute غير مطابق',
    'current_password' => 'كلمة السر غير صحيحه',
    'date' => ' ال :attribute تاريخ غير صحيح',
    'date_equals' => ' ال :attribute لابد ان يساوى :date.',
    'date_format' => ' ال :attribute لا يطابق طريقة الكتابة الصحيحه :format.',
    'different' => ' ال :attribute و :other لابد ان يكونا مختلفين',
    'digits' => ' ال :attribute لابد ان يكون :digits اعدادا.',
    'digits_between' => ' ال :attribute لابد ان يكون بين :min و :max اعداد',
    'dimensions' => ' ال :attribute لدية مقاسات صورة صحيحه',
    'distinct' => ' ال :attribute لدية قيمة مزدوجه',
    'email' => 'The :attribute must be a valid email address. لابد ان يكون :attribute بريد الكترونى صحيح',
    'ends_with' => ' ال :attribute لابد ان ينتهى باحد القيم التالية :values.',
    'exists' => ' ال :attribute المختار غير صحيح',
    'file' => ' ال :attribute لابد ان يكون ملف',
    'filled' => 'ال :attribute لابد ان يكون له قيمه',
    'gt' => [
        'numeric' => ' ال :attribute لابد ان يكون اكبر من :value.',
        'file' => ' ال :attribute لابد لن تكون قيمتة اكبر من :value كيلوبايت',
        'string' => ' ال :attribute لابد ان تكون قيمتة اكثر من :value حروف',
        'array' => ' ال :attribute لابد ان يكون اكثر من :value عناصر',
    ],
    'gte' => [
        'numeric' => ' ال :attribute لابد ان يكون اكبر من او يساوى :value.',
        'file' => ' ال :attribute لابد ان يكون اكبر من او يساوى :value كيلوبايت',
        'string' => ' ال :attribute لابد ان يكون اكبر من او يساوى :value حروف',
        'array' => 'The :attribute must have :value items or more. ال :attribute لابد ان يحتوى على :value عناصر او اكثر',
    ],
    'image' => ' ال :attribute لابد ان يكون صورة',
    'in' => ' ال :attribute المختار غير صحيح',
    'in_array' => ' ال :attribute غير موجود فى :other.',
    'integer' => ' ال :attribute لابد ان يكون عدد',
    'ip' => ' ال :attribute لابد ان يكون IP صحيح',
    'ipv4' => 'ال :attribute لابد ان يكون IPv4 صحيح',
    'ipv6' => 'ال :attribute لابد ان يكون IPv6 صحيح.',
    'json' => ' ال :attribute لابد ان يكون نص JSON صحيح',
    'lt' => [
        'numeric' => ' ال :attribute لابد ان يكون اقل من :value.',
        'file' => ' ال :attribute لابد لن تكون قيمتة اقل من :value كيلوبايت',
        'string' => ' ال :attribute لابد ان تكون قيمتة اقل من :value حروف',
        'array' => ' ال :attribute لابد ان يكون اقل من :value عناصر',
    ],
    'lte' => [
        'numeric' => ' ال :attribute لابد ان يكون اقل من او يساوى :value.',
        'file' => ' ال :attribute لابد لن تكون قيمتة اقل من او يساوى :value كيلوبايت',
        'string' => ' ال :attribute لابد ان تكون قيمتة اقل من او يساوى :value حروف',
        'array' => ' ال :attribute لابد ان يكون اقل من او يساوى :value عناصر',
    ],
    'max' => [
        'numeric' => ' ال :attribute لابد ان يكون اكبر من او يساوى :max.',
        'file' => ' ال :attribute لابد لن تكون قيمتة اكبر من :max كيلوبايت',
        'string' => ' ال :attribute لابد ان تكون قيمتة اكثر من :max حروف',
        'array' => ' ال :attribute لابد ان يكون اكثر من :max عناصر',
    ],
    'mimes' => ' ال :attribute لابد ان يكون من ملف من نوع :value',
    'mimetypes' => ' ال :attribute لابد ان يكون من ملف من نوع :value',
    'min' => [
        'numeric' => ' ال :attribute لابد ان يكون على الاقل :min.',
        'file' => ' ال :attribute لابد ان يكون على الاقل :min كيلوبايت',
        'string' => ' ال :attribute لابد ان يكون على الاقل :min حروف',
        'array' => ' ال :attribute لابد ان يكون على الاقل :min عناصر.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => ' ال :attribute غير صحيح',
    'not_regex' => ' صيغة :attribute غير صحيحه',
    'numeric' => ' ال :attribute لابد ان يكون رقما',
    'password' => 'كلمة السر غير صحيحه',
    'present' => ' ال :attribute لابد ان يكون مرئى',
    'regex' => ' صيغة :attribute غير صحيحه',
    'required' => ' :attribute مطلوب',
    'required_if' => ' ال :attribute مطلوب عندما :other يكون :value',
    'required_unless' => ' ال :attribute مطلوب مالم :other تكون قيمتة فى :values',
    'required_with' => ' ال :attribute مطلوب عندما :values تكون موجوده',
    'required_with_all' => 'The :attribute field is required when :values are present. ال :attribute مطلوب عندما :values تكون موجوده',
    'required_without' => ' ال :attribute مطلوب عندما يكون :values غير موجود',
    'required_without_all' => ' ال :attribute مطلوب عندما لا يكون اى من :values موجود',
    'prohibited' => ' ال :attribute ممنوع',
    'prohibited_if' => ' ال :attribute ممنوع فى حالة :other يكون :value',
    'prohibited_unless' => ' ال :attribute ممنوع ماعدا ان يكون :other  فى :value',
    'prohibits' => ' ال :attribute يمنع :other من الرؤية',
    'same' => ' ال :attribute و :other لابد ان يتطابقو',
    'size' => [
        'numeric' => ' ال :attribute لابد ان يكون :size.',
        'file' => ' ال :attribute لابد ان يكون :size كيلوبايت',
        'string' => ' ال :attribute لابد ان يكون :size حروف',
        'array' => ' ال :attribute لابد ان يحتوى على :size عناصر',
    ],
    'starts_with' => ' ال :attribute لابد ان يبداء بواحده من القيم التاليه :value',
    'string' => ' ال :attribute لابد ان يكون نص',
    'timezone' => ' ال :attribute لابد ان تكون منطقة زمنية صحيحه',
    'unique' => ' ال :attribute اخذ بالفعل مسبقا',
    'uploaded' => ' ال :attribute فشل فى الرفع',
    'url' => ' ال :attribute لابد ان يكون URL صحيح',
    'uuid' => ' ال :attribute لابد ان يكون UUID صحيح',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
