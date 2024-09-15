<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function currentBalance(Request $request)
    {
        $currentBalance =  UserBalance::where('user_id', $request->id)->get();
        return response()->json($currentBalance);
    }


    public function updateBalance(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        $userId = Auth::user()->id;
        $balanceId = UserBalance::where('user_id', $userId)->pluck('id');
        try {
            $userBalance = UserBalance::find($balanceId[0]);
            $userBalance->user_id = $userId;
            $userBalance->amount = $request->amount;
            $userBalance->date = $request->date;
            $userBalance->update();
            return response()->json($userBalance);
        } catch (\Throwable $th) {
            $newBalance = new UserBalance();
            $newBalance->user_id = $userId;
            $newBalance->amount = $request->amount;
            $newBalance->date = $request->date;
            $newBalance->save();
            return response()->json($newBalance);
        }
    }
    public function getUserBalance()
    {
        $userBalance = User::find(Auth::user()->id);
        return response()->json([
            $userBalance->userBalanceId
        ]);
    }
}
