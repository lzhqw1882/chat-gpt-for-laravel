<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $table = 'replies';
    protected $primaryKey = 'seq';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'seq',
        'questions_seq',
        'description',
        'writer_name',
        'reply_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static $validation = [
        'questions_seq' => 'required',
        'description' => 'required',
        'writer_name' => 'required'
    ];

    public function questions()
    {
        return $this->belongsTo(Questions::class,'questions_seq','seq');
    }
}
