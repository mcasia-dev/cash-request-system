<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CashRequest extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'activity_name',
        'activity_date',
        'activity_venue',
        'purpose',
        'nature_of_request',
        'requesting_amount',
        'due_date',
        'status',
    ];

    protected $casts = [
        'activity_date' => 'date',
        'due_date'      => 'date',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachments');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
