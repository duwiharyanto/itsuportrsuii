<script type="text/javascript">
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo
    $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
      data: csfrData
    }); 
  $(document).ready(function(){   
    edit(); 
    validasi();  
    hapus();
    $('.select').select2(); 
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy",
        todayBtn: true,        
    });    
    $('#tampildata').DataTable({
      dom: 'Bfrtip',
      pageLength:100,
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            }, 
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },                      
        'colvis'
        ],
      //order: [[ 1, "desc" ]]      
    }); 
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })                        
  })
  function add(){
    var url=$("#add").attr('url');   
    $("#view").load(url);      
  }
  function edit(){   
    $('.edit').click(function(){
      var url=$(this).attr('url');
      var id=$(this).attr('id');
      //alert(id);
      $.ajax({
        type:'POST',
        url:url,
        data:{id:id},
        success:function(data){
          $("#view").html(data);       
        }
      })
      return false;        
    })
  }
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
            status:'success',
            msg:'simpan berhasil',
          };
         
          notifikasi(param);
          loaddata();
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

  function loaddata(){
    var url='<?= base_url($global->url."tabel")?>';
    $("#view").load(url);     
  }

  function hapus(){
    $('.hapus').click(function(){
      var url=$(this).attr('url');
      var id=$(this).attr('id');
      // swal({
      //   title: "Anda yakin ?",
      //   text: "data akan dihapus permanen",
      //   icon: "warning",
      //   buttons: true,
      //   dangerMode: true,
      // })
      // .then((willDelete) => {
      //   if (willDelete) {
      //       $.ajax({
      //         url:url,
      //         type:'POST',
      //         dataType:'json',
      //         data:{id:id},
      //         success:function(data){
      //           if(data.status=='success'){
      //             var status=data.status;
      //             var msg=data.msg;          
      //           }else{
      //             var status=data.status;
      //             var msg=data.msg;       
      //           }
      //           param={
      //             status:status,
      //             msg:msg,
      //           }
      //           notifikasi(param);
      //           loaddata();
      //           console.log(data.status);
      //         },
      //       error:function(){    
      //           console.log('aksi error');        
      //       }          
      //       })
      //   } else {
      //     swal("Proses dibatalkan", "", "error");
      //   }
      // });
        swal({   
            title: "Anda yakin ?",
            text: "data akan dihapus permanen",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {    
                 swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
                $.ajax({
                  url:url,
                  type:'POST',
                  dataType:'json',
                  data:{id:id},
                  success:function(data){
                    if(data.status=='success'){
                      var status=data.status;
                      var msg=data.msg;          
                    }else{
                      var status=data.status;
                      var msg=data.msg;       
                    }
                    param={
                      status:status,
                      msg:msg,
                    }
                    notifikasi(param);
                    loaddata();
                    console.log(data.status);
                  }, 
                  error:function(){    
                      console.log('aksi error');        
                  }          
                })                  
            } else {     
                swal("Proses dibatalkan", "", "error");   
            } 
        });      
      return false
    })     
  }
</script>