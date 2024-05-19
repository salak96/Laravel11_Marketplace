<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Marketplace</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to Our Marketplace</h1>
            <p>Find what you need or sell what you have!</p>
        </div>
    </header>
    <main>
        <section class="featured-products">
            <div class="container">
                <h2>Featured Products</h2>
                <div class="row">
                    <!-- Example product card (you can populate dynamically) -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="product-image.jpg" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h3 class="card-title">Product Name</h3>
                                <p class="card-text">$99.99</p>
                                <a href="{{ route('filament.admin.auth.register') }}" class="btn btn-primary">View Details</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="mt-auto">
        <div class="container">
            <p>&copy; 2024 Our Marketplace. All rights reserved.</p>
        </div>
    </footer>
    <!-- Link Bootstrap JS (Optional, only if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
