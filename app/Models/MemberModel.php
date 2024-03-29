<?php

namespace App\Models;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class MemberModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl, SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    protected $table = "members";

    protected $fillable = [
        'name',
        'surname',
        'position',
        'about',
        'photo',
        'parallax_photo',
    ];

    public $translatable = [
        'name',
        'surname',
        'position',
        'about',
    ];

    public $mediaToUrl = [
        'photo',
        'parallax_photo',
    ];


//    public function projects()
//    {
//        return $this->belongsToMany(ProjectModel::class);
//    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }


}
