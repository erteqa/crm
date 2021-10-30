<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!doctype html>
<html  lang="<?php echo e(app()->getLocale()); ?>" >
<head>
    <title><?php echo e(__('lang.estemara_Compcreate')); ?></title>

    <meta property="og:image" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg">
    <meta property="og:image:url" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg"/>
    <meta property="og:image:secure_url" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="فورم تأسيس الشركات في تركيا  شركة ارتقاء القانونية التجارية">
    <meta name="keywords" content=" تأسيس الشركات في تركيا شركة ارتقاء القانونية التجارية">
    <meta name="distribution" content="https:/eritqaa.com.tr">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>










<!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- /fonts -->
    <!-- css -->


    <link rel="stylesheet" href="<?php echo e(URL::asset('css/style2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap.css')); ?>" />

    <style>
        <?php if(app()->getLocale()=='ar'): ?>
        form{
            text-align: right;
        }
        input{
            text-align: right;
        }
        select {text-align:right;  direction: rtl; }
        textarea {text-align:right;  direction: rtl; }
        .dd{
            border: thin black solid;

        }
        <?php endif; ?>
        option{
            font-size: 16px;
        }
    </style>
    <!-- /css -->
</head>

<body>

<div class="content-agileits">
    <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>

                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a href="<?php echo e(route('lang', ['lang' => 'ar'])); ?>">
        <img title="العربية" src="<?php echo e(asset('Images/'.'ar.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="<?php echo e(route('lang', ['lang' => 'tr'])); ?>">
        <img title="Turkish" src="<?php echo e(asset('Images/'.'tr.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="<?php echo e(route('lang', ['lang' => 'en'])); ?>">
        <img title="English " src="<?php echo e(asset('Images/'.'en.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <div class="row" style="margin-top: 5px">
        <button class="tablink col-3" onclick="openPage('Companies', this, 'blue')"  id="defaultOpen"><?php echo e(__('lang.compserv')); ?></button>
        <button class="tablink col-3" onclick="openPage('estemaraPUN', this, '#72EE1E')" ><?php echo e(__('lang.PUN')); ?></button>
        <button class="tablink col-3" onclick="openPage('estemara', this, 'green')"><?php echo e(__('lang.UN')); ?></button>

        <button class="tablink col-3" onclick="openPage('academy', this, 'orange')"><?php echo e(__('lang.academy')); ?></button></div>


    <div id="estemaraPUN" class="tabcontent">
        <h1 class="title"><?php echo e(__('lang.estemaraPUN')); ?></h1>
        <div class="left">
            <form  method="post" action="<?php echo e(route('Pruniver',['id'=>1,'gid'=>11])); ?>" enctype="multipart/form-data" data-toggle="validator" >
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="firstname" class="control-label"><?php echo e(__('lang.firstname')); ?></label>
                    <input type="text" class="form-control" id="firstname" placeholder="<?php echo e(__('lang.firstname')); ?>" name="firstname" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="nekedname" class="control-label"><?php echo e(__('lang.nekedname')); ?></label>
                    <input type="text" class="form-control" id="nekedname" placeholder="<?php echo e(__('lang.nekedname')); ?>" name="nekedname" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label"><?php echo e(__('lang.phone')); ?></label>
                    <input type="text" class="form-control" id="phone" placeholder="<?php echo e(__('lang.phone')); ?>" name="phone" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label"><?php echo e(__('lang.email')); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('lang.email')); ?>"  required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="sp0" class="control-label"><?php echo e(__('lang.spac')); ?></label>
                    <input type="text" class="form-control" id="sp0" placeholder="<?php echo e(__('lang.sp0')); ?>" name="sp[]" required>
                    <input type="text" class="form-control" id="sp1" placeholder="<?php echo e(__('lang.sp1')); ?>" name="sp[]">
                    <input type="text" class="form-control" id="sp2" placeholder="<?php echo e(__('lang.sp2')); ?>" name="sp[]">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input type="submit" id="submitNew" class="form-control btn btn-success" style="color:black;font-size: 22px;text-align: center" value="<?php echo e(__('lang.rejester')); ?>">
                </div>

            </form>
        </div>
        <div class="right UNV">
        </div>
    </div>

    <div id="estemara" class="tabcontent">
        <h1 class="title"><?php echo e(__('lang.estemara')); ?></h1>


        <div class="left">
            <form  method="post" action="<?php echo e(route('univ',['uid'=>3,'gid'=>5])); ?>" enctype="multipart/form-data" data-toggle="validator" >
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="passportnumber" class="control-label"><?php echo e(__('lang.passportnumber')); ?></label>
                    <input type="text" class="form-control" id="passport" placeholder="<?php echo e(__('lang.passportnumber')); ?>" name="passport" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="firstname" class="control-label"><?php echo e(__('lang.firstname')); ?></label>
                    <input type="text" class="form-control" id="firstname" placeholder="<?php echo e(__('lang.firstname')); ?>" name="firstname" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="fathername" class="control-label"><?php echo e(__('lang.fathername')); ?></label>
                    <input type="text" class="form-control" id="fathername" placeholder="<?php echo e(__('lang.fathername')); ?>" name="fathername" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="mothername" class="control-label"><?php echo e(__('lang.mothername')); ?></label>
                    <input type="text" class="form-control" id="mothername" placeholder="<?php echo e(__('lang.mothername')); ?>" name="mothername" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="nekedname" class="control-label"><?php echo e(__('lang.nekedname')); ?></label>
                    <input type="text" class="form-control" id="nekedname" placeholder="<?php echo e(__('lang.nekedname')); ?>" name="nekedname" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label"><?php echo e(__('lang.email')); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('lang.email')); ?>"  required>
                    <div class="help-block with-errors"></div>
                </div>


                <div class="form-group">
                    <label for="nathnality" class="control-label"><?php echo e(__('lang.nathnality')); ?></label>
                    <input type="text" class="form-control" id="nathnality" placeholder="<?php echo e(__('lang.nathnality')); ?>" name="nathnality" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="borndate" class="control-label"><?php echo e(__('lang.borndate')); ?></label>
                    <input type="text" class="form-control" id="borndate" placeholder="<?php echo e(__('lang.borndate')); ?>" name="borndate" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="address" class="control-label"><?php echo e(__('lang.address')); ?></label>
                    <input type="text" class="form-control" id="address" placeholder="<?php echo e(__('lang.address')); ?>" name="address" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="phone" class="control-label"><?php echo e(__('lang.phone')); ?></label>
                    <input type="text" class="form-control" id="phone" placeholder="<?php echo e(__('lang.phone')); ?>" name="phone" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="avarage" class="control-label"><?php echo e(__('lang.avarage')); ?></label>
                    <input type="text" class="form-control" id="avarage" placeholder="<?php echo e(__('lang.avarage')); ?>" name="avarage" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="depart" class="control-label"><?php echo e(__('lang.depart')); ?></label>
                    <input type="text" class="form-control" id="depart" placeholder="<?php echo e(__('lang.depart')); ?>" name="depart" required>
                    <div class="help-block with-errors"></div>
                </div>


                <div class="form-group">
                    <label for="school" class="control-label"><?php echo e(__('lang.school')); ?></label>
                    <input type="text" class="form-control" id="school" placeholder="<?php echo e(__('lang.school')); ?>" name="school" required>
                    <div class="help-block with-errors"></div>
                </div>


                <div class="form-group">
                    <label for="sp0" class="control-label"><?php echo e(__('lang.spac')); ?></label>
                    <input type="text" class="form-control" id="sp0" placeholder="<?php echo e(__('lang.sp0')); ?>" name="sp[]" required>
                    <input type="text" class="form-control" id="sp1" placeholder="<?php echo e(__('lang.sp1')); ?>" name="sp[]">
                    <input type="text" class="form-control" id="sp2" placeholder="<?php echo e(__('lang.sp2')); ?>" name="sp[]">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="drgree" class="control-label"><?php echo e(__('lang.drgree')); ?></label>
                    <select class="form-control" name="drgree">
                        <span > <option style="font-weight: bold;font-size: large" value="<?php echo e(__('lang.unv')); ?>"><?php echo e(__('lang.unv')); ?></option></span>
                        <span > <option style="font-weight: bold;font-size: large" value="<?php echo e(__('lang.mas')); ?>"><?php echo e(__('lang.mas')); ?></option></span>
                        <span > <option style="font-weight: bold;font-size: large" value="<?php echo e(__('lang.doct')); ?>"><?php echo e(__('lang.doct')); ?></option></span>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>


                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="form-group w3ls-opt">
                    <label for="Phone" class="control-label"><?php echo e(__('lang.Gender')); ?></label>

                    <label class="w3layouts">
                        <input type="radio" name="gender" id="hire" value="male" checked><?php echo e(__('lang.male')); ?>

                    </label>
                    <label class="w3layouts label2">
                        <input type="radio" name="gender" id="work" value="female"><?php echo e(__('lang.Female')); ?>

                    </label>
                </div>
                <hr/>
                <div class="form-group">
                    <label for="passpor" class="control-label"><?php echo e(__('lang.passpor')); ?></label>
                    <input placeholder="<?php echo e(__('lang.passpor')); ?>" id="poster" multiple="multiple" type="file" name="passpor" value="upload"  required>
                    
                    
                    
                    

                </div>
                <hr/>
                <div class="form-group">
                    <label for="personal" class="control-label"><?php echo e(__('lang.personal')); ?></label>
                    <input placeholder="<?php echo e(__('lang.personal')); ?>" multiple="multiple" type="file" name="personal" value="upload"  required>
                    
                    
                    
                    
                </div>
                <hr/>
                <div class="form-group">
                    <label for="cirtifcate" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.cirtifcate')); ?></label>
                    <input placeholder="<?php echo e(__('lang.cirtifcate')); ?>" multiple="multiple" type="file" name="cirtifcate" value="upload" >

                </div>
                <hr/>
                <div class="form-group">
                    <label for="YOS" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.YOS')); ?></label>
                    <input placeholder="<?php echo e(__('lang.YOS')); ?>" multiple="multiple" type="file" name="YOS" value="upload" >

                </div>
                <hr/>
                <div class="form-group">
                    <label for="SAT" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.SAT')); ?></label>
                    <input placeholder="<?php echo e(__('lang.SAT')); ?>" multiple="multiple" type="file" name="SAT" value="upload" >

                </div>
                <hr/>
                <div class="form-group">
                    <label for="sconcir" class="control-label"><?php echo e(__('lang.sconcir')); ?></label>
                    <input placeholder="<?php echo e(__('lang.sconcir')); ?>" multiple="multiple" type="file" name="sconcir" value="upload"  required>

                </div>
                <div class="form-group">
                    <label for="cirstart" class="control-label"><?php echo e(__('lang.cirstart')); ?></label>
                    <input type="text" class="form-control" id="cirstart" placeholder="<?php echo e(__('lang.cirstart')); ?>" name="cirstart" required>
                    <div class="help-block with-errors"></div>
                </div>
                <hr>
                <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('alert-' . $msg)): ?>

                            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="form-group">
                    <input type="submit" id="submitNew" class="form-control btn btn-success" style="color:black;font-size: 22px;text-align: center" value="<?php echo e(__('lang.rejester')); ?>">
                </div>
            </form>
        </div>
        <div class="right UNV">

        </div>

    </div>

    <div id="Companies" class="tabcontent">
        <h1 class="title"><?php echo e(__('lang.estemara_Compcreate')); ?></h1>
        <div class="left">
            <form  method="post" action="<?php echo e(route('Compcreate',['id'=>1,'gid'=>10])); ?>" enctype="multipart/form-data" data-toggle="validator" >
                <?php echo e(csrf_field()); ?>



                <div class="form-group">
                    <label for="sp0" class="control-label"><?php echo e(__('lang.spac_comp')); ?></label>
                    <select class="js-example-basic-single form-control dd" name="sp">
                        <option id="sp0" value="<?php echo e(__('lang.serv1')); ?>"><?php echo e(__('lang.serv1')); ?></option>
                        <option id="sp0" value="<?php echo e(__('lang.serv2')); ?>"><?php echo e(__('lang.serv2')); ?></option>
                        <option id="sp0" value="<?php echo e(__('lang.serv3')); ?>"><?php echo e(__('lang.serv3')); ?></option>
                        <option id="sp0" value="<?php echo e(__('lang.serv4')); ?>"><?php echo e(__('lang.serv4')); ?></option>
                        <option id="sp0" value="<?php echo e(__('lang.serv5')); ?>"><?php echo e(__('lang.serv5')); ?></option>
                    </select></div>
                <div class="form-group">
                    <label for="firstname" class="control-label"><?php echo e(__('lang.firstname')); ?></label>
                    <input type="text" class="form-control" id="firstname" placeholder="<?php echo e(__('lang.firstname')); ?>" name="firstname" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="nekedname" class="control-label"><?php echo e(__('lang.nekedname')); ?></label>
                    <input type="text" class="form-control" id="nekedname" placeholder="<?php echo e(__('lang.nekedname')); ?>" name="nekedname" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label"><?php echo e(__('lang.phone')); ?></label>
                    <input type="text" class="form-control" id="phone" placeholder="<?php echo e(__('lang.phone')); ?>" name="phone" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label"><?php echo e(__('lang.email')); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('lang.email')); ?>"  required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="address" class="control-label"><?php echo e(__('lang.detles')); ?></label>
                    <textarea type="text" class="form-control" id="address" placeholder="<?php echo e(__('lang.detles')); ?>" name="address" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>



                <div class="form-group">
                    <input type="submit" id="submitNew" class="form-control btn btn-success" style="color:black;font-size: 22px;text-align: center" value="<?php echo e(__('lang.rejester')); ?>">
                </div>

            </form>
        </div>
        <div class="right comp">

        </div>

    </div>

    <div id="academy" class="tabcontent">
        <h1 class="title"><?php echo e(__('lang.AcademyForm')); ?></h1>


        <div class="left">
            <form  method="post" action="<?php echo e(route('academyform',['id'=>1,'gid'=>4])); ?>" enctype="multipart/form-data" data-toggle="validator">
                <?php echo e(csrf_field()); ?>



                <div class="form-group">
                    <label for="firstname" class="control-label"><?php echo e(__('lang.firstname')); ?></label>
                    <input type="text" class="form-control" id="firstname" placeholder="<?php echo e(__('lang.firstname')); ?>" name="firstname" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="fathername" class="control-label"><?php echo e(__('lang.fathername')); ?></label>
                    <input type="text" class="form-control" id="fathername" placeholder="<?php echo e(__('lang.fathername')); ?>" name="fathername" required>
                    <div class="help-block with-errors"></div>
                </div>


                <div class="form-group">
                    <label for="nekedname" class="control-label"><?php echo e(__('lang.nekedname')); ?></label>
                    <input type="text" class="form-control" id="nekedname" placeholder="<?php echo e(__('lang.nekedname')); ?>" name="nekedname" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label"><?php echo e(__('lang.email')); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('lang.email')); ?>"  required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="phone" class="control-label"><?php echo e(__('lang.phone')); ?></label>
                    <input type="tel" class="form-control" id="phone" placeholder="<?php echo e(__('lang.phone')); ?>" name="phone" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="Objective" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.Objective')); ?></label>
                    <input type="text" class="form-control" id="Objective" placeholder="<?php echo e(__('lang.Objective')); ?>" name="taxid" >
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="Previous_experience" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.Previous_experience')); ?></label>
                    <input type="text" class="form-control" id="Previous_experience" placeholder="<?php echo e(__('lang.Previous_experience')); ?>" name="company_taxid" >
                    <div class="help-block with-errors"></div>
                </div>



                <div class="form-group">
                    <label for="personal" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.personal')); ?></label>
                    <input placeholder="<?php echo e(__('lang.personal')); ?>" multiple="multiple" type="file" name="personal" value="upload"  >
                </div>
                <hr/>
                <div class="form-group">
                    <label for="Previous_certificates" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.Previous_certificates')); ?></label>
                    <input placeholder="<?php echo e(__('lang.Previous_certificates')); ?>" multiple="multiple" type="file" name="Previous_certificates[]" value="upload" >
                </div>




                <div class="form-group">
                    <button type="submit" class="btn btn-lg"><?php echo e(__('lang.rejester')); ?></button>
                </div>
            </form>
        </div>
        <div class="right UNV">

        </div>

    </div>

    <div class="clear"></div>
</div>
<p class="copyright-w3ls">© 2019 Student Registration Form. All Rights Reserved | Design by
    <a href="https:/eritqaa.com.tr/" target="_blank">ERITQAA</a>
</p>

<script>
    function openPage(pageName,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

<!-- js -->
<script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-2.1.4.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('js/validator.min.js')); ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript">


</script>

</body>

</html>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Univer/allservice.blade.php */ ?>