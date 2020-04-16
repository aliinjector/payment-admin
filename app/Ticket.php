<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class Ticket extends Model
{
  use SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];
    protected $cascadeDeletes = ['answers', 'buzzes'];
    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();
        self::restoring(function ($ticket) {
          if($ticket->answers()->withTrashed()->first() != null){
            $ticket->answers()->withTrashed()->first()->restore();
          }
          if($ticket->buzzes()->withTrashed()->first() != null){
            $ticket->buzzes()->withTrashed()->first()->restore();
          }
    });
  }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answers(){
      return $this->hasMany(Answer::class);
    }

    public function buzzes(){
        return $this->hasMany(Buzz::class);
    }


}
