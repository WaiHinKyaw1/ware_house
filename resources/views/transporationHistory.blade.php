<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transportation History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .card-custom {
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
            margin-bottom: 15px;
        }

        table thead {
            background-color: #0d6efd;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #e9f2fd;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 0.9rem;
            color: white;
        }

        .status-completed {
            background-color: #198754;
        }

        .status-pending {
            background-color: #ffc107;
            color: #212529;
        }

        .status-cancelled {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card-custom">
        <div class="card-title-custom">Transportation History</div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Items</th>
                        <th>From Destination</th>
                        <th>To Destination</th>
                        <th>Date</th>
                        <th>Truck Number</th>
                        <th>Charges</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Example rows --}}
                    <tr>
                        <td>1</td>
                        <td>10x CocaCola</td>
                        <td>Warehouse One</td>
                        <td>Shop A</td>
                        <td>2025-07-10</td>
                        <td>TRK-1234</td>
                        <td>$50</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>5x Sprite</td>
                        <td>Warehouse One</td>
                        <td>Shop B</td>
                        <td>2025-07-11</td>
                        <td>TRK-5678</td>
                        <td>$25</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>8x Fanta</td>
                        <td>Warehouse Two</td>
                        <td>Shop C</td>
                        <td>2025-07-12</td>
                        <td>TRK-9876</td>
                        <td>$40</td>
                        <td><span class="status-badge status-cancelled">Cancelled</span></td>
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
