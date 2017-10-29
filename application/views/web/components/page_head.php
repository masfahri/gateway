<!-- NEW -->
<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span><i class="hillter-icon-cloud"></i> 18 °C</span>
                <span><i class="hillter-icon-location"></i><?php echo getOptions('company_address'); ?></span>
                <span><i class="hillter-icon-phone"></i> Customer service: <?php echo getOptions('company_number'); ?></span>
            </div>
            <div class="header_right float-right">
            <?php if (!$this->ion_auth->logged_in()): ?>
                <span class="login-register">
                    <a href="<?php echo site_url('users/register'); ?>">register</a>
                </span>
                <div class="dropdown language">
                    <span>LOGIN</span>
                    <ul>
                    <?php echo form_open('users/login', 'class="form" id="login-nav"'); ?>
                        <li>
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" name="identity" class="form-control input-sm" id="exampleInputEmail2" placeholder="Email address" required>
                        </li>
                        <li>
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" name="password" class="form-control input-sm" id="exampleInputPassword2" placeholder="Password" required>
                        </li>
                        <li>
                            <button type="submit" class="btn btn-success btn-block btn-xs">Sign in</button>
                        </li>
                        </form>
                    </ul>
                </div>
            </div>
            <?php else: ?>
            <div class="header_right float-right">
                <div class="dropdown language">
                    <span>Welcome<?php echo ' ' . ucwords($this->session->userdata('first_name').' '.$this->session->userdata('last_name')); ?></span>
                    <ul>
                        <li><a href="<?php echo site_url("users/edit_user/" . $this->session->userdata('user_id')); ?>"><i class="fa fa-user"></i> Edit Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('users/logout'); ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="header_content" id="header_content">

        <div class="container">
            <!-- HEADER LOGO -->
            <div class="header_logo">
                <a href="#"><img src="<?php echo ('assets/new/images/logo-header.png'); ?>" alt=""></a>
            </div>
            <!-- END / HEADER LOGO -->
            
            <!-- HEADER MENU -->
            <nav class="header_menu">
                <ul class="menu">
                    <?php echo get_menu(menu()); ?>
                </ul>
            </nav>

            <!-- END / HEADER MENU -->

            <!-- MENU BAR -->
            <span class="menu-bars">
                <span></span>
            </span>
            <!-- END / MENU BAR -->

        </div>
    </div>
</header>
    <!--  -->

<!-- END -->
    

