<?php

use App\Models\Hewan;
use App\Models\Kategori;
use App\Models\PengajuanAdopsi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the pets page renders with valid navigation', function () {
    $this->get('/pets')
        ->assertOk()
        ->assertSee('Daftar Hewan Peliharaan');
});

test('legacy pages redirect to available pages', function () {
    $this->get('/about-us')->assertRedirect('/');
    $this->get('/help')->assertRedirect('/contact');
    $this->get('/Hewan')->assertRedirect(route('hewan.index'));
    $this->get('/PengajuanAdopsi')->assertRedirect(route('pets.index'));
    $this->get('/Kategori')->assertRedirect(route('kategori.index'));
});

test('a user can submit an adoption request with the migration status column', function () {
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);
    $hewan = Hewan::create([
        'id_kategori' => $kategori->id_kategori,
        'nama_hewan' => 'Milo',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
    ]);
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('adopsi.store', $hewan->id_hewan))
        ->assertRedirect(route('adopsi.create', $hewan->id_hewan))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('pengajuan_adopsi', [
        'id_user' => $user->id,
        'id_hewan' => $hewan->id_hewan,
        'status_pengajuan' => 'pending',
    ]);
});

test('registration stores a generated username', function () {
    $this->post(route('register.process'), [
        'name' => 'Test User',
        'email' => 'test-user@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertRedirect('/login')
        ->assertSessionHas('success');

    $this->assertDatabaseHas('users', [
        'email' => 'test-user@example.com',
        'username' => 'Test User',
    ]);
});

test('profile contact fields can be updated', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->put(route('profile.update'), [
            'name' => $user->name,
            'username' => 'updated-user',
            'email' => $user->email,
            'no_hp' => '081234567890',
            'alamat' => 'Jalan Mawar 10',
        ])
        ->assertRedirect(route('profile.index'));

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'username' => 'updated-user',
        'no_hp' => '081234567890',
        'alamat' => 'Jalan Mawar 10',
    ]);
});

test('admins can view adoption requests', function () {
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);
    $hewan = Hewan::create([
        'id_kategori' => $kategori->id_kategori,
        'nama_hewan' => 'Milo',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
    ]);
    $user = User::factory()->create([
        'name' => 'Adopter',
        'role' => 'admin',
    ]);

    PengajuanAdopsi::create([
        'id_user' => $user->id,
        'id_hewan' => $hewan->id_hewan,
        'tanggal_pengajuan' => now(),
        'status_pengajuan' => 'pending',
    ]);

    $this->actingAs($user)
        ->get(route('pengajuan.index'))
        ->assertOk()
        ->assertSee('Adopter')
        ->assertSee('Milo')
        ->assertSee('Pending');
});
