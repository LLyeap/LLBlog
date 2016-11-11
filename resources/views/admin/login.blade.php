<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <title>李雷的博客 后台管理系统 登陆</title>
    @include('admin.public.style')
    @yield('styles')
    <style>
        .alert-danger{padding-top:20px;}
        .alert-danger ul li{list-style-type: none;color:red;font-size:16px;}
        .capt-input{width:60%;}
        #captcha{border:0px;width:100px;height:35px;float: right;margin-top:-34px}
    </style>
</head>
<body>

<div class="wrapper-page">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <h3 class="text-center m-t-10"> <strong>博客</strong> 后台管理系统 </h3>
        </div>

        <div class="panel-body">
            <form method="post" id="signupForm" class="form-horizontal m-t-10 p-20 p-b-0" action="{{url('login')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="email" placeholder="邮箱">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" placeholder="密码">
                    </div>
                </div>
                <!--验证码开始-->
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control capt-input" name="captcha" type="text" placeholder="验证码">
                        <img id="captcha" src="{{url('code/captcha/1')}}"/>
                    </div>
                </div>
                <!--验证码结束-->
                <!--
                <div class="form-group ">
                    <div class="col-xs-12">
                        <label class="cr-styled">
                            <input type="checkbox" checked>
                            <i class="fa"></i>
                            记住
                        </label>
                    </div>
                </div>
                -->
                <div class="form-group text-center">
                    <div class="col-xs-12">
                        <button class="btn btn-block btn--md btn-success" type="submit">确认提交</button>
                    </div>
                </div>
            <!--
                <div class="form-group m-t-30">
                    <div class="col-sm-7">
                        <a href="{{url('recoverpw')}}"><i class="fa fa-lock m-r-5"></i> 忘记密码?</a>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="{{url('register')}}">注册新用户</a>
                    </div>
                </div>
                -->
            </form>
        </div>
        @include('admin.public.errors')
    </div>
</div>
</body>
@include('admin.public.script')

<script src="http://cdn.rooyun.com/js/jquery.validate.min.js"></script>
<script>

    /**
     * Theme: Velonic Admin Template
     * Author: Coderthemes
     * Form Validator
     */
    // 文档地址 http://www.runoob.com/jquery/jquery-plugin-validate.html
    !function($) {
        "use strict";

        var FormValidator = function() {
            //this.$commentForm = $("#commentForm"),
            this.$signupForm = $("#signupForm");
        };

        //初始化
        FormValidator.prototype.init = function() {
            // validate the comment form when it is submitted
            // this.$commentForm.validate();
            // validate signup form on keyup and submit
            this.$signupForm.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    captcha: {
                        required: true,
                        minlength: 4,
                    }
                },
                //提示信息
                messages: {
                    password: {
                        required: "请输入密码",
                        minlength: "您的密码必须至少有5个字符长"
                    },
                    captcha: {
                        required: '请输入验证码',
                        minlength: "验证码必须大于4位"
                    },
                    email: "请输入一个有效的电子邮件地址",
                }
            });
        },
                //init
                $.FormValidator = new FormValidator, $.FormValidator.Constructor = FormValidator
    }(window.jQuery),

//initializing
            function($) {
                "use strict";
                $.FormValidator.init()
            }(window.jQuery);
</script>
<script>
    var captcha = document.getElementById('captcha');
    captcha.onclick = function(){
        $url = "{{ URL('/code/captcha') }}";
        $url = $url + "/" + Math.random();
        this.src = $url;
    }
</script>
</html>