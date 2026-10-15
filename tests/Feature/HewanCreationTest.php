<?php

use App\Models\Hewan;
use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('hewan can be created without jenis lokasi or deskripsi', function () {
    $kategori = Kategori::create([
        'nama_kategori' => 'Kucing',
    ]);

    $this->get(route('hewan.create'))
        ->assertOk()
        ->assertDontSee('Jenis Hewan')
        ->assertDontSee('Lokasi')
        ->assertDontSee('Deskripsi');

    $this->post(route('hewan.store'), [
        'kategori_id' => $kategori->id,
        'nama' => 'Milo',
        'ras' => 'Persia',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
        'status' => 'tersedia',
    ])
        ->assertRedirect(route('hewan.index'))
        ->assertSessionHas('success');

    expect(Hewan::query()->where('nama', 'Milo')->exists())->toBeTrue();
});

test('edit form shows existing hewan data and updates it without clearing deskripsi', function () {
    $kategori = Kategori::create([
        'nama_kategori' => 'Kucing',
    ]);
    $hewan = Hewan::create([
        'kategori_id' => $kategori->id,
        'nama' => 'Milo',
        'ras' => 'Persia',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
        'berat' => 3.5,
        'kondisi_kesehatan' => 'Sehat',
        'status_vaksin' => 'Lengkap',
        'deskripsi' => 'Deskripsi lama',
        'status' => 'tersedia',
    ]);

    $this->get(route('hewan.edit', $hewan))
        ->assertOk()
        ->assertSee('value="Milo"', false)
        ->assertSee('value="Persia"', false)
        ->assertSee('value="Sehat"', false)
        ->assertSee('name="kategori_id"', false)
        ->assertDontSee('name="jenis"', false)
        ->assertDontSee('name="lokasi"', false)
        ->assertDontSee('name="deskripsi"', false);

    $this->put(route('hewan.update', $hewan), [
        'kategori_id' => $kategori->id,
        'nama' => 'Milo Baru',
        'ras' => 'Persia',
        'umur' => 3,
        'jenis_kelamin' => 'jantan',
        'berat' => 4,
        'kondisi_kesehatan' => 'Sehat',
        'status_vaksin' => 'Lengkap',
        'status' => 'tersedia',
    ])
        ->assertRedirect(route('hewan.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('hewan', [
        'id_hewan' => $hewan->id_hewan,
        'nama' => 'Milo Baru',
        'umur' => 3,
        'deskripsi' => 'Deskripsi lama',
    ]);
});
