<?php
	define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/onlineShop/');
	define('CART_COOKIE', 'SBwi72UCklwiqzz2');
	define('CART_COOKIE_EXPIRE', time() + (86400 * 30));
	define('TAXRATE', 0.087);//SALES tax rate set to 0 if you dont charging tax
	
	define('CURRENCY', 'usd');
	define('CHECKOUTMODE', 'TEST'); // change test to live when you are ready to go live

	if(CHECKOUTMODE == 'TEST'){
		define('STRIPE_PRIVATE','sk_test_YoyyDYdrcMc8HFQkOouZrRC7');
		define('STRIPE_PUBLIC','pk_test_zIz6j3sVLqUoSmFZF8RJAKxc');
	}
	
	if(CHECKOUTMODE == 'LIVE'){
		define('STRIPE_PRIVATE','');
		define('STRIPE_PUBLIC','');
	}