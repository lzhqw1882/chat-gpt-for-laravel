<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        /*return [
            'seq'   => $this->seq,
            'title' => $this->title,
            'description'   => $this->description,
            'writer_name'   => $this->writer_name,
            'view_count'    => $this->view_count,
            'reply_status'  => $this->reply_status,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'deleted_at'    => $this->deleted_at,
            'reply_at'      => $this->reply_at,
        ];*/
    }
}
