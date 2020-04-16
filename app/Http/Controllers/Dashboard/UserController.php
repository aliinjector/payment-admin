<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Dashboard;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserPanelUpdateRequest;
use App\UserInformation;
use Illuminate\Http\Request;

class UserController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->get();
        $userInformations = UserInformation::all();
        return view('dashboard.user', compact('users', 'userInformations'));
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
    public function store(UserRequest $request)
    {
      $User = \Auth::user()->users()->create($request->except('_token'));
        alert()->success('کارت بانکی موفقیت اضافه شد.', 'انجام شد');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }


    public function updateUser(UserPanelUpdateRequest $request, $id)
    {
      $user = User::find($id);
      //check if icon is null or not
     if($request->file('avatar') != null){
       $avatar = $this->uploadFile($request->file('avatar'), false, false);
     }
     else{
       $avatar =  $user->avatar;
     }
     $user = $user->update([
     'firstName' => $request->firstName,
     'lastName' => $request->lastName,
     'email' => $request->email,
     'status' => $request->status,
     'mobile' => $this->fa_num_to_en($request->mobile),
     'avatar' => $avatar
     ]);
     alert()->success('اطلاعات شما با موفقیت ویرایش شد.', 'انجام شد');
     return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('dashboard.user-edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {

        if (!\Auth::user()->users()->find($request->id)->get()){
            alert()->error('خطا', 'خطا');
            return redirect()->route('user.index');
            exit;
        }

        $User = \Auth::user()->users()->where('id', $request->id)->first()->update([
        'number' => $request->number,
        'bank' => $request->bank,
        'status' => 'در انتظار تایید',
        'month' => $request->month,
        'year' => $request->year,
        ]);


        alert()->success('کارت بانکی موفقیت ویرایش شد.', 'انجام شد');
        return redirect()->route('user.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
       {
         $request->validate([
           'id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
     ]);
         $user = User::find($request->id);
         if (\Auth::user()->is_superAdmin != 1) {
                 alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
                 return redirect()->back();
               }
                  $user->delete();
                  alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
                  return redirect()->back();
      }




     public function restore(Request $request)
       {
         $request->validate([
           'id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
     ]);
         $user = User::withTrashed()->find($request->id);
         if (\Auth::user()->is_superAdmin != 1) {
                 alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
                 return redirect()->back();
               }
                  $user->restore();
                  alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
                  return redirect()->back();
      }

}
