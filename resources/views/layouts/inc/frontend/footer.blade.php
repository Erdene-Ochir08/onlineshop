<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div>
    <div class="footer-area" id='footer'>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{url('/')}}">
                        <img src="http://127.0.0.1:8000/uploads/shopdata/1695727228.png" alt="" width="100%" style="margin-top:-17px;">
                    </a>
                </div>
                <div class="col-md-2">
                    <div class="f-link" style="margin-left:20px;">
                        <h4 class="footer-heading">Холбоосууд</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="" class="text-white">Нүүр</a></div>
                        <div class="mb-2"><a href="" class="text-white">Бүх категори</a></div>
                        <div class="mb-2"><a href="" class="text-white">Эрэлттэй бүтээгдэхүүн</a></div>
                        <div class="mb-2"><a href="" class="text-white">Шинэ бүтээгдэхүүн</a></div>
                        <div class="mb-2"><a href="" class="text-white">Онцлох бүтээгдэхүүн</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Холбоо барих</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$client->shop_address}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> +976 {{$client->phone_number}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i>  {{$client->email}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-clock-o"></i>  {{$client->working_hour}}
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="f-link" style="margin-left:20px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2674.0159792385734!2d106.89703057641061!3d47.916728271220066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d969257732eb775%3A0x2d37f7ad9586e60!2sComputer%20Land!5e0!3m2!1sen!2smn!4v1695779066426!5m2!1sen!2smn" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
