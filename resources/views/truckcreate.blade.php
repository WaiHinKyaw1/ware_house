<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truck Create/Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f0f4f8;">

<div class="container mt-5">
    <div class="card shadow-sm" style="max-width: 600px; margin: auto;">
        <div class="card-header bg-primary text-white fw-bold">
            Truck Create / Edit
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('trucks.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="plate_no" class="form-label">Plate No</label>
                    <input type="text" class="form-control" id="plate_no" name="plate_no" required>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Capacity</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" required>
                </div>

                <div class="mb-3">
                    <label for="driver_id" class="form-label">Select Driver</label>
                    <select class="form-select" id="driver_id" name="driver_id" required>
                        <option value="">Choose a driver</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('trucks.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
