<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name ?? '',
            'email' => $this->email ?? '',
            'is_admin' => $this->is_admin ?? false,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s') ?? '',
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s') ?? '',
        ];
    }
}
