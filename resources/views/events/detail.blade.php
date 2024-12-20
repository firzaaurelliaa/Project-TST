<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <x-navbar />
</head>

<body>
    <!-- <header class="header">
        <div class="logo">PLANIT</div>
    </header> -->

    <div class="button-container">
        <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.8806 3.87993C11.7645 3.76352 11.6266 3.67116 11.4747 3.60815C11.3229 3.54513 11.1601 3.5127 10.9956 3.5127C10.8312 3.5127 10.6684 3.54513 10.5166 3.60815C10.3647 3.67116 10.2268 3.76352 10.1106 3.87993L1.70065 12.2899C1.60794 12.3824 1.5344 12.4923 1.48421 12.6133C1.43403 12.7343 1.4082 12.864 1.4082 12.9949C1.4082 13.1259 1.43403 13.2556 1.48421 13.3766C1.5344 13.4975 1.60794 13.6074 1.70065 13.6999L10.1106 22.1099C10.6006 22.5999 11.3906 22.5999 11.8806 22.1099C12.3706 21.6199 12.3706 20.8299 11.8806 20.3399L4.54065 12.9999L11.8906 5.64993C12.3706 5.15993 12.3706 4.36993 11.8806 3.87993Z"
                fill="#348AC9" />
        </svg>
        <a href="/dashboard" class="back-button">Semua event</a>
    </div>

    <div class="container">
        <main class="content">
            <!-- <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="background-image"> -->
            <div class="image-container">
            <!-- <img src="/asset/BgLanding 3.jpg" alt="{{ $event->name }}" class="background-image"> -->
            @if($event->image)
                    <img src="{{ asset('storage/images/' . $event->image) }}" alt="Event Image"
                                style="width: 318px; height: 216px; object-fit: cover;" class="background-image">
                @endif
            <div class="gradient-overlay"></div>
            <div class="title">
                <h1>{{ $event->name }}</h1>
            </div>
            </div>
            <!-- <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="main-image">
            <h1>{{ $event->name }}</h1> -->
            <p class="date">Diunggah pada {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
            <p class="description">{{ $event->description }}</p>
        </main>
    </div>
    <!-- <svg xmlns="http://www.w3.org/2000/svg">
        <path
            d="M1401.67 359.5C1416.11 366.49 1442 367 1442 367V206L1440.86 44H2L-2 373C-2 373 7.17664 368.544 12.8094 365.243C19.663 361.226 24.2752 359.73 29.7345 353.959C35.4158 347.954 38.175 343.609 40.3127 335.624C42.4492 327.643 40.3127 314.467 40.3127 314.467C40.3127 314.467 54.0986 328.08 64.9951 333.508C74.2743 338.131 80.1227 339.78 90.3827 341.265C102.932 343.082 110.618 343.297 122.822 339.855C135.283 336.341 142.499 332.707 151.736 323.635C160.464 315.064 162.746 307.905 167.956 296.837C173.464 285.135 178.674 265.5 178.674 265.5L232.835 248.883C232.835 248.883 307.872 224.746 357.658 222.085C386.555 220.54 431.705 224.906 431.705 224.906L426.064 227.726L294.894 261.577L240.593 279.912L293.484 267.923C293.484 267.923 373.944 246.878 426.064 250.293C449.423 251.824 462.258 255.34 485.301 259.461C523.322 266.26 543.688 275.092 581.915 280.617C621.804 286.383 644.575 288.073 684.876 287.669C716.073 287.357 733.659 286.288 764.565 282.028C796.616 277.61 814.678 274.41 845.664 265.103C858.76 261.169 878.809 253.819 878.809 253.819C878.809 253.819 891.398 260.217 899.966 262.987C911.427 266.693 918.298 267.494 930.29 268.629C942.902 269.821 950.331 271.229 962.73 268.629C974.445 266.172 981.383 263.85 990.938 256.64C998.095 251.239 1006.45 239.715 1006.45 239.715L1133.39 270.039L1009.98 225.611L1069.22 218.559L1330.17 300.5C1330.17 300.5 1336.99 308.321 1341.17 313C1350.44 323.351 1358.03 332.71 1369.17 341C1379.83 348.921 1389.69 353.696 1401.63 359.479L1401.67 359.5Z"
            fill="#ECF5FF" />
        <path
            d="M1390.79 46.5865C1412.64 48.9027 1439.45 74.7949 1439.45 74.7949H1441.57V0.0424805L1098.13 30.3666C1098.13 30.3666 1160.85 34.0131 1201.09 34.5979C1223.12 34.918 1235.68 37.6108 1257.51 34.5979C1266.12 33.4087 1277.25 33.1874 1277.25 33.1874C1277.25 33.1874 1285.19 39.101 1289.95 43.7656C1296.61 50.286 1301.05 53.6942 1309.69 57.1646C1321.5 61.9002 1329.44 60.6498 1342.13 59.9855C1361.82 58.9559 1371.19 44.508 1390.79 46.5865Z"
            fill="#3E9ADD" fill-opacity="0.1" />
        <path d="M69.2264 159.321L280.085 54.9497L-2 119.124V162.142L43.1335 165.668L69.2264 159.321Z" fill="#3E9ADD"
            fill-opacity="0.1" />
    </svg> -->

    <!-- <div class="awan">
        <img src="/asset/pattern.png"  alt="awan">
    </div> -->

    <footer class="footer">
        <div class="footer-info">
            <h3>PlanIT event</h3>
            <p>Stay connected with our latest event!</p>
            <hr>
            <p>&copy; {{ date('Y') }} | PLANIT Team</p>
        </div>
        <div class="footer-logo">
            <img src="{{ asset('images/footer-logo.png') }}" alt="PlanIT Logo">
        </div>
    </footer>
</body>

</html>