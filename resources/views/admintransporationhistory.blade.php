<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transportation History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons (Optional) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #0d6efd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 10px 10px;
        }

        .navbar .nav-link {
            color: white !important;
            margin-right: 10px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .navbar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 0.5rem;
        }

        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }

        .logout-link {
            color: #ffc107 !important;
        }

        .main-card {
            margin-top: 80px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .table thead th {
            vertical-align: middle;
            text-align: center;
        }

        .table tbody td {
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg px-4 fixed-top">
        <a class="navbar-brand" href="#"><i class="bi bi-box"></i> MyApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Transportation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">History</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout-link" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Main content --}}
    <div class="container">
        <div class="main-card">
            <h3 class="text-primary mb-4 text-center">Transportation History</h3>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Ngo Name</th>
                            <th>Items</th>
                            <th>Date</th>
                            <th>From Destination</th>
                            <th>To Destination</th>
                            <th>Truck</th>
                            <th>Charges</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>...</td>
                            <td>...</td>
                            <td>....</td>
                            <td>........</td>
                            <td>..........</td>
                            <td>...</td>
                            <td>....</td>
                        </tr>
                        {{-- Add more rows or loop over data --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
