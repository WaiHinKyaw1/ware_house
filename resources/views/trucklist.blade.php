<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truck List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #e9f1fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .main-card {
            margin-top: 60px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary, .btn-secondary {
            border-radius: 8px;
            padding: 6px 16px;
        }

        .table thead {
            background-color: #0d6efd;
            color: white;
        }

        .btn-sm {
            padding: 4px 10px;
            font-size: 0.875rem;
        }

        .action-buttons button {
            margin-right: 6px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="main-card">
            <h3 class="text-primary mb-4">Truck List</h3>

<form class="mb-4">
    <div class="row g-2 align-items-end">
        <div class="col-md-4">
            <label for="truckName" class="form-label">Truck Name</label>
            <input type="text" id="truckName" class="form-control form-control-sm" placeholder="Enter truck name">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="bi bi-search"></i> Search
            </button>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-sm btn-success">
                <i class="bi bi-plus-lg"></i> Add
            </button>
        </div>
    </div>
</form>



            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Plate No</th>
                        <th>Model</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Driver Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Example row --}}
                    <tr>
                        <td>1</td>
                        <td>AB1234</td>
                        <td>Isuzu</td>
                        <td>3500 Kg</td>
                        <td>Available</td>
                        <td>John Doe</td>
                        <td class="action-buttons">
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
