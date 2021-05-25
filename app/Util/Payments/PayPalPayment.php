<?php

namespace App\Util\Payments;

use Illuminate\Support\Facades\Config;
use App\Interfaces\PaymentMethod;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

class PayPalPayment implements PaymentMethod
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('services.paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret'],
            )
        );
    }

    public function pay($amount, $currency,  $callBackUrl, $cancelUrl)
    {
        $payment = $this->setPayment($amount, $currency,  $callBackUrl, $cancelUrl);
        $status = $this->createPayment($payment);

        return $status;
    }

    private function setPayment($amount, $currency, $callBackUrl, $cancelUrl)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        
        $amount = $this->setAmount($amount, $currency);

        $transaction = $this->createTransaction($amount);

        $redirectUrls = $this->setRedirectURLs($callBackUrl, $cancelUrl);
        
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        return $payment;
    }

    private function createPayment($payment)
    {
        $status = [];

        try {
            $payment->create($this->apiContext);
            $approvalLink = $payment->getApprovalLink();

            $status['state'] = 'success';
            $status['approvalLink'] = $approvalLink;
            $status['error'] = '';
        }
        catch (PayPalConnectionException $ex) {
            $status['state'] = 'failure';
            $status['approvalLink'] = '';
            $status['error'] = $ex->getData();
        }

        return $status;
    }

    public function getStatus($request)
    {
        $status = [];

        $reqParams = $request->all();
        $paymentId = $reqParams['paymentId'];
        $payerId = $reqParams['PayerID'];
        $token = $reqParams['token'];

        if (!$paymentId || !$payerId || !$token) {
            $status['state'] = "failure";
            $status['message'] = "F";
            $status['result'] = '';
        }
        else {
            $payment = Payment::get($paymentId, $this->apiContext);
            
            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);
            
            $result = $payment->execute($execution, $this->apiContext);
            
            if ($result->getState() === 'approved') {
                $status['state'] = 'success';
                $status['message'] = 'Yess';
                $status['result'] = $this->setResultData($result);
            }
        }

        return $status;
    }

    private function setResultData($result)
    {
        $resultData = [
            'id' => $result->getId(),
            'state' => $result->getState(),
            'payer' => $result->getPayer()
                ->getPayerInfo(),
            'transaction' => $result->getTransactions()[0]
                ->getAmount(),
            'date' => $result->getCreateTime()
        ];
        return $resultData;
    }

    private function setAmount($totalAmount, $currency)
    {
        $amount = new Amount();
        $amount->setTotal($totalAmount);
        $amount->setCurrency($currency);

        return $amount;
    }

    private function createTransaction($amount)
    {
        $transaction = new Transaction();
        $transaction->setAmount($amount);

        return $transaction;
    }

    private function setRedirectURLs($callBackUrl, $cancelUrl)
    {
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callBackUrl)
            ->setCancelUrl($cancelUrl);

        return $redirectUrls;
    }
}