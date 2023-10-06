<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tododo extends Model
{
    use HasFactory;
    protected $table = 'tododo';

		public function project() {
			return $this->belongsTo(Project::class);
		}
}
