<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
            return [
            'id' => $this->id,
            'title' => $this->title,
            'game_start_time' => $this->game_start_time,
            'status' => $this->status,
            'winning_outcome_id' => $this->updated_at,
        ];
 
    }
}
