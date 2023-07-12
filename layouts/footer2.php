<footer class="footer bg-dark text-white text-center pt-2 pb-1 fixed-bottom">
  <h6 class="text-footer">© 2020 Cat Shop. All Rights Reserved.</h6>
</footer>

</body>

</html>

<script>
$(document).ready(function() {
  const path = location.pathname.split('/').pop();
  const url = `./${path}`;
  $('a[href="' + url + '"]').addClass('active');
});
</script>