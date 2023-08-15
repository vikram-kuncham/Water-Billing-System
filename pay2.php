<?php
session_start();
include 'db.php';
$id=$_REQUEST['id'];
$_SESSION['idd']=$id;
//echo "$id";
$result = mysqli_query($conn,"SELECT * FROM bill where id = '$id'");
$row = mysqli_fetch_row($result);
$amt=$row[4];
//echo "$amt"
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Payment Gateway Integration </title>
    <link rel="icon" href="images/dollar.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
    <script src='../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <script src="../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
            }
        })();
    </script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
            }
        })();
    </script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
            }
        })();
    </script>
    <script>
        window.ga = window.ga || function() {
            (ga.q = ga.q || []).push(arguments)
        };
        ga.l = +new Date;
        ga('create', 'UA-149859901-1', 'demo.w3layouts.com');
        ga('require', 'eventTracker');
        ga('require', 'outboundLinkTracker');
        ga('require', 'urlChangeTracker');
        ga('send', 'pageview');
    </script>
    <script async src='../../../js/autotrack.js'></script>
    <meta name="robots" content="noindex">
    <body>
        <link rel="stylesheet" href="../../../images/demobar_w3_4thDec2019.css">
        <!-- Demo bar start -->
        <div id="w3lDemoBar" class="w3l-demo-bar">
            <div class="main">
                <div class="content">
                    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion           
                                width: 'auto', //auto or any width like 600px
                                fit: true // 100% fit in a container
                            });
                        });
                    </script>
                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <div class="pay-tabs">
                                <h2>Select Payment Method</h2>
                                <ul class="resp-tabs-list">
                                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1"></label>Credit Card</span></li>
                                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><label class="pic3"></label>Net Banking</span></li>
                                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4"></label>PayPal</span></li>
                                    <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span><label class="pic2"></label>Debit Card</span></li>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                            <div class="resp-tabs-container">
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <div class="payment-info">
                                        <h3 class="pay-title">Credit Card Info</h3>
                                        <form>
                                            <div class="tab-for">
                                                <h5>Amount <?php echo "$amt"?> </h5>
                                                <!--<input class="pay-logo" type="text" value="₹.00" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '₹.00';}" required="">-->
                                            </div>
                                            <div class="tab-for">
                                                <h5>NAME ON CARD</h5>
                                                <input class="pay-logo" type="text" value="Enter the name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter the name';}" required="">
                                                <h5>CARD NUMBER</h5>
                                                <input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
                                            </div>
                                            <div class="transaction">
                                                <div class="tab-form-left user-form">
                                                    <h5>EXPIRATION</h5>
                                                    <ul>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="0" min="1" />
                                                        </li>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="20023" min="1" />
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-form-right user-form-rt">
                                                    <h5>CVV NUMBER</h5>
                                                    <input type="password" value="xxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxx';}" required="">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <a class="confirm-btn" href="successPage.php">SEND</a>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                    <div class="payment-info">
                                        <h3>Net Banking</h3>
                                        <div class="radio-btns">
                                            <div class="swit">
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Andhra Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Allahabad Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>IDBI Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>ICICI Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Overseas Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Punjab National Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>South Indian Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div>
                                                </div>
                                            </div>
                                            <div class="swit">
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>City Union Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>HDFC Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>IndusInd Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Syndicate Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Deutsche Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Corporation Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>UCO Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>Federal Bank</label> </div>
                                                </div>
                                                <div class="check_box">
                                                    <div class="radio"> <label><input type="radio" name="radio"><i></i>ING Vysya Bank</label> </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <a class="confirm-btn" href="successPage.php">CONTINUE</a>
                                    </div>
                                </div>
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                                    <div class="payment-info">
                                        <h3>PayPal</h3>
                                        <h4>Already Have A PayPal Account?</h4>
                                        <div class="login-tab">
                                            <div class="user-login">
                                                <h2>Login</h2>

                                                <form>
                                                    <input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
                                                    <input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">
                                                    <div class="user-grids">
                                                        <div class="user-left">
                                                            <div class="single-bottom">
                                                                <ul>
                                                                    <li>
                                                                        <input type="checkbox" id="brand1" value="">
                                                                        <label for="brand1"><span></span>Remember me?</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="user-right">
                                                            <input type="submit" value="LOGIN">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
                                    <div class="payment-info">

                                        <h3 class="pay-title">Debit Card Info</h3>
                                        <form>
                                            <div class="tab-for">
                                                <div class="tab-for">
                                                <h5>Amount <?php echo "$amt"?> </h5>
                                                    <!--<input class="pay-logo" type="text" value="₹.00" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '₹.00';}" required="">-->
                                                </div>
                                                <h5>NAME ON CARD</h5>
                                                <input class="pay-logo" type="text" value="Enter the name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter the name';}" required="">
                                                <h5>CARD NUMBER</h5>
                                                <input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
                                            </div>
                                            <div class="transaction">
                                                <div class="tab-form-left user-form">
                                                    <h5>EXPIRATION</h5>
                                                    <ul>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="6" min="1" />
                                                        </li>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="2023" min="1" />
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="tab-form-right user-form-rt">
                                                    <h5>CVV NUMBER</h5>
                                                    <input type="password" value="xxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxx';}" required="">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <a class="confirm-btn" href="successPage.php">SEND</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</body>
</html>