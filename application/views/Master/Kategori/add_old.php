<div class="row">
	<div class="col-sm-12">
	    <div class="white-box">
	        <div id="exampleValidator" class="wizard">
	            <ul class="wizard-steps" role="tablist">
	                <li class="active" role="tab">
	                    <h4><span><i class="ti-user"></i></span>Username</h4>
	                </li>
	                <li role="tab">
	                    <h4><span><i class="ti-credit-card"></i></span>Email ID</h4>
	                </li>
	                <li role="tab">
	                    <h4><span><i class="ti-check"></i></span>Password</h4>
	                </li>
	            </ul>
	            <form id="validation" class="form-horizontal">
	                <div class="wizard-content">
	                    <div class="wizard-pane active" role="tabpanel">
	                        <div class="form-group">
	                            <label class="col-xs-3 control-label">Username</label>
	                            <div class="col-xs-5">
	                                <input type="text" class="form-control" name="username" />
	                            </div>
	                        </div>
	                    </div>
	                    <div class="wizard-pane" role="tabpanel">
	                        <div class="form-group">
	                            <label class="col-xs-3 control-label">Email address</label>
	                            <div class="col-xs-5">
	                                <input type="text" class="form-control" name="email" />
	                            </div>
	                        </div>
	                    </div>
	                    <div class="wizard-pane" role="tabpanel">
	                        <div class="form-group">
	                            <label class="col-xs-3 control-label">Password</label>
	                            <div class="col-xs-5">
	                                <input type="password" class="form-control" name="password" />
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div> 
</div>
<script type="text/javascript">
    (function() {
        $('#exampleValidator').wizard({
            onInit: function() {
                $('#validation').formValidation({
                    framework: 'bootstrap',
                    fields: {
                        username: {
                            validators: {
                                notEmpty: {
                                    message: 'The username is required'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 30,
                                    message: 'The username must be more than 6 and less than 30 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9_\.]+$/,
                                    message: 'The username can only consist of alphabetical, number, dot and underscore'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The input is not a valid email address'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                different: {
                                    field: 'username',
                                    message: 'The password cannot be the same as username'
                                }
                            }
                        }
                    }
                });
            },
            validator: function() {
                var fv = $('#validation').data('formValidation');

                var $this = $(this);

                // Validate the container
                fv.validateContainer($this);

                var isValidStep = fv.isValidContainer($this);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }

                return true;
            },
            onFinish: function() {
                $('#validation').submit();
                alert('finish');
            }
        });

    })();
</script>
<?php include 'action.php';?>

