<?php

namespace App\Http\Controllers;

use App\SubsistenceRequisition;
use App\RequisitionProcessing;
use Illuminate\Http\Request;
use Auth;
use App\User;
class SubsistenceRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $request->user()->authorizeRoles(['Member','System Administrator']);
      if (Auth::user()->hasRole('Member'))
      {
          $requisitions = Auth::user()->subsistenceRequisitions()->get();
      }
      else if(Auth::user()->hasRole('System Administrator'))
      {
          $requisitions = SubsistenceRequisition::all();
      }


      return view('subsistencerequisitions.index',compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('subsistencerequisitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request->from_date);
      $this->validate($request,[
         'from_date'        => 'date_format:Y-m-d|after:today',
         'to_date'          => 'date_format:Y-m-d|after:from_date',
      ]);
      $user_id = Auth::user()->id;
      $transport_requisition = SubsistenceRequisition::create([
        'description'    => $request['description'],
        'no_days'     => $request['no_days'],
        'allowance_scale'    => $request['allowance_scale'],
        'from_date' => $request['from_date'],
        'to_date' => $request['to_date'],
        'user_id'  => $user_id,
      ]);
      return redirect()->route('subsistencerequisitions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      $request->user()->authorizeRoles(['Member']);
      $requisition = SubsistenceRequisition::findOrFail($id);
      return view('subsistencerequisitions.show', compact('requisition')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $requisition =SubsistenceRequisition::findOrFail($id);
      return view('subsistencerequisitions.edit', compact('requisition')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
         'from_date'        => 'date_format:Y-m-d|after:today',
         'to_date'          => 'date_format:Y-m-d|after:from_date',
      ]);
      SubsistenceRequisition::findOrFail($id)->update([
        'description'    => $request['description'],
        'no_days'     => $request['no_days'],
        'allowance_scale'    => $request['allowance_scale'],
        'from_date' => $request['from_date'],
        'to_date' => $request['to_date'],
      ]);
      if (Auth::user()->hasRole("Head of Department"))
      {
        return redirect()->route('subsistencerequisitions.inbox');
      }
      return redirect()->route('subsistencerequisitions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      SubsistenceRequisition::findOrFail($id)->delete();
      return redirect()->route('subsistencerequisitions');
    }
    public function inbox(Request $request)
    {
        $request->user()->authorizeRoles(['Head of Department','HR Officer','Finance Officer']);
        if (Auth::user()->hasRole('Head of Department'))
        {
            $department_id = Auth::user()->department_id;
            $users = User::where('department_id',$department_id)->pluck('id');
            $requisitions = SubsistenceRequisition::where('current_stage',1)->whereIn('user_id',$users)->get();
            return view('subsistencerequisitions.inbox',compact('requisitions'));
        }
        else if(Auth::user()->hasRole('HR Officer'))
        {
            $requisitions = SubsistenceRequisition::where('current_stage',2)->get();
            return view('subsistencerequisitions.inbox',compact('requisitions'));
        }
        else if(Auth::user()->hasRole('Finance Officer'))
        {
            $requisitions = SubsistenceRequisition::where('current_stage',3)->get();
            return view('subsistencerequisitions.inbox',compact('requisitions'));
        }

    }
    public function outbox(Request $request)
    {
       $request->user()->authorizeRoles(['Head of Department','HR Officer','Finance Officer']);
       if (Auth::user()->hasRole('Head of Department'))
       {
           $department_id = Auth::user()->department_id;
           $users = User::where('department_id',$department_id)->pluck('id');
           $requisitions = SubsistenceRequisition::whereIn('current_stage',[2,3,4])->whereIn('user_id',$users)->get();
           return view('subsistencerequisitions.outbox',compact('requisitions'));
       }
       else if(Auth::user()->hasRole('HR Officer'))
       {
           $requisitions = SubsistenceRequisition::whereIn('current_stage',[3,4])->get();
           return view('subsistencerequisitions.outbox',compact('requisitions'));
       }
       else if(Auth::user()->hasRole('Finance Officer'))
       {
           $requisitions = SubsistenceRequisition::where('current_stage',4)->get();
           return view('subsistencerequisitions.outbox',compact('requisitions'));
       }
    }
    public function approve(Request $request,$id)
    {

      $request->user()->authorizeRoles(['Head of Department','HR Officer','Finance Officer']);
      $requisition = SubsistenceRequisition::findOrFail($id);
      //dd($request->comment);
      $stage = $requisition->current_stage + 1;
      SubsistenceRequisition::findOrFail($id)->update([
        'current_stage' => $stage,
      ]);
      $user_id = Auth::user()->id;
      $stage = 1;
      if (Auth::user()->hasRole('Head of Department')){
          $stage = 1;
      }
      else if(Auth::user()->hasRole('HR Officer'))
      {
          $stage = 2;
      }
      else if(Auth::user()->hasRole('Finance Officer'))
      {
          $stage = 3;
      }
      RequisitionProcessing::create([
        'comment'    => $request['comment'],
        'requisition_id'     => $id,
        'requisition_type_id'    => 2,
        'action' => 'Approve',
        'requisition_stage' => $stage,
        'user_id'  => $user_id,
      ]);
      return redirect()->route('subsistencerequisitions.inbox');
    }
    public function disapprove(Request $request,$id)
    {

      $request->user()->authorizeRoles(['Head of Department','HR Officer','Finance Officer']);
      $requisition = SubsistenceRequisition::findOrFail($id);
      //dd($request->comment);
      $stage = $requisition->current_stage - 1;
      SubsistenceRequisition::findOrFail($id)->update([
        'current_stage' => $stage,
      ]);
      $user_id = Auth::user()->id;
      $stage = 1;

      if(Auth::user()->hasRole('HR Officer'))
      {
          $stage = 2;
      }
      else if(Auth::user()->hasRole('Finance Officer'))
      {
          $stage = 3;
      }
      RequisitionProcessing::create([
        'comment'    => $request['comment'],
        'requisition_id'     => $id,
        'requisition_type_id'    => 2,
        'action' => 'Returned',
        'requisition_stage' => $stage,
        'user_id'  => $user_id,
      ]);
      return redirect()->route('subsistencerequisitions.inbox');
    }
}
