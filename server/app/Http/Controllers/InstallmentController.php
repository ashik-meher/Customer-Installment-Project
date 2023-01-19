<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $installments = DB::table('installments')->orderByDesc('id')->get();

        return response()->json(['installments' => $installments], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        $customerId = $request->input('customer_id');
        $installments = $request->input('installments');

        if (empty($customerId) || gettype($customerId) != 'integer') {
            return response()->json(['message' => 'Customer ID required'], 200);
        }

        if (count($installments) < 2) {
            return response()->json(['message' => 'Select at least 2 installments'], 200);
        }



        foreach ($installments as $key => $installment) {

            $preparedInstallment = Installment::create([

                'amount' => $installment['amount'],
                'expire_date' => $installment['expireDate'],
                'note' => $installment['note'],
                'customer_id' => $customerId

            ]);

            $preparedInstallment->save();
        }

        return response()->json(['message' => 'Installments Created Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function custom($id)
    {
        return $id;
    }
}
