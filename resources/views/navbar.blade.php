<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Button Example</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom styles */
        .navbar {
            background-color: white;
            padding: 10px;
        }

        .nav-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 36px;
        }

        .nav-title h1 {
            font-size: 42px;
            margin: 0;
        }

        .nav-links {
            display: none;
            flex-direction: column;
            gap: 10px;
            /* margin-top: 10px; */
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
            /* background: #F4F7EC; */
            padding: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            padding: 5px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            border: 2px solid var(--Foundation-Green-Normal, #92AD42);
            color: var(--Foundation-Green-Dark, #6E8232);
            text-align: center;
            font-family: Poppins;
            font-size: 15px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.3px;
        }

        .nav-links a:hover {
            background-color: #f0f0f0;
        }

        /* Button styles */
        .navbar-toggler {
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        i.fas.fa-bars {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-title">
                <div>
                    <div class="forderoo" style="font-size:37px">FORDEROO</div>
                    @if (session()->has('tablenumber'))
                    <p><b>Anda berada di meja {{ session('tablenumber') }}</b></p>
                    @else
                    <p><b>Scan kode QR untuk memesan</b></p>
                    @endif
                </div>
                <!-- Navigation button -->
                <button class="navbar-toggler" id="navbar-toggler">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <!-- Navigation links -->
            <div class="nav-links" id="nav-links">
                @if (session()->has('id_customer'))
                    <a href="/profile">Profile</a>
                    <a href="/history">History</a>
                    <a href="/favorite">Favorite</a>
                    <a style="
                    border: 2px solid crimson;
                ">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" style="color:crimson"><i
                                    class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </a>
                @else
                    <a href="/login">Login</a>
                @endif

            </div>
        </div>
    </nav>

    <script>
        // JavaScript to toggle the navigation links
        document.addEventListener('DOMContentLoaded', function() {
            var navLinks = document.getElementById('nav-links');
            var navbarToggler = document.getElementById('navbar-toggler');

            navbarToggler.addEventListener('click', function() {
                if (navLinks.style.display === 'none' || navLinks.style.display === '') {
                    navLinks.style.display = 'flex';
                } else {
                    navLinks.style.display = 'none';
                }
            });
        });
    </script>
</body>
