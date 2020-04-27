<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Shop;
use App\Comment;
use App\Http\Requests\ShopCommentRequest;
use App\Http\Controllers\Controller;

class ShopCommentController extends Controller
{


  public function index(ShopCommentRequest $request)
  {
      if($request->has('q'))
      {
          $shop = Shop::where('english_name','LIKE','%'.$request->q.'%')->get();
          if($shop->count() > 0){
            $comments = $shop->first()->comments()->orderBy('created_at', 'desc')->get();
            return view('dashboard.comment.shop-comment', compact('comments'));
          }
          else{
            $comments = [];
            return view('dashboard.comment.shop-comment', compact('comments'))->withErrors(['فروشگاه مورد نظر پیدا نشد']);
          }
      }else{
        return view('dashboard.comment.shop-comment');
      }

  }



  public function show()
  {
    $shops = Shop::all();
    $action = ['name' => 'نظرات', 'url' => 'shops-comments.comments', 'trashed' => 'نظرات حذف شده', 'trashedUrl' => 'shops-comments.trashed-comment'];
    return view('dashboard.shops' , compact('shops', 'action'));
  }


  public function showComments($shopId){
    $shop = Shop::find($shopId);
    $comments = $shop->comments;
    return view('dashboard.comment.comment' , compact('comments', 'shop'));

  }

  public function trashedComment($shopId){
    $shop = Shop::find($shopId);
    $comments = $shop->comments()->onlyTrashed()->get();
    return view('dashboard.comment.trashed-comment' ,  compact('comments', 'shop'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function restore(ShopCommentRequest $request)
  {
  $comment = Comment::withTrashed()->where('id' , $request->id)->get()->first()->update([
    'deleted_at' => null
  ]);
        }




   public function destroy(ShopCommentRequest $request)
  {
    $comment = Comment::withTrashed()->where('id' , $request->id)->get()->first()->forceDelete();

        }



}
