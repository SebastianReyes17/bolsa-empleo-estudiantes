<?php
namespace Tests\Feature;
use Tests\TestCase;
class SmokeTest extends TestCase { public function test_home_page_is_available(): void { $this->get('/')->assertOk()->assertSee('El talento que tienes'); } }
