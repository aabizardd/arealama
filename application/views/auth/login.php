<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"
                                style="background-image: url(https://img.freepik.com/free-vector/kids-online-lessons_52683-36818.jpg?size=626&ext=jpg); background-repeat: no-repeat;background-size: 100% 100%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Aplikasi</h1>
                                    </div>

                                    <?=$this->session->flashdata('alert')?>

                                    <?=form_error('username', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                	<strong>Maaf!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button></div>');?>

                                    <?=form_error('password', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                	<strong>Maaf!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button></div>');?>

                                    <form class="user" method="POST" action="<?=base_url('auth')?>">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" aria-describedby="emailHelp"
                                                value="<?=set_value('username');?>" placeholder="Masukkan Username">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>





</body>