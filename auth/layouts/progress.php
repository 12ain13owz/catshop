<div>
  <progress value="0" max="3" id="progressBar"></progress>
</div>

<script>
var timeleft = 1;
var downloadTimer = setInterval(function() {
  if (timeleft >= 3) {
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = timeleft;
  timeleft += 1;
}, 1000);
</script>