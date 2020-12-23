<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\amount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class panelController extends Controller
{
    public function index()
    {

        $users = User::role('user')->orderByDesc('id')->paginate(15);
        $active = 'users';
        return view('admin.users', compact('active', 'users'));
    }

    public function changeAmountCart()
    {
        $amountCart = amount::where('title', 'amount-cart')->first();
        $amountMessage = amount::where('title', 'amount-message')->first();

        $active = 'amount';
        return view('admin.amount', compact('active', 'amountCart', 'amountMessage'));
    }

    public function editAmount(Request $request)
    {

        $this->validate($request, [
            'amount' => 'required|numeric'
        ]);


        $amount = DB::table('amounts')->where('title', '=', $request->type)->count();

        if ($amount < 1) {
            DB::insert('insert into amounts (title,amount) VALUES (?,?)', [$request->type, $request->amount]);
            echo "ok";
        } else {
            try {
                DB::table('amounts')->where('title', '=', $request->type)->update([
                    'amount' => $request->amount,
                ]);
            } catch (\Exception $e) {
                Log::error($e);
            }
        }

        return back();
    }

    public function delete(Request $request)
    {
        try {
            User::where('id', $request->user_id)->delete();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error']);
        }
    }

    public function editUser(Request $request)
    {
        return response()->json(['user' => User::where('id', $request->user_id)->first()]);
    }


    public function goEditUser(Request $request)
    {
        $name = $request->data[1]['value'];
        $lastName = $request->data[2]['value'];
        $nationalCode = $request->data[3]['value'];
        $birthDate = $request->data[4]['value'];
        $mobile = $request->data[5]['value'];
        $password = $request->data[6]['value'];

        if ($password === '') {
            $user = User::where('id', '=', $request->user_id)->update([
                'name' => $name,
                'lastName' => $lastName,
                'nationalCode' => $nationalCode,
                'birthDate' => $birthDate,
                'mobile' => $mobile,
            ]);
        } else {
            $user = User::where('id', '=', $request->user_id)->update([
                'name' => $name,
                'lastName' => $lastName,
                'nationalCode' => $nationalCode,
                'birthDate' => $birthDate,
                'mobile' => $mobile,
                'password' => Hash::make($password)
            ]);
        }


    }

}
