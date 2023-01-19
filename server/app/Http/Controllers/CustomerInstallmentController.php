<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class CustomerInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $installmentsGroupByCustomer = [];

        $customerInstallments = DB::table('installments')
            ->join('customers', 'installments.customer_id', 'customers.id')
            ->select('customers.id as customer_id', 'customers.name', 'installments.amount', 'installments.expire_date', 'installments.note')
            ->get();


        foreach ($customerInstallments as $k => $v) {


            if (!isset($installmentsGroupByCustomer[$v->name])) :
                $installmentsGroupByCustomer[$v->name] = [];
            endif;

            if (isset($installmentsGroupByCustomer[$v->name])) :

                $installmentsGroupByCustomer[$v->name][] = $v;

            endif;
        }

        return response()->json(['customer_installments' => $installmentsGroupByCustomer], 200);
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
}
