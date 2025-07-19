<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Warehouse Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .warehouse-card {
            max-width: 700px;
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

        .btn-save {
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
        <div class="warehouse-title">Admin - Warehouse Management</div>

        <form method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Warehouse Name</label>
                <input type="text" class="form-control" name="warehouse_name" placeholder="Enter warehouse name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" name="location" placeholder="Enter location" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Capacity</label>
                <input type="number" class="form-control" name="capacity" placeholder="Enter capacity" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Manager</label>
                <input type="text" class="form-control" name="manager" placeholder="Enter manager name">
            </div>

            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input type="text" class="form-control" name="contact" placeholder="Enter contact number">
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <button type="submit" class="btn btn-save px-4"><i class="bi bi-save"></i> Save</button>
                <a href="#" class="btn btn-cancel px-4"><i class="bi bi-x-circle"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
