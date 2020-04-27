<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color;
use Illuminate\Validation\Rule;



class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $colors = Color::all();
      return view('dashboard.color', compact('colors'));
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

          $request->validate([
            'name' => 'unique:colors|required|max:60|regex:/[ا-یa-zA-Z0-9 ]+(?:-[ا-یa-zA-Z0-9 ]+){0,15}/',
            'code' => 'max:10',
            ]);
          $colorCode = str_replace("#", "",$request->code);
          $color = new Color;
          $color->name = $request->name;
          $color->code = $colorCode;
          $color->save();
          alert()->success('رنگ جدید با موفقیت ذخیره شد', 'ثبت شد');
          return redirect()->back();

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
      $request->validate([
        'name' => ['required', 'max:20', Rule::unique('colors')->ignore($id)],
        'code' => 'max:10',
        ]);
      $colorCode = str_replace("#", "",$request->code);

        $color = Color::where('id', $id)->update([
            'name' => $request->name,
            'code' => $colorCode,
        ]);
        alert()->success(' رنگ مورد نظر با موفقیت ویرایش شد', 'ثبت شد');
        return redirect()->route('color.index');
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
