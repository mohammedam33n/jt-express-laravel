<?php


namespace Gouda\JtExpressLaravel;


class JtExpress
{
    public $apiAccount;
    public $jtExpressUrl;
    public $sender;
    public $currency;
    public $platformName;
    public $isUnpackEnabled;
    public $expressType;

    public function __construct()
    {
        $this->apiAccount = config('JtExpress.apiAccount');
        $this->jtExpressUrl = config('JtExpress.jtExpressUrl');
        $this->sender = config('JtExpress.sender');
        $this->currency = config('JtExpress.currency');
        $this->platformName = config('JtExpress.platformName');
        $this->isUnpackEnabled = config('JtExpress.isUnpackEnabled');
        $this->expressType = config('JtExpress.expressType');
    }

    public function createOrder($data, $serviceType = '01', $orderType = '2', $deliveryType = '04')
    {
        $baseData = [
            'serviceType' => $serviceType,
            'orderType' => $orderType,
            'deliveryType' => $deliveryType,
            'expressType' => $this->expressType,
            'network' => '',
            'batchNumber' => '',
            'goodsType' => 'ITN1',
            'sender' => $this->sender,
            'priceCurrency' => $this->currency,
            'payType' => 'PP_PM',
            'operateType' => 1,
            'platformName' => $this->platformName,
            'isUnpackEnabled' => $this->isUnpackEnabled
        ];

        $bizContent = json_encode(array_merge($data, $baseData));

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->jtExpressUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'apiAccount:' . $this->apiAccount,
                'digest:' . $data['digest'],
                'timestamp:1638428570653'
            ));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
                'bizContent' => $bizContent
            ));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if (curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);

            return json_decode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkingOrder(
        $command = 1,
        $serialNumber,
        $customerCode,
        $digest
    ) {


        $url = config('JtExpress.UrlCheckingOrder');

        $curl = curl_init();

        // Prepare the headers
        $headers = [
            'apiAccount:' . $this->apiAccount,
            'digest:' . $digest,
            'timestamp:' . strtotime("now")
        ];


        $body = [
            'bizContent' => json_encode(
                [
                    'command'      => $command,
                    'serialNumber' => $serialNumber,
                    'customerCode' => $customerCode,
                    'digest'       => $digest
                ]
            ),
        ];

        try {
            curl_setopt($curl, CURLOPT_URL,  $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($curl);
            if (curl_errno($curl)) {
                return curl_error($curl);
            }
            curl_close($curl);

            return json_decode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }





    public function cancelOrder(
        $orderType = 1,
        $txlogisticId,
        $reason,
        $customerCode,
        $digest
    ) {


        $url  = config('JtExpress.UrlCancelOrder');
        $curl = curl_init();

        // Prepare the headers
        $headers = [
            'apiAccount:' . $this->apiAccount,
            'digest:' . $digest,
            'timestamp:' . strtotime("now")
        ];


        $body = [
            'bizContent' => json_encode([
                'txlogisticId' => $txlogisticId,
                'orderType'    => $orderType,
                'reason'       => $reason,
                'customerCode' => $customerCode,
                'digest'       => $digest
            ]),
        ];


        try {
            // $ch = curl_init();
            curl_setopt($curl, CURLOPT_URL,  $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt(
                $curl,
                CURLOPT_POSTFIELDS,
                $body
            );
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($curl);
            if (curl_errno($curl)) {
                return curl_error($curl);
            }
            curl_close($curl);

            return json_decode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function waybillModel(
        $customerCode,
        $digest,
        $billCode,
        $printSize = 0,
        $printCod = 0

    ) {

        $url  = config('JtExpress.UrlWaybillModel');
        $curl = curl_init();

        // Prepare the headers
        $headers = [
            'apiAccount:' . $this->apiAccount,
            'digest:' . $digest,
            'timestamp:' . strtotime("now")
        ];


        $body = [
            'bizContent' => json_encode([
                'customerCode' => $customerCode,
                'digest'       => $digest,
                'billCode'     => $billCode,
                'printSize'    => $printSize,
                'printCod'     => $printCod
            ]),
        ];


        try {
            curl_setopt($curl, CURLOPT_URL,  $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt(
                $curl,
                CURLOPT_POSTFIELDS,
                $body
            );
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($curl);
            if (curl_errno($curl)) {
                return curl_error($curl);
            }
            curl_close($curl);

            return json_decode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function waybillInformation(
        $digest,
        $customerCode,
        $waybillNos
    ) {


        $url  = config('JtExpress.UrlWaybillInformation');
        $curl = curl_init();

        // Prepare the headers
        $headers = [
            'apiAccount:' . $this->apiAccount,
            'digest:' . $digest,
            'timestamp:' . strtotime("now")
        ];


        $body = [
            'bizContent' => json_encode([
                'customerCode' => $customerCode,
                'waybillNos'   => $waybillNos
            ]),
        ];


        try {
            // $ch = curl_init();
            curl_setopt($curl, CURLOPT_URL,  $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt(
                $curl,
                CURLOPT_POSTFIELDS,
                $body
            );
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($curl);
            if (curl_errno($curl)) {
                return curl_error($curl);
            }
            curl_close($curl);

            return json_decode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function logisticsTrackInquiry(
        $digest,
        $billCodes
    ) {


        $url  = config('JtExpress.UrlLogisticsTrackQuery');
        $curl = curl_init();

        // Prepare the headers
        $headers = [
            'apiAccount:' . $this->apiAccount,
            'digest:' . $digest,
            'timestamp:' . strtotime("now")
        ];


        $body = [
            'bizContent' => json_encode([
                'billCodes' => $billCodes,
            ]),
        ];


        try {
            curl_setopt($curl, CURLOPT_URL,  $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt(
                $curl,
                CURLOPT_POSTFIELDS,
                $body
            );
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($curl);
            if (curl_errno($curl)) {
                return curl_error($curl);
            }
            curl_close($curl);

            return json_decode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function logisticsTrackSubscription(
        $digest,
        $data
    ) {

        $url  = config('JtExpress.UrlLogisticsTrackSubscription');
        $curl = curl_init();

        // Prepare the headers
        $headers = [
            'apiAccount:' . $this->apiAccount,
            'digest:' . $digest,
            'timestamp:' . strtotime("now")
        ];

        $body = [
            'bizContent' => json_encode($data),
        ];


        try {
            // $ch = curl_init();
            curl_setopt($curl, CURLOPT_URL,  $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt(
                $curl,
                CURLOPT_POSTFIELDS,
                $body
            );
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($curl);
            if (curl_errno($curl)) {
                return curl_error($curl);
            }
            curl_close($curl);

            return json_decode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
