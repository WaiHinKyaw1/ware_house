<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .form-card {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            background-color: #0d6efd;
            color: white;
            padding: 12px 20px;
            border-radius: 10px 10px 0 0;
            margin: -30px -30px 30px -30px;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .route-info {
            background-color: #1a2d4d;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-top: 30px;
            font-size: 1.2rem;
        }

        .btn-deliver {
            background-color: #0d6efd;
            color: white;
        }

        .btn-add {
            background-color: #0d6efd;
            color: white;
        }

        .btn-edit, .btn-delete {
            border: none;
            background: transparent;
            color: #0d6efd;
            cursor: pointer;
        }

        table thead {
            background-color: #0d6efd;
            color: white;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-card">
        <div class="form-title">Create Delivery Order</div>

        {{-- Form --}}
        <form method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Warehouse</label>
                    <input type="text" class="form-control bg-light" value="Warehouse One" readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Select Product</label>
                    <input type="text" class="form-control bg-light" value="CocaCola" readonly>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Qty</label>
                    <input type="number" class="form-control" name="quantity" required>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-add w-100"><i class="bi bi-plus-circle"></i> Add</button>
                </div>
            </div>
        </form>

        {{-- Product Table --}}
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>CocaCola</td>
                        <td>7</td>
                        <td>bottle</td>
                        <td><button class="btn-edit"><i class="bi bi-pencil"></i></button></td>
                        <td><button class="btn-delete"><i class="bi bi-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Route Info --}}
        <div class="route-info">
            Route Info
        </div>

        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-deliver px-4"><i class="bi bi-truck"></i> Deliver</button>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
