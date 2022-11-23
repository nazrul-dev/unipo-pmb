<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Maba extends Model
{
    use HasFactory;
    protected $fillable = [
        'terbayar',
        'nama',
        'jk',
        'tl',
        'ttl',
        'agama',
        'alamat',
        'tlp',
        'asal_sekolah',
        'jurusan',
        'no_reg',
        'pk',
        'prodi',
        'email',
        'ukuran_baju',
        'photo',
        'bukti',
        'user_id',
        'angkatan'
    ];

    public static function prodis()
    {
        return collect(
            [
                [
                    'value' => 'HUKUM - ILMU HUKUM S1', 'label' => "HUKUM - ILMU HUKUM S1"
                ],
                [
                    'value' => 'PERTANIAN - AGROTEKNOLOGI S1', 'label' => "PERTANIAN - AGROTEKNOLOGI S1"
                ],
                [
                    'value' => 'PERTANIAN - AKUAKULTUR S1', 'label' => "PERTANIAN - AKUAKULTUR S1"
                ],
                [
                    'value' => 'ILMU KOMPUTER - SISTEM INFORMASI S1', 'label' => "ILMU KOMPUTER - SISTEM INFORMASI S1"
                ],
                [
                    'value' => 'ILMU KOMPUTER - INFORMATIKA S1', 'label' => "ILMU KOMPUTER - TEKNIK INFORMATIKA S1"
                ],
                [
                    'value' => 'TEKNIK - TEKNIK ARSITEKTUR S1', 'label' => "TEKNIK - TEKNIK ARSITEKTUR S1"
                ],
                [
                    'value' => 'TEKNIK -  TEKNIK SIPIL S1', 'label' => "TEKNIK -  TEKNIK SIPIL S1"
                ],
                [
                    'value' => 'TEKNIK - PERENCANAAN WILAYAH S1', 'label' => "TEKNIK - PERENCENAAN WILAYAH DAN KOTA S1"
                ],
                [
                    'value' => 'PGSD - PENDIDIKAN BAHASA INGGRIS S1', 'label' => "PGSD - PENDIDIKAN BAHASA INGGRIS S1"
                ],
                [
                    'value' => 'PGSD - PENDIDIKAN MATEMATIKA S1', 'label' => "PGSD - PENDIDIKAN MATEMATIKA S1"
                ],
                [
                    'value' => 'PGSD - ADMINISTRASI PENDIDIKAN S1', 'label' => "PGSD - ADMINISTRASI PENDIDIKAN S1"
                ],
                [
                    'value' => 'PGSD - PENDIDIKAN GURU SEKOLAH DASAR S1', 'label' => "PGSD - PENDIDIKAN GURU SEKOLAH DASAR S1"
                ],
                [
                    'value' => 'SOSPOL - ILMU PEMERINTAHAN S1', 'label' => "SOSPOL - ILMU PEMERINTAHAN S1"
                ],


              
            ]
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
                $model->angkatan =  date('Y') . '/' .
                    date('Y', strtotime('+1 years'));
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
