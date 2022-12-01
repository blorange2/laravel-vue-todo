<?php
namespace Tests\Feature\Http\Controller;

use App\Models\Item;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    /** @test */
    public function it_can_store_items()
    {
        $data = [
            'item' => [
                'name' => 'test'
            ]
        ];

        $this->post('api/item/store', $data)
            ->assertStatus(201);
    }

    /** @test */
    public function it_can_list_items()
    {
        $response = $this->getJson('api/items');

        dd($response->json());
    }

    /** @test */
    public function it_can_update_items()
    {
        $existingItem = Item::factory()->create();

        $data = [
            'item' => [
                'completed' => true
            ]
        ];

        $response = $this->putJson('api/item/' . $existingItem->id, $data);

        dd($response->json());
    }

    /** @test */
    public function it_can_delete_items()
    {
        $response = $this->getJson('api/items');

        dd($response->json());
    }
}
