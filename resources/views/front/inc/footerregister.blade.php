<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1" style="padding-top: 50px;">
                    <p>Postanite deo naše zajednice danas i napravite prvi korak na svom putu ka uspehu.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <h4>Newsletter</h4>
                    <p>Prijavite se i ostanite u toku sa novim obaveštenjima.</p>
                    <div class="social_icon">
                        <a href="#"> <i class="bi bi-facebook" style="font-size: 30px"></i> </a>
                        <a href="#"> <i class="bi bi-twitter" style="font-size: 30px"></i> </a>
                        <a href="#"> <i class="bi bi-instagram" style="font-size: 30px"></i> </a>
                        <a href="#"> <i class="bi bi-skype" style="font-size: 30px"></i> </a>
                        <a href=""><i class="bi bi-github" style="font-size: 30px"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h4>Kontaktirajte nas:</h4>
                    <div class="contact_info">
                        <p><span> Addresa :</span> Sjenica.</p>
                        <p><span> Telefon :</span> +381 66 965 8888 </p>
                        <p><span> Email : </span> phpskola@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p style="color: white;" class="footer-text m-0">
                             Copyright &copy;<script>document.write(new Date().getFullYear());</script> Sva prava zadržana od <i class="bi bi-gem" style="color: rgb(43, 43, 104);" aria-hidden="true">PHPŠKOLA</i>
                             <i class="bi bi-gem" style="color:rgb(43, 43, 104);" aria-hidden="true"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('front/js')}}/jquery-1.12.1.min.js"></script>
<script src="{{asset('front/js')}}/popper.min.js"></script>
<script src="{{asset('front/js')}}/bootstrap.min.js"></script>
<script src="{{asset('front/js')}}/jquery.magnific-popup.js"></script>
<script src="{{asset('front/js')}}/jquery.counterup.min.js"></script>
<script src="{{asset('front/js')}}/validationregister.js"></script>
@yield('scripts')
</body>

</html>