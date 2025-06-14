<?php

namespace Tests\Feature\Livewire\Transaction;

use App\Livewire\Transaction\Create;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(Create::class)
            ->assertStatus(200);
    }
}
