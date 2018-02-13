@extends('layouts.layoutAdmin')

@section('content')
    <hr class="">

    <div class="container target">
        <div class="row">
            <div class="col-sm-10">
                <h1 class="">{{ $admin->first_name  }}</h1>

                <button type="button" class="btn btn-success">Enviar Correo</button>  <button type="button" class="btn btn-info">Enviar mensaje</button>
                <br>
            </div>
            <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.rlsandbox.com/img/profile.jpg"></a>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Fecha  de registro </strong></span>{{ $admin->created_at  }} </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Fecha  último acceso</strong></span><span><p>{{ $admin->last_login  }} </p></span></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Rol </strong></span> {{ $admin->roles()->first()->slug }}</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Curso  / Carrera

                    </div>
                    <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i>{{ $admin->first_name  }}.

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Redes Sociales <i class="fa fa-link fa-1x"></i>

                    </div>
                    <div class="panel-body"><a href="http://bootply.com" class="">{{ $admin->first_name  }}</a>

                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i>

                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Shares</strong></span> 125</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Followers</strong></span> 78</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">	<i class="fa fa-facebook fa-2x"></i>  <i class="fa fa-github fa-2x"></i>
                        <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i>  <i class="fa fa-google-plus fa-2x"></i>

                    </div>
                </div>
            </div>
            <!--/col-3-->
            <div class="col-sm-9" style="" contenteditable="false">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $admin->first_name  }} Biografía / Descripción</div>
                    <div class="panel-body"> A long description about me.

                    </div>
                </div>
                <div class="panel panel-default target">
                    <div class="panel-heading" contenteditable="false">Últimos Hechos</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    {{--<img alt="300x200" src="http://lorempixel.com/600/200/people">--}}
                                    <div class="caption">
                                        <h3>
                                            Rover
                                        </h3>
                                        <p>
                                            Cocker Spaniel who loves treats.
                                        </p>
                                        <p>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    {{--<img alt="300x200" src="http://lorempixel.com/600/200/city">--}}
                                    <div class="caption">
                                        <h3>
                                            Marmaduke
                                        </h3>
                                        <p>
                                            Is just another friendly dog.
                                        </p>
                                        <p>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    {{--<img alt="300x200" src="http://lorempixel.com/600/200/sports">--}}
                                    <div class="caption">
                                        <h3>
                                            Rocky
                                        </h3>
                                        <p>
                                            Loves catnip and naps. Not fond of children.
                                        </p>
                                        <p>

                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Starfox221's Bio</div>
                    <div class="panel-body"> A long description about me.

                    </div>
                </div></div>


            <div id="push"></div>
        </div>
        <footer id="footer">
            <div class="row-fluid">
                <div class="span3">
                    <p>
                        <a href="http://twitter.com/Bootply" rel="nofollow" title="Bootply on Twitter" target="ext">Twitter</a><br>
                        <a href="https://plus.google.com/+Bootply" rel="publisher">Google+</a><br>
                        <a href="http://facebook.com/Bootply" rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>
                        <a href="https://github.com/iatek/bootply" title="Bootply on GitHub" target="ext">GitHub</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p>
                        <a data-toggle="modal" role="button" href="#contactModal">Contact Us</a><br>
                        <a href="/tags">Tags</a><br>
                        <a href="/bootstrap-community">Community</a><br>
                        <a href="/upgrade">Upgrade</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p>
                        <a href="http://www.bootbundle.com" target="ext" rel="nofollow">BootBundle</a><br>
                        <a href="https://bootstrapbay.com/?ref=skelly" target="_ext" rel="nofollow" title="Premium Bootstrap themes">Bootstrap Themes</a><br>
                        <a href="http://www.bootstrapzero.com" target="_ext" rel="nofollow" title="Free Bootstrap templates">BootstrapZero</a><br>
                        <a href="http://upgrade-bootstrap.bootply.com/">2.x Upgrade Tool</a><br>
                    </p>
                </div>
                <div class="span3">
                    <span class="pull-right">©Copyright 2013-2014 <a href="/" title="The Bootstrap Playground">Bootply</a> | <a href="/about#privacy">Privacy</a></span>
                </div>
            </div>
        </footer>



        <!-- End Quantcast tag -->
        <div id="completeLoginModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Do you want to proceed?</h3>
            </div>
            <div class="modal-body">
                <p>This page must be refreshed to complete your login.</p>
                <p>You will lose any unsaved work once the page is refreshed.</p>
                <br><br>
                <p>Click "No" to cancel the login process.</p>
                <p>Click "Yes" to continue...</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="btnYes" class="btn danger">Yes, complete login</a>
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
            </div>
        </div>
        <div id="forgotPasswordModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Password Lookup</h3>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="formForgotPassword">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                            <input name="email" id="inputEmail" placeholder="you@youremail.com" required="" type="email">
                            <span class="help-block"><small>Enter the email address you used to sign-up.</small></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
                <a href="#" data-dismiss="modal" id="btnForgotPassword" class="btn btn-success">Reset Password</a>
            </div>

        </div>
        <div id="upgradeModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h4>Would you like to upgrade?</h4>
            </div>
            <div class="modal-body">
                <p class="text-center"><strong></strong></p>
                <h1 class="text-center">$4<small>/mo</small></h1>
                <p class="text-center"><small>Unlimited plys. Unlimited downloads. No Ads.</small></p>
                {{--<p class="text-center"><img src="/assets/i_visa.png" alt="visa" width="50"> <img src="/assets/i_mc.png" alt="mastercard" width="50"> <img src="/assets/i_amex.png" alt="amex" width="50"> <img src="/assets/i_discover.png" alt="discover" width="50"> <img src="/assets/i_paypal.png" alt="paypal" width="50"></p>--}}
            </div>
            <div class="modal-footer pull-center">
                <a href="/upgrade" class="btn btn-block btn-huge btn-success"><strong>Upgrade Now</strong></a>
                <a href="#" data-dismiss="modal" class="btn btn-block btn-huge">No Thanks, Maybe Later</a>
            </div>
        </div>
        <div id="contactModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Contact Us</h3>
                <p>suggestions, questions or feedback</p>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="formContact">
                    <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                    <div class="control-group">
                        <label class="control-label" for="inputSender">Name</label>
                        <div class="controls">
                            <input name="sender" id="inputSender" class="input-large" placeholder="Your name" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputMessage">Message</label>
                        <div class="controls">
                            <textarea name="notes" rows="5" id="inputMessage" class="input-large" placeholder="Type your message here"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input name="email" id="inputEmail" class="input-large" placeholder="you@youremail.com (for reply)" required="" type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
                <a href="#" data-dismiss="modal" aria-hidden="true" id="btnContact" role="button" class="btn btn-success">Send</a>
            </div>
        </div>




        {{--<script src="/plugins/bootstrap-pager.js"></script>--}}
    </div>

@endsection

