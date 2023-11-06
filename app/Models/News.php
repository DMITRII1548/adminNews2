<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function getImageUrlAttribute(): string
    {
        return url('/storage/' . $this->preview_image);
    }

    public function getPublishBeforeAttribute()
    {
        $date1 = Carbon::parse($this->publish_date);
        $date2 = Carbon::now();

        $diffInHours = $date1->diffInHours($date2); // Difference in hours

        if ($date1->lessThan($date2)) {
            $diffInHours = -$diffInHours;
        }

        return $diffInHours;
    }

    public function getDateAttribute()
    {
        $date = Carbon::parse($this->publish_date);

        $formattedDate = $date->format('j M Y');

        return $formattedDate;
    }
}
