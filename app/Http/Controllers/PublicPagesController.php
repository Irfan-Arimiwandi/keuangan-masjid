<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;

class PublicPagesController extends Controller
{
    public function donate()
    {
        $bankAccounts = BankAccount::where('is_active', BankAccount::STATUS_ACTIVE)->get();

        return view('guest.donate', compact('bankAccounts'));
    }

    public function index()
    {
        $bankAccounts = BankAccount::where('is_active', BankAccount::STATUS_ACTIVE)->get();

        return view('guest.welcome', compact('bankAccounts'));
    }

}
