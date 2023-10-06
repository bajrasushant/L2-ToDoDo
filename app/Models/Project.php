<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

		public function todos() {
			return $this->hasMany(Tododo::class);
		}

		public function user() {
			return $this->belongsTo(User::class, 'owner_id', 'id');
		}
}
