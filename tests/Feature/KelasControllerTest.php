<?php

namespace Tests\Feature;

use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class KelasControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_menambahkan_kelas(): void
    {
        $response = $this->post(route('kelas.createOrUpdate'), [
                'id_kelas' => '07TPLE001',
                'nama_kelas' => '07TPLE001',
                'komp_keahlian' => 'Programmer',
        ]);

        $response->assertRedirect(route('kelas.index'));
        $response->assertSessionHas(
            'success',
            'Data kelas berhasil ditambahkan.'
        );
    }

    public function test_memperbarui_kelas(): void
    {
        $kelas = Kelas::create([
            'id_kelas' => '07TPLE001',
            'nama_kelas' => '07TPLE001',
            'komp_keahlian' => 'Programmer',
        ]);

        $response = $this->post(route('kelas.createOrUpdate'), [
            'id' => $kelas->id,
            'id_kelas' => '07TPLE002',
            'nama_kelas' => '07TPLE002',
            'komp_keahlian' => 'Desain Grafis',
        ]);

        $response->assertRedirect(route('kelas.index'));

        $response->assertSessionHas(
            'success',
            'Data kelas berhasil diperbarui.'
        );
    }

    public function test_hapus_kelas(): void
    {
        $kelas = Kelas::create([
            'id_kelas' => '07TPLE001',
            'nama_kelas' => '07TPLE001',
            'komp_keahlian' => 'Programmer',
        ]);

        $response = $this->delete(route('kelas.delete', $kelas->id));

        $response->assertSessionHas(
            'success',
            'Data kelas berhasil dihapus.'
        );
    }
}