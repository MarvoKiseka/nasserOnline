<nav class="navbar navbar-expand-md navbar-light navbar-laravel sec-nav">
            <div class="container">
                <div id="allProducts" class="dropdown pr-helper-dropdown col-md-2 col-sm-3">
                    <div >
                        <span id="all_product_text">All Print Products</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <vue-typehead></vue-typehead>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <span id="hi_login">Hi, Login!</span> <br> <span id="your_account">Your Account</span> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right set-account" aria-labelledby="navbarDropdown">
                                
                                    <button  href="#" class="btn btn-primary btn-sm" role="button">Login</button>
                                    
                                    <a class="dropdown-item" href="#!">
                                       Create Account
                                    </a>
                                    
                                    <a class="dropdown-item" href="#!">
                                       Orders
                                    </a>
                                </div>
                        </li>
                        <li  class="nav-item cart">
                            <a href="#!" class="nav-link">
                            <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>