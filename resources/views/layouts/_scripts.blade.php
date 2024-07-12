<script src="{{ asset('assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('assets') }}/js/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.sticky.js"></script>
<script src="{{ asset('assets') }}/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.animateNumber.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.fancybox.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('assets') }}/js/aos.js"></script>

<script src="{{ asset('assets') }}/js/main.js"></script>
<script>
    let anchorR = document.getElementById('anchorR')
    let popProfile = document.getElementById('pop-profile')
    let popLi = document.querySelectorAll('.pop-li')
    
    anchorR.addEventListener('click', function() {
        if(popProfile.style.display == '' || popProfile.style.display == 'none') {
            popProfile.style.display = 'block'
        } else {
            popProfile.style.display = 'none'
        }
    })

    document.addEventListener('DOMContentLoaded', function() {
        
        window.addEventListener('click', e => {
            if(!e.target.closest('#anchorR') && !e.target.closest('#popProfile')) {
                popProfile.style.display = 'none'
            }
        })
    })

</script>