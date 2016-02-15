<?php $this->load->view('header_admin'); ?>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
  $(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
      
    $( "#send_label" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "<?php echo $base;?>ajax/ajax_getConnections", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          $('#send_to').val(ui.item.id+','+$('#send_to').val());
          return false;
        }
      });
      $('input[type=submit]').click(function(){
        if($('#send_to').val()==""){
            alert('Please type a valid recipient.');
            return false;
        }
      })            
  });
  </script>
<h3>COMPOSE MESSAGE</h3>
<div id="message-page-container" class="content-row" >
    <div id="message-content"> 
      <form method="post" action="<?php echo $base;?>admin/message_metro" class="adminfrm" style="padding: 20px 0;">
        
                <label>To: </label><input id="send_label" name="send_label" type="text" value="" class="input-xlarge" placeholder="ALL" required />
                <textarea id="send_to" name="send_to" style="display: none;"></textarea>
           
                <label>Subject:</label>
                <input type="text" name="subject" value="" placeholder="Subject" class="input-xlarge" required />
           <textarea name="message"  placeholder="Message" rows="5" required></textarea></li>
          
                
                <input type="submit" name="submit" value="Send" class="btn btn-info" /> 
                <a href="<?php echo $base;?>admin/message_metro" class="btn btn-warning">Cancel</a>
            
      </form>
     </div>
</div>
<style type="text/css">
    ul li label{
        display: inline-block;
        width: 60px;
    }
</style>
<?php $this->load->view('footer_admin'); ?>