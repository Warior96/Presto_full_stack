<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
    ];

    // relazione con users
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relazione con categories
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //valore is_accepted
    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    public static function toBeRevisedCount()
    {

        return Article::where('is_accepted', null)->count();
    }
}
