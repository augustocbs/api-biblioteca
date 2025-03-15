<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testTheHomeRouteCanBeSuccessfullyCalled()
    {
        $this->getJson('/')
            ->assertStatus(200)
            ->assertJson([]);
    }
}
