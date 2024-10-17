<!-- The code you provided is an HTML template for a web page. It includes various CSS and JavaScript
libraries, such as Font Awesome and Bootstrap, to enhance the styling and functionality of the page. -->

<!DOCTYPE html>
<html>
<head>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('public/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <div class="dropdown">



                </button>

                <div class="dropdown-menu" aria-labelledby="dLabel">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cos') as $id => $details)
                            @php $total += $details['pret'] * $details['quantity'] @endphp
                            @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-success">Ron{{ $total }}</span></p>
                            </div>
                        </div>
                    @if(session('cos'))
                        @foreach(session('cos') as $id => $details)
                            <div class="row cos-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cos-detail-img">

                                    </div>
                                <div class="col-lg-8 col-sm-8 col-8 cos-detail-product">
                                    <p>{{ $details['nume'] }}</p>
                                    <span class="price text-success"> ${{ $details['pret'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cos') }}" class="btn btn-primary btn-block">Vezi cos</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>

<br/>
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif

    @yield('content')
</div>

@yield('scripts')
</body>
</html>
