<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('project_name', 'like', '%' . request('search') . '%')
                ->orwhere('created_at', 'like', '%' . request('search') . '%');
        }
    }

    protected $fillable = [
        'project_name',
        'project_video',
        'project_picture',
    ];

    public static function find($id)
    {
        $projects = self::all();

        foreach ($projects as $project) {
            if ($project['id'] == $id) {
                return $project;
            }
        }
    }
}
