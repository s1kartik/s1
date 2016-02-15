<!-- END PAGE CONTAINER -->
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END PAGE CONTENT -->
<div id="page-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="width: 100%">
    <div class="modal-content">
        <div class="text-center">
            <h1> Print Following <button id="print-content" class="btn red-flamingo"><i class="icon-printer"></i></button> </h1>
        </div>
        <div id="printer-modal" class=""></div>
    </div>
  </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="global/plugins/respond.min.js"></script>
<script src="global/plugins/excanvas.min.js"></script> 
<![endif]-->

<script>
var js_base_path= '<?php echo $base;?>';
</script>

<script src="<?php echo $base;?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $base;?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- <script src="global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script> -->
<!-- <script src="global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script> -->
<!-- <script src="global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script> -->
<!-- <script src="global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script> -->
<!-- <script src="global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script> -->
<!-- <script src="global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script> -->
<!-- <script src="global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script> -->
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="<?php echo $base;?>global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jstree/dist/jstree.min.js"></script>

<script type="text/javascript" src="<?php echo $base;?>global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $base;?>source/pages/ui-tree.js"></script>
<script src="<?php echo $base;?>global/scripts/project.js" type="text/javascript"></script>
<script src="<?php echo $base;?>source/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $base;?>source/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo $base;?>source/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $base;?>source/pages/index.js" type="text/javascript"></script>
<script src="<?php echo $base;?>source/pages/tasks.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/table-advanced.js"></script>
<script src="<?php echo $base;?>global/jquery.print.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/html2canvas.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   project.init(); // init project core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features
   TableAdvanced.init(); 
   QuickSidebar.init(); // init quick sidebar
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   UITree.init();
   
	$(document).mouseup(function (e)
	{
	    var container = $("#tree-container");

	    if (!container.is(e.target) // if the target of the click isn't the container...
	        && container.has(e.target).length === 0) // ... nor a descendant of the container
	    {
	        container.hide();
	    }

	});

	$("#tree-button").click(function(){
    	$("#tree-container").show();
    	
    })
});
</script>
<script>
	$(".dropdown-user").on("click", "li a", function(){
		console.log($(this).text().trim());

		var header = $(this).text().trim() + '<span class="fa fa-angle-down" style="margin-left: 10px"></span>';
		$(this).parent().parent().parent().find(".dropdown-header").html(header);

	})
</script>
<script>
	$("#dashboard-printer").click(function(){
		$("#printer-modal").html($("#entire-page-content"));
		$('.row').find("[class^='col-'].drag").draggable();
		var closebutton = '<div class="close-button btn red-flamingo"><i class="fa fa-times-circle"></i></div>'
		$(".row").find("[class^='col-'].drag").append($(closebutton))

		$(".close-button").on("click", function (e){
			e.preventDefault();
			$(this).parent()[0].remove();

		})

		$(document).find("canvas").each(function(){
			if($(this).context.className == "flot-base"){
				// console.log($(this).context.className, $(this)[0].toDataURL("image/png"));
				var image = '<img src="'+ $(this)[0].toDataURL("image/png") + '"/>';
				// console.log($(image)[0], $(this).context, $(this).context.style, $(image)[0].style)
				// $(image)[0].style.cssText = document.defaultView.getComputedStyle($(this).context, "").cssText;
				// $(image)[0].style.cssText = $(this).context.style.cssText;
				// console.log($(image)[0].style);
				// $(this).parent().append($(image));
				// $(this).hide();
			}
			
		})

		$("a").click(function (e){
			e.preventDefault();
		})
	})

	$('#page-modal').on('hidden.bs.modal', function (e) {
	  location.reload();
	  console.log("reload");
	})

	$('#print-content').click(function(){
		$(".close-button").hide();
		html2canvas($("#entire-page-content"), {
		  taintTest: false,
		  onrendered: function(canvas) {
		  	// $("#entire-page-content").append(canvas.toDataURL("image/png"));
		    // $.print(canvas);
		    // var myImage = canvas.toDataURL("image/png");
		    // window.URL = window.URL || window.webkitURL;
			// window.URL.createObjectURL(canvas);
		  }
		});
		// generate();
		// $("#entire-page-content").append($("canvas").toDataURL("image/png"));
		$("#entire-page-content").print({
			//Use Global styles
        	addGlobalStyles: true,
        	stylesheet: "layout.css"
		});
	})

	
    function urlsToAbsolute(nodeList) {
        if (!nodeList.length) {
            return [];
        }
        var attrName = 'href';
        if (nodeList[0].__proto__ === HTMLImageElement.prototype 
        || nodeList[0].__proto__ === HTMLScriptElement.prototype) {
            attrName = 'src';
        }
        nodeList = [].map.call(nodeList, function (el, i) {
            var attr = el.getAttribute(attrName);
            if (!attr) {
                return;
            }
            var absURL = /^(https?|data):/i.test(attr);
            if (absURL) {
                return el;
            } else {
                return el;
            }
        });
        return nodeList;
    }

    function screenshotPage() {
        urlsToAbsolute(document.images);
        urlsToAbsolute(document.querySelectorAll("link[rel='stylesheet']"));
        var screenshot = document.documentElement.cloneNode(true);
        var b = document.createElement('base');
        b.href = document.location.protocol + '//' + location.host;
        var head = screenshot.querySelector('head');
        head.insertBefore(b, head.firstChild);
        screenshot.style.pointerEvents = 'none';
        screenshot.style.overflow = 'hidden';
        screenshot.style.webkitUserSelect = 'none';
        screenshot.style.mozUserSelect = 'none';
        screenshot.style.msUserSelect = 'none';
        screenshot.style.oUserSelect = 'none';
        screenshot.style.userSelect = 'none';
        screenshot.dataset.scrollX = window.scrollX;
        screenshot.dataset.scrollY = window.scrollY;
        var script = document.createElement('script');
        script.textContent = '(' + addOnPageLoad_.toString() + ')();';
        screenshot.querySelector('body').appendChild(script);
        var blob = new Blob([screenshot.outerHTML], {
            type: 'text/html'
        });
        return blob;
    }

    function addOnPageLoad_() {
        window.addEventListener('DOMContentLoaded', function (e) {
            var scrollX = document.documentElement.dataset.scrollX || 0;
            var scrollY = document.documentElement.dataset.scrollY || 0;
            window.scrollTo(scrollX, scrollY);
        });
    }

    function generate() {
        window.URL = window.URL || window.webkitURL;
        window.open(window.URL.createObjectURL(screenshotPage()));
    }
</script>
<!-- END JAVASCRIPTS -->
