<?php

return [

    // Api Account
    'apiAccount' => env(
        'API_ACCOUNT',
        "292508153084379141"
    ),

    // Main url
    'URL' => env(
        'JT_EXPRESS_URL',
        "https://openapi.jtjms-sa.com/openplatformweb/mock/"
    ),

    // Create order
    'UrlAddOrder' => env(
        'JT_EXPRESS_URL',
        config('JtExpress.URL') . 'order/addOrder' ?? "https://openapi.jtjms-sa.com/openplatformweb/mock/order/addOrder"
    ),

    // checking order
    'UrlCheckingOrder' => env(
        'JT_EXPRESS_URL_CHECKING_ORDER',
        config('JtExpress.URL') . 'order/addOrder' ?? "https://openapi.jtjms-sa.com/openplatformweb/mock/order/getOrders"
    ),

    // Cancel order
    'UrlCancelOrder' => env(
        'JT_EXPRESS_URL_CANCEL_ORDER',
        config('JtExpress.URL') . 'order/addOrder' ?? "https://openapi.jtjms-sa.com/openplatformweb/mock/order/cancelOrder"
    ),

    // Waybill model
    'UrlWaybillModel' => env(
        'JT_EXPRESS_URL_WAYBILL_MODEL',
        config('JtExpress.URL') . 'order/addOrder' ?? "https://openapi.jtjms-sa.com/openplatformweb/mock/waybill/printOrder"
    ),

    // Waybill information
    'UrlWaybillInformation' => env(
        'JT_EXPRESS_URL_WAYBILL_INFORMATION',
        config('JtExpress.URL') . 'order/addOrder' ?? "https://openapi.jtjms-sa.com/openplatformweb/mock/waybill/getWaybillInfoo"
    ),

    // Logistics track query
    'UrlLogisticsTrackQuery' => env(
        'JT_EXPRESS_URL_LOGISTICS_TRACK_QUERY',
        config('JtExpress.URL') . 'order/addOrder' ?? "https://openapi.jtjms-sa.com/openplatformweb/mock/logistics/trace"
    ),

    // Logistics track subscription
    'UrlLogisticsTrackSubscription' => env(
        'JT_EXPRESS_URL_LOGISTICS_TRACK_SUBSCRIPTION',
        config('JtExpress.URL') . 'order/addOrder' ?? "https://openapi.jtjms-sa.com/openplatformweb/mock/logistics/subscribe"
    ),

    // Sender Information
    'sender' => [
        'area'        => 'حي الزهور',
        'street'      => 'street122',
        'city'        => 'الزقازيق',
        'mobile'      => '1441234567843543543554311143',
        'mailBox'     => 'ant_li12345678901234567890@qq.com',
        'phone'       => '1441234567843543543554311143',
        'countryCode' => 'MEX',
        'name'        => 'sender TEST',
        'company'     => 'company TEST',
        'postCode'    => '16880',
        'prov'        => 'الشرقية',
        'areaCode'    => '324234',
        'building'    => '13',
        'floor'       => '25',
        'flats'       => '47'
    ],
    'currency'        => 'SAR',
    'platformName'    => 'JABAL',
    'isUnpackEnabled' => 0,
    'expressType'     => 'EZKSA'

];
