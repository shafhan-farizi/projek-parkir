<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Tailwind is included -->
<link rel="stylesheet" href="{{ asset('assets') }}/css/main-auth.css?v=1628755089081">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

<link rel="icon" href="{{ asset('assets') }}/images/logo nf.jpg">
<style>
  ::-webkit-input-placeholder {
    color: #000 !important;
    opacity: 0.6 !important;
  }
  body#auth {
    background: url('assets/images/gedung\ a\ nf.jpeg');
    background-size: cover;
    background-position: center;
  }
  input.auth {
    color: #000;
  }
  .card.auth {
    backdrop-filter: blur(20px);
    background-color: transparent !important;
    color: white;
    box-shadow: 0 0 55px 0px RGBA(0, 0, 0, 0.3);
  }
  .help.auth {
    color: white;
    opacity: 0.7;
  }
  .is-hero-bar {
    height: 80vh;
  }
  .error-parent {
    position: relative;
  }
  .error {
    position: absolute;
    left: 0;
    top: 70px;
    color: red;
  }
  .textareaEr {
    top: 125px;
  }
  textarea {
    resize: none;
  }
  .not-paid {
    background-color: rgba(239, 68, 68, 1);
  }
  .not-paid:hover {
    background-color: rgba(220, 38, 38, 1);
  }
  .paid {
    background-color: rgba(16, 185, 129, 1);
  }
  .paid:hover {
    background-color: rgba(5, 150, 105, 1)
  }
  .not-paid, .paid {
    color: white;
    padding: 5px 10px;
    border-radius: 50px;
  }
  ul.recommend {
    display: none;
    position: absolute;
    background-color: rgba(59, 130, 246, 1);
    color: #FFF;
    width: 263px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    z-index: 99;
  }
  ul.recommend li {
    padding: 5px;
  }
  ul.recommend li:hover {
    background-color: rgba(37, 99, 235, 1);
  }
  .info {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    background-color: #eee;
    padding: 15px;
  }
  #detail-informasi {
    display: none;
  }
</style>