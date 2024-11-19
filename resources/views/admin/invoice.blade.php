<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom: 2px solid #dee2e6;
        }
        .invoice-footer {
            border-top: 2px solid #dee2e6;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #f1f1f1;
            text-align: center;
            font-weight: bold;
        }
        .total-row {
            font-size: 1.2em;
            font-weight: bold;
        }
        .invoice-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .invoice-table th {
            background-color: #f8f9fa;
        }
        .invoice-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .invoice-table .total-row {
            font-size: 1.3em;
            font-weight: bold;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <!-- Invoice Header -->
    <div class="invoice-header text-center mb-4">
        <h1 class="mb-2">Sales Invoice</h1>
        <p>Thank you for your purchase!</p>
    </div>

    <!-- Invoice Details -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h5>From:</h5>
            <p>
                <strong>G- Shop</strong><br>
                Brgy Pauli 1 Riza, Laguna<br>
                Philippines 4003<br>
                Phone: 09276977988<br>
                Email: jerimieperio23@gmail.com
            </p>
        </div>
        <div class="col-md-6 text-end">
            <h5>To:</h5>
            <p>
                <strong>{{ $invoice->name }}</strong><br>
                Phone: {{ $invoice->phone }}<br>
                Address: {{ $invoice->rec_address }}
            </p>
            <p>
                <strong>Invoice Date:</strong> {{ $invoice->created_at }}<br>
                <strong>Invoice #:</strong> {{ $invoice->id }}
            </p>
        </div>
    </div>

    <!-- Invoice Table -->
    <table class="table invoice-table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        
            <tr>
                <td>{{ $invoice->product->productName}}</td>
                <td>{{ $invoice->product->description}}</td>
                <td><img style="height: 60px" src="products/{{$invoice->product->image}}" alt="product image"></td>
                <td>{{ $invoice->quantity }}</td>
                <td>Php {{ $invoice->product->price}}</td>
                <td>Php {{ $invoice->total_price}}</td>
            </tr>
       
        </tbody>
        <tfoot>
        <tr class="total-row">
            <td colspan="4" class="text-end">Total:</td>
            <td>Php {{ $invoice->total_price }}</td>
        </tr>
        </tfoot>
    </table>

    <!-- Footer -->
    <div class="invoice-footer">
        <p>If you have any questions about this invoice, please contact us at jerimieperio23@gmail.com or call 09276977988.</p>
        <p><strong>Thank you for your order/s!</strong></p>
    </div>
</div>
</body>
</html>
