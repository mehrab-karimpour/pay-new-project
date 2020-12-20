<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\amount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
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
        $amount = @number_format(amount::first()->amount);

        $active = 'amount';
        return view('admin.amount', compact('active', 'amount'));
    }

    public function editAmount(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric'
        ]);

        $amount = amount::firstOrNew([
            'title' => 'amount-cart',
        ]);
        $amount->amount = $request->amount;
        $amount->save();
        return back();
    }

    public function delete(Request $request)
    {
        try {
            User::where('id', $request->user_id)->delete();
            return response()->json(['status'=> 'success']);
        } catch (\Exception $e) {
            return response()->json(['status'=> 'error']);
        }
    }

}
