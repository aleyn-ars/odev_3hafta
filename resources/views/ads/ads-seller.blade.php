@extends('layouts.admin-master')
@section('content')

            <div class="container-fluid">
                <h1 class="mt-4">Reklamlar</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Reklam Yönetimi</a></li>
                    <li class="breadcrumb-item active">Reklamlarım</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        Aylık reklam analizleriniz aşağıdaki grafikten inceleyebilirsiniz.Reklam bütçe analizinizi yapın
                        <a target="_blank" href="layout-sidenav-light.html">Reklam Bütçe Analizi</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Aylık Reklam Dağılımı--Ulaşılan Kişi Sayısı\Gün
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    <div class="card-footer small text-muted">12.30 Salı günü güncellendi.</div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Yıllık Reklam Analizi
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">12.30 Salı günü güncellendi.</div>
                        </div>
                    </div>

                </div>
            </div>
                <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">

                </div>
            </div>
        </footer>
@endsection


