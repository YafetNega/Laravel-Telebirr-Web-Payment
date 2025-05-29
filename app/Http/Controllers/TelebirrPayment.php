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
        $PUBLICKEY = "";
        $APPKEY = "";
        $APPID = "";
        $SHORTCODE = "";
        $API = "https://app.ethiomobilemoney.et:2121/ammapi/payment/service-openup/toTradeWebPay";
        $NOTIFYURL = "";
        $RETURNURL = "";
        $TIMEOUT = '30';
        $RECIVER = "";
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
