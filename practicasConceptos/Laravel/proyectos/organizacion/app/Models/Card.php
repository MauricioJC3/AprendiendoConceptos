<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Card extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'board_id', 
        'status', 
        'priority', 
        'start_date', 
        'end_date'
    ];

    protected $dates = ['start_date', 'end_date'];

    // Ensure start_date is always a Carbon instance
    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    // Ensure end_date is always a Carbon instance
    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function board()
{
    return $this->belongsTo(Board::class);
}
}