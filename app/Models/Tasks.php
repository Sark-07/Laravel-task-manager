<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tasks extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_task');
    }


    public function user()
    {

        return $this->belongsToMany(User::class, 'task_user');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class, 'task_id');
    }

    public function scopeFilter($query)
    {
        if (request()->filled('status')) {
            $query->where('status', request('status'));
        }

        if (request()->filled('search')) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm)
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm);
                    });
            });
        }

        if (request()->filled('categoryId')) {
            $query->whereHas('categories', function ($query) {
                $query->where('categories_id', request('categoryId'));
            });
        }

        if (request()->filled(['status', 'search'])) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm)
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm);
                    });
            })->where('status', request('status'));
        }

        if (request()->filled(['status', 'categoryId'])) {
            $query->where('status', request('status'))
                ->whereHas('categories', function ($query) {
                    $query->where('categories_id', request('categoryId'));
                });
        }

        if (request()->filled(['search', 'categoryId'])) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm)
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm);
                    });
            })->whereHas('categories', function ($query) {
                $query->where('categories_id', request('categoryId'));
            });
        }

        if (request()->filled(['status', 'search', 'categoryId'])) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm)
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm);
                    });
            })->where('status', request('status'))->whereHas('categories', function ($query) {
                $query->where('categories_id', request('categoryId'));
            });
        }
        return $query;
    }

    public function scopeUserFilter($query)
    {
        $userId = auth()->user()->id;
        $query->whereHas('user', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        });

        if (request()->filled('search')) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm);
            });
        }

        if (request()->filled('status')) {
            $query->where('status', request('status'));
        }

        if (request()->filled('categoryId')) {
            $query->whereHas('categories', function ($query) {
                $query->where('categories_id', request('categoryId'));
            });
        }

        if (request()->filled(['status', 'search'])) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm);
            })
                ->where('status', request('status'));
        }

        if (request()->filled(['categoryId', 'search'])) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm);
            })
                ->whereHas('categories', function ($query) {
                    $query->where('categories_id', request('categoryId'));
                });
        }

        if (request()->filled(['categoryId', 'status'])) {
            $query->whereHas('categories', function ($query) {
                $query->where('categories_id', request('categoryId'));
            })
                ->where('status', request('status'));
        }

        if (request()->filled(['status', 'search', 'categoryId'])) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm)
                    ->orWhere('status', 'like', $searchTerm)
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm);
                    });
            })->where('status', request('status'))->whereHas('categories', function ($query) {
                $query->where('categories_id', request('categoryId'));
            });
        }

        return $query;
    }
}
