<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body, html {
            block-size: 100%;
            margin: 0;
        }
        .container-fluid {
            display: flex;
            height: 100%;
        }
        .resizable-panel {
            display: flex;
            flex-direction: column;
            inline-size: 300px;
            min-inline-size: 200px;
            max-inline-size: 500px;
            overflow: auto;
            border-inline-end: 1px solid #ddd;
            padding: 20px;
            position: relative;
        }
        .resizable-handle {
            position: absolute;
            inset-block-start: 0;
            inset-inline-end: 0;
            inline-size: 10px;
            height: 100%;
            cursor: ew-resize;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .button-24, .button-25 {
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
            font-size: 16px;
            font-weight: 800;
            line-height: 16px;
            min-block-size: 40px;
            outline: 0;
            padding: 12px 14px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            inline-size: 100%;
            text-decoration: none;
        }
        .button-24 {
            background: #FF4742;
            border: 1px solid #FF4742;
        }
        .button-24:hover,
        .button-24:active {
            background-color: initial;
            background-position: 0 0;
            color: #FF4742;
        }
        .button-24:active {
            opacity: .5;
        }
        .button-25 {
            background-color: #36A9AE;
            background-image: linear-gradient(#37ADB2, #329CA0);
            border: 1px solid #2A8387;
        }
        .button-25:hover {
            box-shadow: rgba(255, 255, 255, 0.3) 0 0 2px inset, rgba(0, 0, 0, 0.4) 0 1px 2px;
            text-decoration: underline;
            transition-duration: .15s, .15s;
        }
        .button-25:active {
            box-shadow: rgba(0, 0, 0, 0.15) 0 2px 4px inset, rgba(0, 0, 0, 0.4) 0 1px 1px;
        }
        .button-25:disabled {
            cursor: not-allowed;
            opacity: .6;
        }
        .button-25:disabled:active {
            pointer-events: none;
        }
        .button-25:disabled:hover {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="resizable-panel">
            <div class="resizable-handle"></div>
            <h2>Menu</h2>
            <ul class="list-unstyled">
                <li><a class="button-25 mb-2" href="{{ url('dashboard') }}">Home</a></li>
                <li><a class="button-25 mb-2" href="{{ url('settings') }}">Settings</a></li>
                <li><a class="button-25 mb-2" href="{{ url('applications') }}">Application</a></li>
                <li><a class="button-25 mb-2" href="{{ url('customTables') }}">Custom Tables</a></li>
                <li><a class="button-25 mb-2" href="{{ url('gps') }}">GPS</a></li> <!-- Butoni i ri GPS -->
            </ul>
            <a class="button-24 mt-3" href="{{ url('logout') }}">
                Logout
            </a>
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </script>
    <script>
        const resizablePanel = document.querySelector('.resizable-panel');
        const resizableHandle = document.querySelector('.resizable-handle');
        resizableHandle.addEventListener('mousedown', initResize, false);

        function initResize(e) {
            window.addEventListener('mousemove', resizePanel, false);
            window.addEventListener('mouseup', stopResize, false);
        }

        function resizePanel(e) {
            const newWidth = e.clientX - resizablePanel.getBoundingClientRect().left;
            if (newWidth >= 200 && newWidth <= 500) {
                resizablePanel.style.width = newWidth + 'px';
            }
        }

        function stopResize(e) {
            window.removeEventListener('mousemove', resizePanel, false);
            window.removeEventListener('mouseup', stopResize, false);
        }
    </script>
</body>

</html>