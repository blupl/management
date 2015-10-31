<?php namespace Blupl\Management\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Blupl\Management\Model\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Orchestra\Foundation\Http\Controllers\AdminController;

class PrintingController extends AdminController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function setupFilters()
    {
        $this->beforeFilter('control.csrf', ['only' => 'delete']);
    }

    /**
     * Get landing pages
     * @return mixed
     */
    public function index(Request $request)
    {
        if($request->has('column') && $request->has('value')) {
            $members = Management::where($request->get('column'), 'like', $request->get('value'))->where('status', '=', 1)->paginate(15);
        } else {
            $members = Management::where('status', '=', 1)->paginate(15);
        }
        return view('blupl/management::printing.list-printing', compact('members'));
    }

    /**
     * Show a role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function show($memberId)
    {
        $member = Management::find($memberId);
        return view('blupl/management::printing.print-single', compact('member'));
    }

    public function pdf($memberId)
    {
        $member = Management::find($memberId)->toArray();
        $pdf = App::make('dompdf');
        $pdf->setPaper('a7');
        $pdf->loadView('blupl/management::printing._print-single', $member);

        return $pdf->stream();
    }


    public function batchPrinting(Request $request)
    {
//        dd(Management::find($request->member[0])->zone);
        foreach($request->member as $member) {
            $mem = Management::find($member);
            $mem->zone= $mem->zone->toArray();
            $members[] = $mem->toArray();
        }
        $pdf = App::make('dompdf');
        $pdf->setPaper('a7');
        $pdf->loadView('blupl/management::printing._print-batch', compact('members'));

        return $pdf->stream();
    }




}
