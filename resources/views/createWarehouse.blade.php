<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warehouse Create</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .warehouse-card {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .warehouse-title {
            font-weight: bold;
            font-size: 1.4rem;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 25px;
        }

        .btn-add {
            background-color: #0d6efd;
            color: white;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="warehouse-card">
        <div class="warehouse-title">Warehouse Create</div>

        <form method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Warehouse Name</label>
                <input type="text" class="form-control" name="warehouse_name" placeholder="Enter warehouse name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Warehouse Capacity</label>
                <input type="number" class="form-control" name="warehouse_capacity" placeholder="Enter capacity (e.g., 10000 kg)" required>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <button type="submit" class="btn btn-add px-4"><i class="bi bi-plus-circle"></i> Add</button>
                <a href="#" class="btn btn-cancel px-4"><i class="bi bi-x-circle"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
