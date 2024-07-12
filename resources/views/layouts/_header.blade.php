<link rel="icon" href="{{ asset('assets') }}/images/logo nf.jpg">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets') }}/fonts/icomoon/style.css">

<link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/aos.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
<style>
    #anchorR {
        background-color: rgba(0, 0, 0, .5);
        display: block;
        z-index: 99;
        height:100%;
        box-sizing:border-box;
    }
    #pop-profile {
        display: none;
        z-index: 99;
        position: absolute;
        right: 30px;
        top: 40px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        border: 2px solid white;
        list-style: none;
        padding: 0;
        box-sizing: border-box;
        height: auto;
        width: 150px;
    }
    #pop-profile li {
        display: flex;
        background-color: #007bff;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 40px;
        gap: 5px;
    }
    #pop-profile li a {
        color: white;
        display: block;
    }
    #pop-profile li:hover {
        background-color: rgba(0, 123, 255, .6) !important;
    }
    .site-mobile-menu .site-nav-wrap #pop-profile {
        display: block;
        width: 100%;
        top: 50px;
        border: 2px solid #007bff;
    }
    .info {
        background: red;
        padding: 15px;
        font-weight: bold;
        color: white;
        text-align: center;
        border-radius: 5px;
    }
    .error-parent {
        position: relative;
    }
    .error {
        position: absolute;
        left: 17px;
        top: -25px;
        color: red;
    }
    .form-group {
        margin-bottom: 2rem;
    }

    .card-content .form-group:last-child, .card-footer .form-group {
        margin-bottom: 0;
    }
    textarea {
        resize: none;
    }
</style>