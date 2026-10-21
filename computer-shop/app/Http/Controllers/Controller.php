<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index()
    {
        // 1. Fetch all OMIT programs/tracks for the Spec-Matcher dropdown
        $programs = DB::table('omit_programs')->get();

        // 2. Fetch all products joined with their recommended OMIT program & key software
        $products = DB::table('products')
            ->join('omit_programs', 'products.program_id', '=', 'omit_programs.program_id')
            ->select(
                'products.*',
                'omit_programs.course_code',
                'omit_programs.track_code',
                'omit_programs.track_name',
                'omit_programs.key_software'
            )
            ->orderBy('products.iskolar_price', 'asc')
            ->get();

        return view('shop.index', compact('programs', 'products'));
    }

    public function reserve(Request $request)
    {
        $request->validate([
            'student_number' => 'required|string|max:20',
            'full_name'      => 'required|string|max:100',
            'pup_webmail'    => 'required|email|max:100',
            'year_section'   => 'required|string|max:20',
            'product_id'     => 'required|integer',
            'final_price'    => 'required|numeric',
            'payment_option' => 'required|string',
        ]);

        // 1. Insert or update the student inside `users`
        DB::table('users')->updateOrInsert(
            ['student_number' => $request->student_number],
            [
                'full_name'    => $request->full_name,
                'pup_webmail'  => $request->pup_webmail,
                'year_section' => $request->year_section,
                'program_id'   => $request->program_id,
            ]
        );

        $user = DB::table('users')->where('student_number',$request->student_number)->first();

        // 2. Generate a unique Pickup Reference Code and save to `orders`
        $referenceCode = 'COMMIT-' . strtoupper(Str::random(4)) . rand(10, 99);

        DB::table('orders')->insert([
            'reference_code' => $referenceCode,
            'user_id'        => $user->user_id,
            'product_id'     => $request->product_id,
            'quantity'       => 1,
            'final_price'    => $request->final_price,
            'payment_option' => $request->payment_option,
            'order_status'   => 'Reserved for Pickup',
        ]);

        // 3. Decrement stock by 1
        DB::table('products')->where('product_id', $request->product_id)->decrement('stock_qty', 1);

        return redirect()->route('shop.index')->with([
            'success'        => "Show your PUP ID at the Pureza Pickup Hub to claim your unit ({$request->payment_option}).",
            'reference_code' => $referenceCode,
        ]);
    }
}