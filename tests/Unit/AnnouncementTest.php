<?php

namespace Tests\Unit;

use App\Models\Announcement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class AnnouncementTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    public function testIndex() {
        $response = $this->json('get', 'api/announcements')->assertStatus(Response::HTTP_OK);
        $result = json_decode($response->getContent(), true);
        return $result;
    }


    public function testCreate() {
        $announcement = factory(Announcement::class)->create();
        $response = $this->json('post', 'api/announcements', $announcement->toArray())->assertStatus(Response::HTTP_CREATED);
        return $response;
    }

    public function testShow() {
        $announcement = factory(Announcement::class)->create();
        $response = $this->json('get', 'api/announcements/' . $announcement->id)->assertStatus(Response::HTTP_OK);
        return $response;
    }
}


