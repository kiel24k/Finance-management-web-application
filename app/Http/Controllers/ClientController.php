<?php

namespace App\Http\Controllers;

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

    public function addBalance(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);
       
        $userId = Auth::user()->id;
        $balanceId = UserBalance::where('user_id', $userId)->pluck('id');
        $userBalance = UserBalance::find($balanceId);
        $userBalance->user_id = $userId;
        $userBalance->amount = $request->amount;
        $userBalance->date = $request->date;
        $userBalance->update();
        return response()->json($userBalance);
    }
}
