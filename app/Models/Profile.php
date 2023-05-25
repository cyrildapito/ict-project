<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'mname', 'address', 'bdate', 'phone', 'user_id', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function history(){
        return $this->belongsToMany( Events::class, "donor_histories", "user_id", "event_id");
    }

    /*public function scopeHistory($query, $event_id)
    {
        return $query->select("donor_histories.points")
            ->leftJoin('donor_histories', 'profiles.id', 'donor_histories.user_id')
            ->leftJoin('events', 'donor_histories.event_id', 'events.id')
            ->where('donor_histories.event_id',  $event_id)
            ->where('donor_histories.user_id', $this->id)->first();
    }*/

}
