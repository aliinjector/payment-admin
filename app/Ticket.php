<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    protected $guarded = ['id'];

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
