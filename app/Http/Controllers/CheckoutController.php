<?php

namespace App\Http\Controllers;

use App\Models\AmountToConnect;
use App\Models\Connect;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use League\Uri\QueryString;
use Str;

class CheckoutController extends Controller
{
    //
    public function checkout(Request $request)
    {
        // dd($request);
        $request->validate([
            "amount" => "required|decimal:0,2",
            'user_id' => 'required',
            'connect' => 'required'
        ]);
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $_POST['amount']; // Số tiền thanh toán
        $vnp_Locale = "vn"; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = "NCB"; //Mã phương thức thanh toán
        $vnp_IpAddr = '127.0.0.1'; //IP Khách hàng thanh toán
        $vnp_TmnCode = "OM89333P"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "9OZI992KLIH64D8WVRJYQBPVWSMD86N3"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // $vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
        $vnp_Returnurl = config('services.returnUrl');
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        // $startTime = date("YmdHis");
        // $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef . '+' . $request->user_id . '+' . $request->connect,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef . '+' . $request->user_id . '+' . $request->connect,
            // "vnp_ExpireDate" => $expire
        );
        // dd($inputData);
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function result(Request $request)
    {
        // dd($request);
        // return view('')
        // vnp_Amount=2000000
        // vnp_TransactionStatus=00
        // vnp_TxnRef=7090
        $request->validate(
            [
                'vnp_Amount' => 'required',
                'vnp_TransactionStatus' => 'required',
                'vnp_TxnRef' => 'required'
            ]
        );

        $vnp_Transaction = $request->query('vnp_TransactionStatus');
        if ($vnp_Transaction !== '00') {
            return view('connect.ResultFailed');
        }
        $requestArr = explode('+', $request->query('vnp_TxnRef'));
        $transaction_id = implode('', $requestArr);
        $check = Transaction::where('transaction_id', '=', $transaction_id)->exists();
        if ($check) {
            return redirect(route('checkout.get'));
        }
        $amount = $request->query('vnp_Amount') / 100;
        $user_id = $requestArr[1];
        $addConnect = $requestArr[2];
        $connect = Connect::where('user_id', '=', $user_id)->get();
        // dd($connect);
        Transaction::create([
            'transaction_id' => $transaction_id,
            "amount" => $addConnect,
            "user_id" => $user_id,
            "amount_from" => $connect[0]['connect_quantity'],
            "amount_to" => $connect[0]['connect_quantity'] + $addConnect,
        ]);
        $updated = Connect::where('user_id', '=', $user_id)->update(['connect_quantity' => ($connect[0]['connect_quantity'] + $addConnect)]);
        return view('connect.ResultSuccess');
        // return redirect(route())
    }
}

// vnp_Amount=1000000
// &vnp_BankCode=NCB
// &vnp_BankTranNo=VNP15313407
// &vnp_CardType=ATM
// &vnp_OrderInfo=Thanh+toan+GD%3A776
// &vnp_PayDate=20251201212606
// &vnp_ResponseCode=00
// &vnp_TmnCode=OM89333P
// &vnp_TransactionNo=15313407
// &vnp_TransactionStatus=00
// &vnp_TxnRef=776
// &vnp_SecureHash=dd5894f4c27fd743ad8a0e9cc24aaafd286b99f8a03be1eb85611f2f02d376ef16db6e88827d2fd5a85f8eff908158b1686a697e6409600e350ec46f020fc113