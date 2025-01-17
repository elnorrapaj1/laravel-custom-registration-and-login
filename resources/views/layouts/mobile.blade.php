<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .container-fluid {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
        }
        .header .btn-group {
            display: flex;
            gap: 10px;
        }
        .summary-cards {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }
        .summary-cards .card {
            flex: 1;
            margin: 0 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <div class="btn-group">
                @if (Route::currentRouteName() == 'welcome')
                    <a class="btn btn-primary" href="{{ url('dashboard') }}">Dashboard</a>
                    <a class="btn btn-primary" href="{{ url('clients') }}">Clients</a>
                @elseif (Route::currentRouteName() == 'dashboard')
                    <a class="btn btn-primary" href="{{ url('/') }}">Home</a>
                    <a class="btn btn-primary" href="{{ url('clients') }}">Clients</a>
                @elseif (Route::currentRouteName() == 'clients.index' || Route::currentRouteName() == 'clients.create' || Route::currentRouteName() == 'clients.edit')
                    <a class="btn btn-primary" href="{{ url('/') }}">Home</a>
                    <a class="btn btn-primary" href="{{ url('dashboard') }}">Dashboard</a>
                @endif
                @if (Route::currentRouteName() == 'clients.index')
                    <a href="{{ route('clients.create') }}" class="btn btn-primary">Add New Client</a>
                @endif
                <a class="btn btn-danger" href="{{ url('logout') }}">Logout</a>
            </div>
        </div>
        @if (Route::currentRouteName() == 'dashboard')
            <div class="summary-cards">
                <div class="card text-white bg-success">
                    <div class="card-header text-center">Arketim Total</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($totalArketim ?? 0, 2) }} €</h5>
                    </div>
                </div>
                <div class="card text-white bg-warning">
                    <div class="card-header text-center">Shpenzim Total</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($totalShpenzim ?? 0, 2) }} €</h5>
                    </div>
                </div>
                <div class="card text-white bg-info">
                    <div class="card-header text-center">Diferenca</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format(($totalArketim ?? 0) - ($totalShpenzim ?? 0), 2) }} €</h5>
                    </div>
                </div>
            </div>
        @endif
        <div class="main-content">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></script>
</body>
</html>