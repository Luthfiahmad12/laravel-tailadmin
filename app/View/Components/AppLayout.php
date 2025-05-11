<?php

namespace App\View\Components;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class AppLayout extends Component
{
    public $activities = [];

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @return void
     */
    public function __construct(public string $title = 'Default title')
    {
        if (!Auth::check()) {
            throw new Exception('Unauhtorized');
        }

        $user = Auth::user();

        $this->activities = Activity::query()
            ->where('log_name', 'authentication')
            ->where(function ($query) use ($user) {
                $query->where('causer_id', $user->id)
                    ->where('causer_type', get_class($user));
            })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
