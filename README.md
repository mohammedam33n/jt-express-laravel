# Shipping Package With Laravel
Package shipping / integrate with J&T Express Company For shipping services


# Hi, I'm Amin! 👋

## 🚀 About Me
I'm a web developer ...

## Installation
Install with composer

```bash
composer require Amin/jt-express-laravel
```

Add service Providor in config/app.php

```bash
\Amin\JtExpressLaravel\JtExpressServiceProvider::class,
```


## Environment Variables

To run this package, you will need to add the following environment variables to your .env file

`API_ACCOUNT`

`JT_EXPRESS_URL`

`sender`

run command:
```bash
 php artisan vendor:publish --tag=JtExpress-package-config
```
## How to use ?


### create order:
- this function to create order , just pass following params:

```bash
    $shipping = new JtExpress();
    $shipping->createOrder($data);
    
    $data = [
        'customerCode'=> 'test102',
        'digest'=> 'sdsd499',
        'length'=> '20',
        'sendStartTime'=> '2021-12-03 10:02:50',
        'weight'=> '20',
        'billCode'=> '9ui8',
        'txlogisticId'=> '243n3k409j',
        'totalQuantity'=> '10',
        'receiver'=> [
            'area'=> 'sdfdsafdsfdsafdsa1',
            'address'=> 'sdfsacdscdscds2a',
            'town'=> '',
            'street'=> '',
            'city'=> 'Abu Ajram',
            'mobile'=> '1441234567843543543554311143',
            'mailBox'=> 'ant_li123@qq.com',
            'phone'=> '1441234567843543543554311143',
            'countryCode'=> 'KSA',
            'name'=> 'test_receiver',
            'company'=> 'guangdongshengshenzhenshizhuantayigeyidia nzishiyeyouxianggongsi',
            'postCode'=> '518000',
            'prov'=> 'Al Jawf'
        ],
        'itemsValue'=> '100',
        'width'=> '23',
        'items'=> [
            ['number'=> 1, 'itemType'=> 'ITN1', 'itemName'=> '服饰123456test', 'priceCurrency'=> 'DHS', 'itemValue'=> '12.36', 'itemUrl'=> 'http://www.baidu.com/shangpinlianjiedizhi', 'desc'=> 'test_ordermiaoshu'],
            ['number'=> 1, 'itemType'=> 'ITN1', 'itemName'=> '服饰123456test', 'priceCurrency'=> 'DHS', 'itemValue'=> '12.36', 'itemUrl'=> 'http://www.baidu.com/shangpinlianjiedizhi', 'desc'=> 'test_ordermiaoshu'],
            ['number'=> 1, 'itemType'=> 'ITN1', 'itemName'=> '服饰123456test', 'priceCurrency'=> 'DHS', 'itemValue'=> '12.36', 'itemUrl'=> 'http://www.baidu.com/shangpinlianjiedizhi', 'desc'=> 'test_ordermiaoshu'],
            ['number'=> 1, 'itemType'=> 'ITN1', 'itemName'=> '服饰123456test', 'priceCurrency'=> 'DHS', 'itemValue'=> '12.36', 'itemUrl'=> 'http://www.baidu.com/shangpinlianjiedizhi', 'desc'=> 'test_ordermiaoshu'],
        ],
        'sendEndTime'=> '2021-12-05 10:02:50',
        'height'=> '10',
    ];

```

This function will return object.


### checking order:
- this function to checking order , just pass following params:

```bash
    $shipping = new JtExpress();
    $shipping->checkingOrder($command = 1, $serialNumber, $customerCode, $digest);
        
    $orderType    = 1;
    $txlogisticId = 'EGYUAT73577596805';
    $reason       = 'reason description';
    $customerCode = 'J0086024194';
    $digest       = 'U40e5sumorgd3YgZzU61Mw==';

```
This function will return object.


### checking order:
- this function to checking order , just pass following params:

```bash
    $shipping = new JtExpress();
    $shipping->checkingOrder($command = 1, $serialNumber, $customerCode, $digest);

    $command      = 1;
    $serialNumber = ['EGYUAT81235870018'];
    $customerCode = 'J0086024138';
    $digest       = 'wapT8IYOjNeViOL5eZupEg==';


```

This function will return object.


### cancel order:
- this function to cancel order , just pass following params:

```bash
    $shipping = new JtExpress();
    $shipping->cancelOrder($orderType, $txlogisticId, $reason, $customerCode, $digest);

    $orderType    = 1;
    $txlogisticId = 'EGYUAT73577596805';
    $reason       = 'resoun ';
    $customerCode = 'J0086024194';
    $digest       = 'U40e5sumorgd3YgZzU61Mw==';

```

This function will return object.


### waybill Information:
- this function to get waybill Information , just pass following params:

```bash
    $shipping = new JtExpress();
    $shipping->waybillInformation($digest, $customerCode, $waybillNos);

    $digest       = 'U40e5sumorgd3YgZzU61Mw==';
    $customerCode = 'J0086024194';
    $waybillNos   = ['UEG000000313474'];
```

This function will return object.


### logistics Track Inquiry:
- this function to get logistics Track Inquiry , just pass following params:

```bash
    $shipping = new JtExpress();
    $shipping->logisticsTrackInquiry($digest, $billCodes);

    $digest    = 'U40e5sumorgd3YgZzU61Mw==';
    $billCodes = 'UEG000000190252';
```

This function will return object.


## Support
For support, email mohamm3dameen@gmail.com 

