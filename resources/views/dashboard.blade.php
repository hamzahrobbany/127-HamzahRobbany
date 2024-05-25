@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <p>Selamat datang, {{ Auth::user()->name }}!</p>
                    <p>Ini adalah dashboard Anda. Di sini Anda dapat melihat ringkasan aktivitas terbaru, menyelesaikan tugas, atau menjelajahi fitur lainnya.</p>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Ringkasan Aktivitas</div>
                                <div class="card-body">
                                    <!-- Tambahkan grafik atau ringkasan statistik di sini -->
                                    <p>Anda dapat menambahkan grafik atau ringkasan statistik di sini untuk memberikan gambaran visual tentang aktivitas pengguna atau metrik lainnya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Tugas Terbaru</div>
                                <div class="card-body">
                                    <!-- Tambahkan daftar tugas terbaru di sini -->
                                    <p>Anda dapat menampilkan daftar tugas terbaru di sini untuk memberi pengguna gambaran tentang pekerjaan yang belum selesai atau yang baru ditugaskan kepada mereka.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
