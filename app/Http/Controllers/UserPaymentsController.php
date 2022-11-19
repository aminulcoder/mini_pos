<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Session;

class UserPaymentsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'payments';
    }

    public function index($id)
    {
        $this->data['user']     = User::findOrFail($id);

        return view('users.payments.payments', $this->data);
    }


    /**
     * Add new Payment
     * @param  PayemntRequest 	$request
     * @param  int         		$user_id
     */
    public function store(PaymentRequest $request, $user_id)
    {
        $formData            = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        if (Payment::create($formData)) {
            Session::flash('message', 'Payment Added Successfully');
        }

        return redirect()->route('user.payments', ['id' => $user_id]);
    }


    /**
     * Delete a payment
     * @param  int $user_id
     * @param  int $payment_id
     */
    public function destroy($user_id, $payment_id)
    {
        if (Payment::destroy($payment_id)) {
            Session::flash('message', 'Payment Deleted Successfully');
        }

        return redirect()->route('user.payments', ['id' => $user_id]);
    }

}
