<?php

namespace Modules\Room\Transformers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Transformers\UserResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        $author = User::find($this->author_user_id);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'author' => (new UserResource($author))->toArray($request)
        ];
    }
}
