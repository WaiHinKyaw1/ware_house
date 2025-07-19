<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .product-card {
            margin-top: 100px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        table thead {
            background-color: #0d6efd;
            color: white;
        }

        .btn-primary, .btn-danger {
            min-width: 80px;
        }

        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="product-card">
            <h3 class="mb-4 text-primary">Product Management</h3>

            {{-- Search Bar & Add --}}
            <form class="row g-3 mb-4" method="GET" action="#">
                <div class="col-md-4">
                    <label for="product_name" class="form-label">Product Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" name="product_name" class="form-control" placeholder="Search by name">
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Search</button>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <a href="#" class="btn btn-success w-100"><i class="bi bi-plus-lg"></i> Add</a>
                </div>
            </form>

            {{-- Product Table --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Stock Quantity</th>
                            <th>Unit</th>
                            <th>Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
<tbody id="item-table-body">
    <tr>
        <td colspan="6" class="text-center text-muted">Loading...</td>
    </tr>
</tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/items')
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('item-table-body');
                tbody.innerHTML = '';

                if (data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted">No items found.</td></tr>';
                    return;
                }

                data.forEach((item, index) => {
                    const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.name}</td>
                            <td>${item.stock_quantity}</td>
                            <td>${item.unit}</td>
                            <td>${item.description}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-edit btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            })
            .catch(error => {
                console.error('Error fetching items:', error);
                document.getElementById('item-table-body').innerHTML = `
                    <tr><td colspan="6" class="text-danger text-center">Failed to load items.</td></tr>
                `;
            });
    });
</script>
</body>
</html>
