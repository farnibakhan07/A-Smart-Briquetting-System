<!DOCTYPE html>
<html>
<style>

</style>
<body>

<h1>Round Range Slider</h1>

<div id="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
  <p><span id="demo"></span></p>
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

</body>
</html>
