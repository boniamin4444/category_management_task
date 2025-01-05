<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel Site')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .menu-item:hover {
            color: #ff6347; /* Tomato color */
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
        }
        footer .footer-column {
            margin-bottom: 20px;
        }
        footer .footer-column h5 {
            color: #ff6347;
        }
        footer .footer-column a {
            color: #fff;
            text-decoration: none;
        }
        footer .footer-column a:hover {
            color: #ff6347;
        }

        /* Custom margin for header links */
        .navbar-nav .nav-link {
            margin-left: 20px;
            margin-top: 5px;
        }
        .navbar
        {
            padding-left: 200px;
            padding-right: 100px;
        }
        header
        {
            position: sticky; /* sticky position add kora holo */
        top: 0; /* navbar page er top e thakbe */
        z-index: 1000;
        }

        #main-container
        {
            min-height: 75vh;
        }

    </style>
</head>
<body>
    <header>
        <!-- Your navigation menu -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url("/")}}">My Site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Left side menu items -->
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="{{url('/')}}"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="#"><i class="bi bi-info-circle"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="#"><i class="bi bi-gear"></i> Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="#"><i class="bi bi-phone"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="{{ route('categories.index')}}"><i class="bi bi-phone"></i>Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="{{ route('products.index')}}"><i class="bi bi-phone"></i>Add Product</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto"> <!-- Right side menu items -->
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="#"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="#"><i class="bi bi-person-plus"></i> Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    

    <div class="container mt-4" id="main-container">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-column">
                    <h5>About Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-column">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-column">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Email Us</a></li>
                        <li><a href="#">Locations</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
