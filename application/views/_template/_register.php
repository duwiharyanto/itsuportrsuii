<div class="login-box" style="margin-top: 30px">
    <div class="white-box">
        <?php if($this->session->flashdata('error')):?>
        <div class="alert alert-danger alert-dismissable ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Username sudah dipakai
        </div>                    
        <?php endif;?>        
        <form class="form-horizontal form-material" method="post" id="forminput" url="<?=base_url($onsignup)?>">
            <h3 class="box-title m-b-20">Daftat User</h3>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="Username" name="user_username">
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="Nama" name="user_nama">
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="email" required="" placeholder="Email" name="user_email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" required="" placeholder="Password" name="user_password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary p-t-0">
                        <input id="checkbox-signup" type="checkbox">
                        <label for="checkbox-signup"> Setuju dengan aturan yang <a href="#">berlaku</a></label>
                    </div>
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Daftar</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>Already have an account? <a href="<?=site_url('Login')?>" class="text-primary m-l-5"><b>Login</b></a></p>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo
    $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
      data: csfrData
    });    
    $(document).ready(function(){
        validasi()
    })
    function validasi(){
    $("#forminput").validate({
    errorPlacement: function ( error, element ) {
      if ( element.prop( "type" ) === "radio" ) {
        // error.insertAfter( element.parent( "label" ) );
        error.insertAfter( '.radio' );
      } else {
        error.insertAfter( element );
      }
      // Add the `help-block` class to the error element
      error.addClass( "help-block" );
      $('.error').css('font-weight', 'normal');
    },    
    highlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".form-group" ).addClass( "text-danger" ).removeClass( "text-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).parents( ".form-group" ).addClass( "text-success" ).removeClass( "text-error" );
    },
    submitHandler:function(form){
      var url=$('#forminput').attr('url');  
      // alert(url);
      $.ajax({
        url:url,
        type:'POST',
        dataType:'json',
        data:$('#forminput').serialize(),
        data:new FormData($('#forminput')[0]),
        processData:false,
        contentType:false,
        encode:true,
        cache:false,
        secureuri:false,
        cache:false,
        mimeType:'multipart/form-data',
        success:function(data){
          var param={
            status:data.status,
            msg:data.msg,
          };
         
          notifikasi(param);
          $('input').val('');
          //loaddata();
          console.log(data.success);
        },
        error:function(){
          var param={
            status:'danger',
            msg:'proses gagal',
          };
          notifikasi(param);        
            console.log('error');        
        }
      }) 
   
    }   
    });    
  } 
  function notifikasi(param){
    var placement = 'top-right';
    if(param.status=='danger'){
      var state = 'error';
      msg= param.msg;
    }else if(param.status=='success'){
      var state = 'success';
      msg = param.msg;
    }else{
      var state = 'error';
      msg = 'fatal error';
    }          
     $.toast({
      heading: 'Perhatian',
      text: msg,
      position: placement,
      loaderBg:'#ff6849',
      icon: state,
      hideAfter: 3500, 
      stack: 6
    });    
  }  
</script>