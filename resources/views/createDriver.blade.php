<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Driver Create/Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f0f4f8;">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            Driver Create/Edit
        </div>
        <div class="card-body">

            <form action="" method="POST">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $driver->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="license_no" class="form-label">License No</label>
                    <input type="text" class="form-control" name="license_no" id="license_no" value="{{ old('license_no', $driver->license_no ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $driver->phone ?? '') }}" required>
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
