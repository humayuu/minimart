<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403</title>
    {{-- Bootstrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container min-vh-75 d-flex align-items-center justify-content-center py-5">
        <div class="text-center col-12 col-md-8 col-lg-6">

            <div class="d-inline-flex align-items-center justify-content-center bg-danger-subtle text-danger rounded-circle mb-4 p-3"
                style="width: 80px; height: 80px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-shield-lock" viewBox="0 0 16 16">
                    <path
                        d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.5 1.5 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.7 11.7 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.7 11.7 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.5 1.5 0 0 1 2.185 1.43C2.844 1.215 3.962.86 5.072.56" />
                    <path
                        d="M8 5a1 1 0 0 0-1 1v1h-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1V6a1 1 0 0 0-1-1zm-1 3h2v3H7z" />
                </svg>
            </div>

            <p class="text-danger font-monospace text-uppercase fw-semibold mb-1">Error 403</p>
            <h1 class="display-5 fw-bold text-dark mb-3">Access Denied</h1>
            <p class="lead text-secondary mb-4">
                Sorry, you don't have permission to access this page or resource.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg px-4 fs-6">
                    Back
                </a>
            </div>

        </div>
    </div>

</body>

</html>
