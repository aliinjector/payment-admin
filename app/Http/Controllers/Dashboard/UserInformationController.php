<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\UserInformation;
use App\Http\Requests\UserInformationRequest;
use Illuminate\Http\Request;

class UserInformationController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->where('type', 'user')->get();
        $userInformations = UserInformation::all();
        return view('dashboard.userInformation', compact('users','userInformations'));
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
    public function store(UserInformationRequest $request)
    {
        $userInformation = UserInformation::where('user_id', \Auth::user()->id)->first();
        $userInformation->fatherName = $request->fatherName;
        $userInformation->city = $request->city;
        $userInformation->address = $request->address;
        $userInformation->nationalCode = $request->nationalCode;
        $userInformation->shenasnamehCode = $request->shenasnamehCode;
        $userInformation->tel = $request->tel;
        $userInformation->placeOfIssue = $request->placeOfIssue;
        $userInformation->birthDate = $request->birthDate;
        $userInformation->zipCode = $request->zipCode;
        $userInformation->status = 2;
        $userInformation->save();

        alert()->success('حساب کاربری شما در مرحله انتظار تایید قرار گرفت.', 'اطلاعات بروز شد');
        return redirect()->route('UserInformation.index');

    }

    public function melliUpload(Request $request)
    {
        $request->validate([
            'melliCardPic' => 'required|mimes:jpg,png',
        ]);

        $melliCardPic = $this->uploadFile($request->file('melliCardPic'), false, false);

        $userInformation = UserInformation::where('user_id', \Auth::user()->id)->first();
        $userInformation->melliCardPic = $melliCardPic;
        $userInformation->status = 2;
        $userInformation->save();

        alert()->success('حساب کاربری شما در مرحله انتظار تایید قرار گرفت.', 'اطلاعات بروز شد');
        return redirect()->route('UserInformation.index');

    }



    public function ShensnamehUpload(Request $request)
    {
        $request->validate([
            'shenasnamehPic' => 'required|mimes:jpg,png',
        ]);

        $shenasnamehPic = $this->uploadFile($request->file('shenasnamehPic'), false, false);

        $userInformation = UserInformation::where('user_id', \Auth::user()->id)->first();
        $userInformation->shenasnamehPic = $shenasnamehPic;
        $userInformation->status = 2;
        $userInformation->save();

        alert()->success('حساب کاربری شما در مرحله انتظار تایید قرار گرفت.', 'اطلاعات بروز شد');
        return redirect()->route('UserInformation.index');

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function show(UserInformation $userInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::withTrashed()->where('type', 'user')->find($id);
      dd(User::withTrashed()->where('type', 'user')->get()->where('id', $id));
    return view('dashboard.userInformation-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $userInformation = UserInformation::find($id);
      if($request->zipCode != null and $request->tel != null and $request->nationalCode != null and $request->shenasnamehCode != null){

            $request->merge(['zipCode' => $this->fa_num_to_en($request->zipCode)]);
            $request->merge(['tel' => $this->fa_num_to_en($request->tel)]);
            $request->merge(['nationalCode' => $this->fa_num_to_en($request->nationalCode)]);
            $request->merge(['shenasnamehCode' => $this->fa_num_to_en($request->shenasnamehCode)]);
          }

          $request->validate([
            'zipCode' => 'required|digits:10',
            'tel' => 'required|min:1|max:20',
            'nationalCode' => 'required|digits:10',
            'shenasnamehCode' => 'required|digits:10',
          ]);
        $userInformation = $userInformation->update([
          'fatherName' => $request->fatherName,
          'tel' => $request->tel,
          'city' => $request->city,
          'nationalCode' => $request->nationalCode,
          'shenasnamehCode' => $request->shenasnamehCode,
          'placeOfIssue' => $request->placeOfIssue,
          'birthDate' => $request->birthDate,
          'zipCode' => $request->zipCode,
          'status' => $request->status,
        ]);
        alert()->success('انجام شد', 'اطلاعات بروز شد');
        return redirect()->route('UserInformation.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInformation $userInformation)
    {
        //
    }
}
