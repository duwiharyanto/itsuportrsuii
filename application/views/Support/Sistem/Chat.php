<div class="row">
	<div class="col-md-12">
	    <div class="panel panel-info">
	        <div class="panel-wrapper collapse in" aria-expanded="true">
	            <div class="panel-body">
	            	<p>Chat :</p>
	            	<div id="response"></div>
	            </div>
	        </div>
	    </div>			
	    <div class="panel panel-info">
	        <div class="panel-wrapper collapse in" aria-expanded="true">
	            <div class="panel-body">
	            	<div id="response"></div>
					<form method="">
						<div class="row">
							<div class="col-sm-12">		
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">	
								<div class="form-group">
									<label>User</label>
									<input required type="text" name="name" id="name" class="form-control" title="Harus di isi"  value="<?=$this->session->userdata('user_nama')?>">
								</div>    
								<div class="form-group">
									<label>Chat</label>
									<input required type="text" name="message" id="message" class="form-control" title="Harus di isi">
								</div>										 
							</div>
						</div>
					</form>
	            </div>
	        </div>
	    </div>		
	</div> 
</div>
<?php //include 'action.php';?>
<script type="text/javascript">
	/**
 * AJAX long-polling
 *
 * 1. sends a request to the server (without a timestamp parameter)
 * 2. waits for an answer from server.php (which can take forever)
 * 3. if server.php responds (whenever), put data_from_file into #response
 * 4. and call the function again
 *
 * @param timestamp
 */
function getContent(timestamp){
    var url="<?=base_url('./chat/Server.php')?>"
    var queryString = {'timestamp' : timestamp};
    $.ajax(
        {
            type: 'GET',
            url: url,
            data: queryString,
            dataType: "json",
            success: function(data){
                // put result data into "obj"
                // var obj = jQuery.parseJSON(data);
                var obj = data;
                console.log(data);
                // put the data_from_file into #response
                 // $('#response').append('<br /><strong>'+obj.data_from_file[0].chat_nama + "</strong> : " +  obj.data_from_file[0].chat_pesan);
                $(obj.data_from_file[0]).each(function(i){         
                    // $('#response').append('<br /><strong>'+obj.data_from_file[0].chat_nama + "</strong> : " +  obj.data_from_file[0].chat_pesan);
                    // var html +='<br /><strong>'+obj.data_from_file[0].chat_nama + "</strong> : " +  obj.data_from_file[0].chat_pesan;
                    // $('#response').html(html)
                    console.log('Indeks ke-' + obj.data_from_file[i].chat_nama + ' berwarna ' + obj.data_from_file[i].chat_pesan + '<br/>')
                });                  
                // call the function again, this time with the timestamp we just got from server.php
                getContent(obj.timestamp);
            }
        }
    );
    // alert(url)
}

// initialize jQuery
$(function() {
    getContent();
    $(document).on('submit', 'form', function(eve){
        eve.preventDefault();
        $.ajax({
                type: 'POST',
                url: '<?=base_url($global->url."write")?>',
                data: $('form').serialize(),
                success: function(data){                    
                }
            }
        );
    });
    $(document).on('keypress', 'input', function(eve){
      if (eve.which == 13) {
        $('form').submit();
        $(this).val("");
        return false;    
      }
    });    
});

</script>
