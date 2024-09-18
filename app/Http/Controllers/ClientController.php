<?php

namespace App\Http\Controllers;

use App\Models\BudgetPlan;
use App\Models\Category;
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
    public function newCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->category_name = $request->category_name;
        $category->save();
        return response()->json($category);
    }
    public function categoryList()
    {
        $category = User::find(Auth::user()->id);
        return response()->json($category->userCategory);
    }
    public function newPlan(Request $request)
    {

        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'plan_name' => 'required',
            'target_date' => 'required',
            'amount' => 'required'
        ]);
        $budgetPlan = new BudgetPlan();
        $budgetPlan->user_id = Auth::user()->id;
        $budgetPlan->date = $request->date;
        $budgetPlan->category = $request->category;
        $budgetPlan->amount = $request->amount;
        $budgetPlan->description = $request->description;
        $budgetPlan->plan_name = $request->plan_name;
        $budgetPlan->target_date = $request->target_date;
        $budgetPlan->amount = $request->amount;
        $budgetPlan->save();

        return response()->json($budgetPlan);
    }
}
