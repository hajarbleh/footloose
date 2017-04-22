1. Insert the small image into the webpage and specify path to the large image in the data-origin attribute:

<div class="imgBox">
  <img src="small.jpg" 
       data-origin="large.jpg"
  >
</div>
2. Insert both jQuery library and the jquery.imgzoom.js script in the webpage.

<script src="//code.jquery.com/jquery.min.js"></script>
3. Call the core function imgZoom on the top container and done.

$('.imgBox').imgZoom();
4. Customize the image zoom area.

$('.imgBox').imgZoom({
  boxWidth: 360,
  boxHeight: 360,
  marginLeft: 5,
});
5. Override the default attribute which can be used to hold the large image.

$('.imgBox').imgZoom({
  origin: 'data-origin'
});
