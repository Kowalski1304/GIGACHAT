<?php

namespace App\Service;

use App\Events\FindNewChat;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Queue;
use App\Models\Room;

class FindNewChatService
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function findNewChatRoom() :Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
    {
        $user1 = Queue::firstOrCreate([
            'userId' => auth()->id(),
        ]);

        $user2 = $this->findSecondUser($user1);

        if ($user2) {
        $room = $this->foundSecondUser($user1, $user2);

        return redirect()->route('room.show', ['id' => $room->id]);
        }

        $id = $user1->userId;

        return view('chat.find-new', compact('id'));
    }

    /**
     * @param $user1
     * @return mixed
     */
    private function findSecondUser($user1) :mixed
    {
        return Queue::where('userId', '<>', $user1->userId)
            ->first();
    }

    /**
     * @param $user1
     * @param $user2
     * @return mixed
     */
    private function foundSecondUser($user1, $user2) :mixed
    {
            $room = $this->createNewRoom($user1->userId, $user2->userId);

            broadcast(new FindNewChat($room->id, $user2->userId))->toOthers();

            $this->deleteQueue($user1->id);
            $this->deleteQueue($user2->id);

            return $room;
    }

    /**
     * @param $userId1
     * @param $userId2
     * @return mixed
     */
    private function createNewRoom($userId1, $userId2) :mixed
    {
        return Room::create([
                'userId1' => $userId1,
                'userId2' => $userId2,
            ]);
    }

    /**
     * @param $userId
     * @return void
     */
    private function deleteQueue($userId) :void
    {
        Queue::where('id', $userId)
            ->delete();
    }
}
