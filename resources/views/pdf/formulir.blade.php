<!DOCTYPE html>
<html>

<head>
    <title>Formulir Maba {{$maba->no_reg}}</title>
    <style>
        * {
            font-size: 14px
        }

        .pasphoto {

            width: 113px;
            height: 151px;
            border: 2px solid #000;
        }

        .isi {
            width: 100%;
            margin-left: 30px;
        }

        .isi tr td {
            line-height: 20px;
            font-weight: 'semibold'
        }



        .title {
            margin-top: 0;
            position: relative;
        }

        h1.title:before {
            content: "";
            display: block;
            border-top: solid 1px black;
            width: 100%;
            height: 2px;
            position: absolute;

            z-index: 1;
            border-bottom: 1px solid #000;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td width="20%" style=" text-align:center"><img width="80" height="80"
                    src="{{ public_path('logoone.png') }}" alt=""></td>
            <td width="80%" style=" text-align:center">
                <center>
                    <div>
                        <strong>Panitia Penerimaan Mahasiswa Baru</strong>
                    </div>
                    <strong style=" font-size:25px">UNIVERISTAS POHUWATO</strong>

                    <div style="padding:10px 10px 10px 10px">
                        <em style="font-size:12px;">Alamat di kop surat : Jl.Trans Sulawesi No 147 Palopo, Marisa
                            Kabupaten Pohuwato No (0853-4190-3339)</em>
                    </div>
                </center>

            </td>
            <td width="20%"><img width="80" height="80" src="{{ $qr }}" alt="">
            </td>
        </tr>
    </table>
    <h1 class="title"></h1>
    <div>
        <h1 style="text-align: center">
            FORMULIR PENDAFTARANPENERIMAAN MAHASISWA BARU <br> TAHUN AKADEMIK 2020 / 2021
        </h1>
    </div>
    <div style="margin-top: 50px">

        <div style="border: solid 1px #333333; padding:6px 6px 6px 6px; font-weight:800; display:inline; ">
            KODE REGISTRASI : {{ $maba->no_reg }}
        </div>
        <div style="margin-top:50px">
            <h1>I. IDENTITAS</h1>
            <table class="isi">
                <tr>
                    <td style="width: 40%;">

                        Nama Lengkap
                    </td>
                    <td>
                        : {{ $maba->nama }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Jenis Kelamin
                    </td>
                    <td>
                        : {{ $maba->jk }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Tempat/Tanggal Lahir
                    </td>
                    <td>
                        : {{ $maba->tl }}, {{ $maba->ttl }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Agama
                    </td>
                    <td>
                        : {{ $maba->agama }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Alamat
                    </td>
                    <td>
                        : {{ $maba->alamat }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Handphone/Telp. Rumah
                    </td>
                    <td>
                        : {{ $maba->tlp }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Email
                    </td>
                    <td>
                        : {{ $maba->email }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Ukuran Baju
                    </td>
                    <td>
                        : {{ $maba->ukuran_baju }}
                    </td>

                </tr>
            </table>
        </div>
        <div style="margin-top:20px">
            <h1>II. IDENTITAS SMA/SEDERAJAT</h1>
            <table class="isi">
                <tr>
                    <td style="width: 40%;">

                        Nama Sekolah
                    </td>
                    <td>
                        : {{ $maba->asal_sekolah }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Jurusan/Program
                    </td>
                    <td>
                        : {{ $maba->jurusan }}
                    </td>

                </tr>

            </table>
        </div>
        <div style="margin-top:20px">
            <h1>III. FAKULTAS DAN PROGRAM STUDI</h1>
            <table class="isi">
                <tr>
                    <td style="width: 40%;">

                        Pilihan Program Studi
                    </td>
                    <td>
                        : {{ $maba->prodi }}
                    </td>

                </tr>
                <tr>
                    <td style="width: 40%;">

                        Pilihan Kelas
                    </td>
                    <td>
                        : {{ $maba->pk }}
                    </td>

                </tr>

            </table>
        </div>
    </div>

    <div style="margin-left: 50px;margin-top:50px;">
        <table width="100%">
            <tr>
                <td>
                    <div>
                        <img class="pasphoto " src="{{ public_path('storage/' . $maba->photo) }}" alt="" />


                    </div>
                </td>
                <td>
                    <div style="text-align: center">
                        <div style="margin-bottom: 100px;">
                            Pohuwato, .............................................

                        </div>
                        <div style="margin-bottom: 10px;">
                            (........................................................................................................)
                        </div>
                        <div>
                            <em>Nama Lengkap</em>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
