<?php

namespace Modules\Books\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'author' => $this->author,
            'category' => $this->category->name,
            'code' => $this->code,
            'type' => $this->type,
            'size' =>  $this->size,
            'created_at' =>  $this->created_at
        ];
    }
}
