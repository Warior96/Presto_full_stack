<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use Searchable;

    // indici della ricerca
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
        ];
    }

    // fillable
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'condition'
    ];

    // relazione con users N-1
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relazione con categories N-N
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // valore is_accepted
    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    // contatore articoli da revisionare
    public static function toBeRevisedCount()
    {

        return Article::where('is_accepted', null)->count();
    }

    // relazione con images 1-N
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    // relazione con users 1-N
    public function wishlistBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist');
    }
}
