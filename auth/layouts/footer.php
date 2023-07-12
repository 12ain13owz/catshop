</body>

</html>

<script>
$(document).ready(function() {
  AOS.init();

  const path = location.pathname.split('/').pop();
  let url = `./${path}`;
  if (url.indexOf('account') > 0) {
    url = "./account.php";
  } else if (url.indexOf('product') > 0) {
    url = "./product.php";
  } else if (url.indexOf('category') > 0) {
    url = "./category.php";
  }

  $('a[href="' + url + '"]').addClass('active');
});

function onDelete(linkDel) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = linkDel
    }
  })
}

function NumberOnly(e) {
  e.value = e.value.replace(/[^0-9]/g, '')
}
</script>