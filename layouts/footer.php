<footer class="footer bg-dark text-white text-center pt-2 pb-1">
  <h6 class="text-footer">© 2020 Cat Shop. All Rights Reserved.</h6>
</footer>

<button id="scroll" class="btn-scroll"><i class="fas fa-angle-up"></i></button>

</body>

</html>

<script>
$(document).ready(function() {
  AOS.init();

  const path = location.pathname.split('/').pop();
  const url = `./${path}`;
  $('a[href="' + url + '"]').addClass('active');

  const btnScroll = $('#scroll');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btnScroll.addClass('show');
    } else {
      btnScroll.removeClass('show');
    }
  });

  btnScroll.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, '800');
  });
});
</script>