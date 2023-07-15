<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest; // 导入 BookRequest 模型

class BookRequestController extends Controller
{


    public function store(Request $request)
    {
        $validated = $request->validate([
            'aliasname' => 'required|alpha_num|min:6',
            'mobile' => 'required|digits:8',
            'email' => 'required|email',
            'book_name' => 'required|string|min:10',
            'pickup_date' => 'required|date',
        ]);

        $bookrequest = new BookRequest($validated);
        $bookrequest->save();

        return back()->with('success', 'Book request has been created successfully.');
    }


}
