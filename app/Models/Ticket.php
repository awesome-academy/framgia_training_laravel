<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{   
    protected $guard = ['id'];
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitle()
    {
        return $this->title;
    }
}
