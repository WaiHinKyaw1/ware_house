<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create/Edit Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .form-card {
            max-width: 600px;
            margin: 100px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            background-color: #0d6efd;
            color: white;
            padding: 12px 20px;
            border-radius: 10px 10px 0 0;
            margin: -40px -40px 30px -40px;
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-card">
        <div class="form-title">Product Create / Edit</div>

        {{-- Product Form --}}
        <form method="POST">
            @csrf

            <div class="mb-3">
                <label for="warehouse" class="form-label">Warehouse</label>
                <input type="text" class="form-control bg-light" id="warehouse" name="warehouse" value="Warehouse One" readonly>
            </div>

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="text" class="form-control" id="unit" name="unit" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Add</button>
                <a href="#" class="btn btn-cancel"><i class="bi bi-x-circle"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
