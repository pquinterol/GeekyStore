<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Maintenance;

class maintenanceTest extends TestCase
{
    public function test_a_belongs_to_user()
    {
        $maintenance = new Maintenance;

        $this->assertInstanceOf(User::class, $maintenance->user);
    }
}
