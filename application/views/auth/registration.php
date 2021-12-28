<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"
                        style="background-image: url(https://img.freepik.com/free-vector/kids-online-lessons_52683-36818.jpg?size=626&ext=jpg); background-repeat: no-repeat;background-size: 100% 100%;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>

                            <?=form_error('nim', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Maaf!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button></div>');?>

                            <?=form_error('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Maaf!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button></div>');?>

                            <?=form_error('password1', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Maaf!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button></div>');?>





                            <form class="user" method="POST" action="<?=base_url('auth/registration/')?>">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nim" name="nim"
                                        placeholder="NIM" value="<?=set_value('nim');?>">

                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address" value="<?=set_value('email');?>">

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1"
                                            name="password1" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2"
                                            name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->

                            </form>


                            <div class="text-center">
                                <a class="small" href="<?=base_url('auth')?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</body>