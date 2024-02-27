<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Telebirr;
use App\Models\Form;


class TelebirrPayment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tele-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Form validation
        $this->validate($request, [
            'fullname' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'student_id' => 'required',
            'totalAmount'=>'required',
            'subject' => 'required'
        ]);

        //  Store data in database
        Form::create($request->all());

        require '../vendor/autoload.php';
        $PUBLICKEY = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4OmnA3LBGUFet0jqpiMpvceQqvM3OXfjgeiBqhT8x5jwqD4CevZ7BaZDlucS+AOHUjHSgMYD8BZ6dGa6tjbA+cMj87ONX6+QFfWCfgTD8ZjPxttg8+yc1zibIdo6OwMVZPd2UQdPLBRVskCJtCscl0Z5n7oFSFjDB9fNkORIkiovyos0AfE2i88LBmF2+EgdFC/lB4ZusRzn/+CZe6S6QVaXoI9GQDlQq52vsqspDQk/Mwe4eILpcw/ZCBE+Dk9IwvtR6gVSKA15nMqUxZ3dgDFgm16H2dS8lzIJyIjH8fo/q1yfLJo+XE+i8aFCC0HOmzeUuDBsiihRWWRR53odTwIDAQAB";
        $APPKEY = "357fd1653ea34d9f8b07c5549521f182";
        $APPID = "8de94201485245ea863f070a4dbba8ef";
        $SHORTCODE = "500284";
        $API = "https://app.ethiomobilemoney.et:2121/ammapi/payment/service-openup/toTradeWebPay";
        $NOTIFYURL = "https://pay.actamericancollege.com/notifyUrl.php";
        $RETURNURL = "https://pay.actamericancollege.com/";
        $TIMEOUT = '30';
        $RECIVER = "American College ACT";
        $totalAmount = $_POST["totalAmount"];
        $subject = $_POST["subject"];

        $pay1 = new Telebirr(
            $PUBLICKEY,
            $APPKEY,
            $APPID,
            $API,
            $SHORTCODE,
            $NOTIFYURL, 
            $RETURNURL,
            $TIMEOUT,
            $RECIVER,
            $totalAmount,
            $subject
        );
        return redirect()->to($pay1->getPyamentUrl())->send();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
