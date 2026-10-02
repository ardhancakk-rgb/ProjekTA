<?php

use App\Models\Hewan;
use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('an unused category can be deleted', function () {
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);

    $this->get(route('kategori.index'))
        ->assertOk()
        ->assertSee('Kucing')
        ->assertSee('Hapus');

    $response = $this->delete(route('kategori.destroy', $kategori));

    $response->assertRedirect(route('kategori.index'))
        ->assertSessionHas('success');

    expect(Kategori::query()->whereKey($kategori->getKey())->exists())->toBeFalse();
});

test('a category used by an animal cannot be deleted', function () {
    $kategori = Kategori::create(['nama_kategori' => 'Kucing']);
    $hewan = Hewan::create([
        'kategori_id' => $kategori->id,
        'nama' => 'Milo',
        'umur' => 2,
        'jenis_kelamin' => 'jantan',
    ]);

    $this->get(route('kategori.index'))
        ->assertOk()
        ->assertSee('Sedang Dipakai');

    $response = $this->delete(route('kategori.destroy', $kategori));

    $response->assertRedirect(route('kategori.index'))
        ->assertSessionHas('error');

    expect(Kategori::query()->whereKey($kategori->getKey())->exists())->toBeTrue();
    expect(Hewan::query()->whereKey($hewan->getKey())->exists())->toBeTrue();
});
