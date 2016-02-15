<?php
$subNav = array(
	"Welcome ; welcome.php ; #e61e25;",
	"Accordions ; accordions.php ; #e61e25;",
	"Sidebars ; sidebars.php ; #e61e25;",
);

set_include_path("../");
include_once("inc/essentials.php");
?>
<script type="text/javascript">
$mainNav.set("home");
</script>
<h1 class="margin-t-0">Accordions</h1>
<hr>
<div class="metro-accordion">
<h3>First title of the accordion</h3>
<div>To prevent that the window will scroll (if it can scroll) to the clicked header, add the class "no-scrollto" to that wrapping div (so it has "metro-accordion no-scrollto" as class. 
<p>To prevent that the opened div is stored in the url (so it isn't opened when the page is refreshed or linked to), add "no-memory" in the same way.
<p>If you want that only one accordion can be opened at once. Add the class "hide-others", in the same way.
</div>
<h3>Second title</h3>
<div>
Etiam metus sem, tristique vel dignissim sed, imperdiet et mauris. Duis id urna a magna tempus consequat. Pellentesque imperdiet blandit congue. Quisque tempor felis eget magna accumsan posuere sollicitudin diam scelerisque. Curabitur ut sapien vitae eros imperdiet luctus a sit amet nulla. Praesent fermentum, neque id laoreet interdum, nunc nulla eleifend mi, a semper risus ante quis libero. Integer leo nulla, consequat vitae rhoncus nec, feugiat vel ligula. Integer dolor massa, pretium a dapibus nec, tincidunt eu elit.
</div>
<h3>Title three</h3>
<div>
Morbi at libero posuere sapien egestas iaculis quis quis tortor. Nunc at libero ac felis consequat eleifend. Vivamus sit amet vulputate turpis. Fusce eget velit ac mauris posuere adipiscing. Curabitur nunc nisi, eleifend sit amet feugiat nec, tincidunt vitae nibh. Etiam in nisi lorem, a accumsan dolor. Curabitur ipsum risus, convallis non varius eleifend, rutrum in neque. Morbi vel lacus porta turpis hendrerit faucibus. Proin vestibulum velit vitae magna mattis a luctus nibh accumsan. Suspendisse in purus nulla, sit amet faucibus neque. Nam tortor lacus, laoreet eu facilisis quis, pharetra sit amet tellus. Curabitur ullamcorper sollicitudin est, id imperdiet quam viverra at. Phasellus dapibus fringilla accumsan. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultricies tincidunt laoreet.
</div>
</div>