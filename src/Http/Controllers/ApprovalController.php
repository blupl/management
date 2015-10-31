<?php namespace Blupl\Management\Http\Controllers;

use Blupl\Management\Model\Management;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Orchestra\Foundation\Http\Controllers\AdminController;
use Orchestra\Support\Facades\Mail as Mailer;


class ApprovalController extends AdminController
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
     * Get landing page.
     *
     * @return mixed
     */
    public function index(Management $management)
    {
        return view('blupl/management::approval.home-approval', compact('management'));

    }


    /**
     * Show a role.
     */
    public function show($member, Request $request)
    {
//        $members = Management::where('status', '=', 0)->paginate(15);
        if($request->has('column') && $request->has('value')) {
            $members = Management::where($request->get('column'), 'like', $request->get('value'))->where('status', '=', 0)->paginate(15);
        } else {
            $members = Management::where('status', '=', 0)->paginate(15);
        }
        return view('blupl/management::approval.list', compact('members'));
    }

    public function showReporter($memberID)
    {
        $member = Management::find($memberID);


        if($member != null && $member->status == 0) {
            return view('blupl/management::member', compact('member'));
        }else {
            if($member->status == 1) {
                $massage = "Already Approve";
            } else {
                $massage = "Reporter Not Found";
            }
            Flash::error($massage);
            return $this->redirect(handles('blupl/management::approval'));
        }
    }



    /**
     * Update the role.
     * @return mixed
     */
    public function update($memberId, Request $request)
    {
        $member = Management::find($memberId);

        if ($member->status == 0) {
                foreach ($request->zone as $key => $zone) {
                    $member->zone()->create(['zone'=>$zone]);
                }
                $member->grade()->create(['grade'=>$request->grade, 'number'=>$request->number]);
                $member->status = 1;
                $member->save();
        }else {
            if($member->status == 1) {
                $massage = "Already Approve";
            } else {
                $massage = "Reporter Not Found";
            }
            Flash::error($massage);
            return $this->redirect(handles('blupl/management::approval'));
        }

        Mailer::send('blupl/management::email.update', ['yoo'=>'Yoo'], function ($m) use ($member) {
            $m->to($member->email);
            $m->from('info@accreditationbd.com');
            $m->subject('Thank you for your Registration');
        });
        Flash::success($member->name.' Approved Successfully');
        return $this->redirect(handles('blupl/management::approval/all'));

    }

    public function batchApproval(Request $request)
    {
        foreach ($request->member as $member) {
            $members[] = Management::find($member);
        }
        return view('blupl/management::approval.batch', compact('members'));
    }

    public function storeBatchApproval(Request $request)
    {
        foreach($request->member as $member) {
            $member = Management::find($member);
            if ($member->status == 0) {
                foreach ($request->zone as $key => $zone) {
                    foreach ($request->zone as $key => $zone) {
                        $member->zone()->create(['zone'=>$zone]);
                    }
                    $member->grade()->create(['grade'=>$request->grade, 'number'=>$request->number]);
                    $member->status = 1;
                    $member->save();
                }
            }
        }
        Flash::success(' Approved Successfully');
        return $this->redirect(handles('blupl/management::approval/all'));

    }

    public function archive($memberId)
    {
        $member = Management::find($memberId);
        $member->status = '3';
        $member->save();
        return $this->redirect(handles('blupl/management::approval/all'));

    }

    public function pdf($memberID)
    {
        $member = Management::find($memberID)->toArray();
        $pdf = App::make('dompdf');
        $pdf->loadView('blupl/management::printing._print-single', $member);

        return $pdf->stream();
    }


}
