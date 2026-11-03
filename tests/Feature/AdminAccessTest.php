<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('customers cannot access admin pages', function () {
    $this->actingAs(User::factory()->create(['role' => 'customer']));

    $this->get(route('admindash.dashboard'))->assertForbidden();
    $this->get(route('hewan.index'))->assertForbidden();
    $this->get(route('kategori.index'))->assertForbidden();
    $this->get(route('admin.pengajuan.index'))->assertForbidden();
});

test('admins can access admin pages', function () {
    $this->actingAs(User::factory()->create(['role' => 'admin']));

    $this->get(route('admindash.dashboard'))->assertOk();
    $this->get(route('hewan.index'))->assertOk();
    $this->get(route('kategori.index'))->assertOk();
    $this->get(route('admin.pengajuan.index'))->assertOk();
});
