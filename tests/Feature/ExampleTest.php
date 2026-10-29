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

test('the pets page lists animals and provides an adoption link', function () {
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);
    $hewan = Hewan::create([
        'id_kategori' => $kategori->id_kategori,
        'nama_hewan' => 'Milo',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
        'status_adopsi' => 'tersedia',
    ]);

    $this->get(route('pets.index'))
        ->assertOk()
        ->assertSee('Milo')
        ->assertSee(route('adopsi.create', $hewan->id_hewan));
});

test('legacy pages redirect to available pages', function () {
    $this->get('/about-us')->assertRedirect('/');
    $this->get('/help')->assertRedirect('/contact');
    $this->get('/Hewan')->assertRedirect(route('hewan.index'));
    $this->get('/PengajuanAdopsi')->assertRedirect(route('pets.index'));
    $this->get(route('submission.index'))->assertRedirect(route('pets.index'));
    $this->get('/Kategori')->assertRedirect(route('kategori.index'));
});

test('a customer can open an adoption submission form', function () {
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);
    $hewan = Hewan::create([
        'id_kategori' => $kategori->id_kategori,
        'nama_hewan' => 'Milo',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
        'status_adopsi' => 'tersedia',
    ]);
    $customer = User::factory()->create(['role' => 'customer']);

    $this->actingAs($customer)
        ->get(route('adopsi.create', $hewan->id_hewan))
        ->assertOk()
        ->assertSee('Formulir Pengajuan Adopsi')
        ->assertSee('Milo');
});

test('a customer can submit an adoption application', function () {
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);
    $hewan = Hewan::create([
        'id_kategori' => $kategori->id_kategori,
        'nama_hewan' => 'Milo',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
        'status_adopsi' => 'tersedia',
    ]);
    $customer = User::factory()->create(['role' => 'customer']);

    $this->actingAs($customer)
        ->post(route('adopsi.store', $hewan->id_hewan), [
            'telepon_pemohon' => '081234567890',
            'alamat_pemohon' => 'Jalan Mawar 10',
            'alasan_adopsi' => 'Saya siap merawat Milo.',
        ])
        ->assertRedirect(route('pengajuan.riwayat'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('pengajuan_adopsi', [
        'id_user' => $customer->id,
        'id_hewan' => $hewan->id_hewan,
        'status_pengajuan' => 'pending',
        'telepon_pemohon' => '081234567890',
    ]);

    $this->assertDatabaseHas('hewan', [
        'id_hewan' => $hewan->id_hewan,
        'status_adopsi' => 'diproses',
    ]);

    $this->actingAs($customer)
        ->get(route('pengajuan.riwayat'))
        ->assertOk()
        ->assertSee('Milo')
        ->assertSee('Menunggu');

    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get(route('admin.pengajuan.index'))
        ->assertOk()
        ->assertSee('Milo')
        ->assertSee('Saya siap merawat Milo.');
});

test('only admins can open the adoption management page', function () {
    $customer = User::factory()->create(['role' => 'customer']);

    $this->actingAs($customer)
        ->get(route('admin.pengajuan.index'))
        ->assertForbidden();

    $admin = User::factory()->create(['role' => 'admin']);
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);
    $hewan = Hewan::create([
        'id_kategori' => $kategori->id_kategori,
        'nama_hewan' => 'Milo',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
    ]);

    PengajuanAdopsi::create([
        'id_user' => $customer->id,
        'id_hewan' => $hewan->id_hewan,
        'tanggal_pengajuan' => now()->toDateString(),
        'status_pengajuan' => 'pending',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.pengajuan.index'))
        ->assertOk()
        ->assertSee('Pengajuan Adopsi')
        ->assertSee('Milo');
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
