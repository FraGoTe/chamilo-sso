Chamilo 1.9.8 SSO Sample
========================

 This is the "server" of my institution/university authentification "code"
  
  1. Active all the SSO option in your Chamilo installation: main/admin/settings.php?category=Security
  2. Make sure this script is located in the index page of the server you fill in the "Domain of the Single Sign On server" Chamilo setting
     For example this script must be located in example.com/index.php if you set the "Domain of the Single Sign On server" = example.com
  3. Create a user in chamilo and in your external system with login = "joe" and password = "doe"  
  4. Remember this is just a sample! Check the chamilo drupal extension for more information: 
     http://drupal.org/node/817682
  5. When activating the settings in step 1, the principal Chamilo file main/inc/local.inc.php will load the class main/auth/sso.class.php library 
     that will redirect to this field with some parameters.
