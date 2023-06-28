<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';

    protected $fillable = [
        'name',
        'priority_id',
        'done',
    ];

    public function priority()
    {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }

    public function getDoneValue()
    {
        return $this->done ? 'Выполнено' : 'Не выполнено';
    }
}
