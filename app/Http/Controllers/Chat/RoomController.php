<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Service\FindNewChatService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoomController extends Controller
{
    /**
     * @param FindNewChatService $service
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function store(FindNewChatService $service) :Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
    {
        return $service->findNewChatRoom();
    }
}
