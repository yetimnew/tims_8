<?php

namespace App\Http\Controllers\HRM;

use Exception;
use Carbon\Carbon;
use App\Models\HRM\Leave;
use App\Models\HRM\Holiday;
use Illuminate\Http\Request;
use App\Models\HRM\LeaveType;
use App\Models\HRM\Personale;
use App\Models\Admin\EthioYear;
// use DateTime;
use App\Models\HRM\LeavePeriod;
use App\Models\Admin\EthioMonth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\EthDate;
use App\Models\HRM\LeaveEntitlement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with(['leave_type','personal'])->get();

        return view('hrm.leave.index')
        ->with('leaves', $leaves);
    }

    public function create()
    {
        $emp_details = DB::table('leave_entitlements')
    ->leftjoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
    ->select(
        'personales.firstname AS name',

        DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
        DB::raw('SUM(leave_entitlements.days_used) as days_used'),
        DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
               )
    ->where('personale_id' , Auth::user()->id)
    ->groupBy('personales.firstname')
    ->get();
    // dd(  $emp_details);
        $leave = new Leave;
        $leaves = LeaveEntitlement::all();
        $personals = Personale::active()->get();
        $leave_types = LeaveType::all();
        // $emp_details = "";
        $leave->start_date = '0000-00-00';
        $leave->end_date = '0000-00-00';
        $eth_year = EthioYear::all();
        $eth_month = EthioMonth::all();
        $eth_date = EthDate::all();

        return view('hrm.leave.create')
            ->with('leave', $leave)
            ->with('leaves', $leaves)
            ->with('personals', $personals)
            ->with('leave_types', $leave_types)
            ->with('emp_details', $emp_details)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }


    public function store(Request $request)
    {
        $employee_id =   Personale::where('id', $request->personale_id)->pluck('id')->first();
        $data = $request->validate([
            'personale_id' =>  'required|numeric',
            'leave_type_id_' =>  'required|numeric',
            'start_date' => 'required|date|unique:leaves,request_date',
            'end_date' => 'required|date|after:start_date|unique:leaves,request_date',
            // 'leave_period_id_' => 'required|numeric',
            'note' => '',
        ]);
        $auto_id = 0;
        if( Leave::all()->count()){
            $auto_id= Leave::max('auto_id');
            $auto_id += 1;
        }else{
            $auto_id=1;
        }

        $fdate = $request->start_date;
        $tdate = $request->end_date;
        $personale_id = $request->personale_id;
        $holydays = Holiday::all();
        $hodlyday_days = [];
        foreach($holydays as $hd){
            $hodlyday_days[] =   $hd->date;
        }
        $emp_details = DB::table('leave_entitlements')
            ->leftjoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->select(
                'personales.firstname AS name',
                DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
                DB::raw('SUM(leave_entitlements.days_used) as days_used'),
                DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
                    )
            ->where('personale_id', $personale_id)
            ->groupBy('personales.firstname')
            ->get();

        $datetime1 = Carbon::parse($fdate);
        $datetime2 = Carbon::parse($tdate );
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');


if(  $days < $emp_details[0]->remaing_date ){
    // dd("date comparison wokes");
    for ($i=0;  $i <=  $days  ; $i++) {
        $leave = new Leave;
        if( $i == 0 ){
                  $leave->request_date =   $datetime1;

        if( $datetime1->isWeekend()){
                $leave->length_hours =  0;
                $leave->length_days =  0;
            }else{
                $formatted_date = $datetime1->format("Y-m-d");
                if(in_array(  $formatted_date , $hodlyday_days)){
                    $leave->length_hours =  0;
                    $leave->length_days =  0;
                }
                else{
                    $leave->length_hours =  8;
                    $leave->length_days =  1;
                }

            }
        }else{
         $esti=    $leave->request_date =   $datetime1->addDay();
              if( $esti->isWeekend()){
                $leave->length_hours =  0;
                $leave->length_days =  0;
            }else{
                $formatted_date = $datetime1->format("Y-m-d");
                if(in_array(  $formatted_date , $hodlyday_days)){
                    $leave->length_hours =  0;
                    $leave->length_days =  0;
                }
                else{
                    $leave->length_hours =  8;
                    $leave->length_days =  1;
                }
            }
        }
        $leave->auto_id =   $auto_id ;
        $leave->status =  1;
        $leave->comment =  "sssssssss";
        $leave->personale_id = $request->personale_id;
        $leave->leave_type_id = $request->leave_type_id_;
        $leave->start_time = 8;
        $leave->end_time = 8;
        $leave->save();
    }

        Session::flash('success',  'Registered successfully');
        return redirect()->route('leave.index');
}else{
    Session::flash('error',  'Requested date above the given date');
    return redirect()->back();
}
    }
    public function edit($id)
    {
        // dd($id);
        $leave = Leave::findOrFail($id);
        // dd($leave);
        $personals = Personale::all();
        $leave_types = LeaveType::all();
        $leave_periods = LeavePeriod::all();
        $eth_year = EthioYear::all();
        $eth_month = EthioMonth::all();
        $eth_date = EthDate::all();
        return view('hrm.leave.edit')
            ->with('leave', $leave)
            ->with('personals', $personals)
            ->with('leave_types', $leave_types)
            ->with('leave_periods', $leave_periods)
            ->with('eth_year', $eth_year)
            ->with('eth_month', $eth_month)
            ->with('eth_date', $eth_date);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'personale_id' =>  'required|numeric',
            'no_of_days' =>  'required|min:1|max:100',
            'leave_type_id_' => 'required|numeric',
            'days_used' => 'required|numeric',
            'note' => '',
            'leave_period_id_' => 'required|numeric'
        ]);

        $leave =   Leave::findOrFail($id);
        $leave->personale_id = $request->personale_id;
        $leave->no_of_days = $request->no_of_days;
        $leave->days_used = $request->days_used;
        $leave->leave_type_id = $request->leave_type_id_;
        $leave->leave_period_id = $request->leave_period_id_;
        $leave->note = $request->note;
        $leave->user_id = Auth::user()->id;
        $leave->save();
        Session::flash('success',  $leave->name . ' updated successfully');
        return redirect()->route('leave.index');
    }
    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();
        return response()->json(['success' => 'leave deleted successfully']);
    }
    public function list_of_leave(Request $request)
    {
        $personale_id= $request->personale_id;
        if ($request->ajax()) {
            $leaves = LeaveEntitlement::where('personale_id', $personale_id)->get();
            $emp_details = DB::table('leave_entitlements')
            ->leftjoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->select(
                'personales.firstname AS name',
                DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
                DB::raw('SUM(leave_entitlements.days_used) as days_used'),
                DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
                       )
            ->where('personale_id', $personale_id)
            ->groupBy('personales.firstname')
            ->get();
              return view('hrm.leave.append')
                ->with('emp_details', $emp_details)
                ->with('leaves', $leaves);
        }
    }

    public function live_balance(Request $request)
    {
        $personale_id= $request->personale_id;
              $leaves = LeaveEntitlement::where('personale_id', $personale_id)->get();
            $emp_details = DB::table('leave_entitlements')
            ->leftJoin('personales', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->leftJoin('leaves', 'personales.id', '=', 'leave_entitlements.personale_id')
            ->select(
                'personales.firstname AS name',
                DB::raw('SUM(leave_entitlements.no_of_days) as no_of_days'),
                DB::raw('SUM(leave_entitlements.days_used) as days_used'),
                DB::raw('SUM(leaves.length_days) as days_used_new'),
                DB::raw('SUM(leave_entitlements.no_of_days - leave_entitlements.days_used) as remaing_date'),
                       )
            ->where('personale_id', $personale_id)
            ->groupBy('personales.firstname')
            ->get();
              return view('hrm.leave.append')
                ->with('emp_details', $emp_details)
                ->with('leaves', $leaves);
            }
        }

