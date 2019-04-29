<?php
namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Crud5Controller extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        $orders = Order::all();

        if ($request->ajax())
            return view('crud_5.index', compact(['customers', 'orders']));
        else
            return view('crud_5.ajax', compact(['customers', 'orders']));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('crud_5.form');
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('discover')
            ]);
        }
    }

    public function delete($id)
    {
        Customer::destroy($id);
        return redirect('/discover');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('crud_5.form', ['customer' => Customer::find($id)]);
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('discover')
            ]);
        }
    }
}