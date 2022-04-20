<head>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/adminHome.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
@php
    $user = auth()->user()
@endphp
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{route('admin.home')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Beranda
                    </a>
                    
                    <a class="nav-link" href="{{route('cabang.index')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-share-nodes"></i></i></div>
                        Cabang
                    </a>
                    
                    <a class="nav-link" href="{{route('distributor.index')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-people-carry-box"></i></i></i></div>
                        Distributor
                    </a>

                    <div class="sb-sidenav-menu-heading">Katalog</div>
                    
                    <a class="nav-link" href="{{route('katalog.index')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></i></div>
                        Produk
                    </a>
                    
                    <a class="nav-link" href="{{route('stock.index')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-cubes-stacked"></i></i></div>
                        Stok Produk
                    </a>

                    <div class="sb-sidenav-menu-heading">Transaksi</div>
                    
                    <a class="nav-link" href="{{route('transaksi.admin.indexAdmin')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></i></div>
                        Transaksi
                    </a>

                    
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
</body>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/adminHome.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../js/chart-area-demo.js"></script>
<script src="../js/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>