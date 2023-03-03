<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $primaryKey = 'seq';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'seq',
        'title',
        'description',
        'writer_name',
        'view_count',
        'reply_status',
        'created_at',
        'updated_at',
        'deleted_at',
        'reply_at',
    ];

    protected static $validation = [
        'title' => 'required',
        'description' => 'required',
        'writer_name' => 'required'
    ];

    public function replies()
    {
        return $this->hasMany(Replies::class,'questions_seq', 'seq');
    }
}
