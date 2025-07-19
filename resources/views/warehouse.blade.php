<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warehouse List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .warehouse-card {
            max-width: 1000px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title-custom {
            font-weight: bold;
            font-size: 1.3rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .btn-search, .btn-add {
            background-color: #0d6efd;
            color: white;
        }

        table thead {
            background-color: #0d6efd;
            color: white;
        }

        .btn-delete {
            background: transparent;
            color: #dc3545;
            border: none;
            cursor: pointer;
        }

        tbody tr:nth-child(even) {
            background-color: #e9f2fd;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="warehouse-card">
        <div class="card-title-custom">Warehouse List</div>

        <form method="GET">
            <div class="row g-3 mb-3">
                <div class="col-md-5">
                    <label class="form-label">Warehouse Name</label>
                    <input type="text" class="form-control bg-light" name="warehouse_name" value="Warehouse One" readonly>
                </div>
                <div class="col-md-5">
                    <label class="form-label">NGO Name</label>
                    <input type="text" class="form-control bg-light" name="ngo_name" value="Ngo One" readonly>
                </div>
                <div class="col-md-2 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-search w-100"><i class="bi bi-search"></i> Search</button>
                    <a href="#" class="btn btn-add w-100"><i class="bi bi-plus-circle"></i> Add</a>
                </div>
            </div>
        </form>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Warehouse Name</th>
                        <th>NGO Name</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Example row --}}
                    <tr>
                        <td>1</td>
                        <td>WarehouseOne</td>
                        <td>NgoOne</td>
                        <td>10000 kg</td>
                        <td>
                            <button class="btn-delete"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    {{-- Add dynamic rows here --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
