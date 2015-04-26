
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
//class Login_model extends CI_Model{
//    function __construct()
//    {
//        // Call the Model constructor
//        parent::__construct();
//    }
//
//    function get_user($usr,$pwd){
//        $query ="SELECT * FROM User WHERE name = ? and password = ?";
//        $arg = array($usr,md5($pwd));
//        $exec = $this->db->query($query,$arg)or die(mysql_error());
//        return $exec->num_rows();
//    }
//
//}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'openid.php';

class Login_model extends CI_Model
{
    public function index()
    {
        $openid = new LightOpenID("localhost");

        if($openid->mode)
        {
            if($openid->mode == 'cancel')
            {
                echo "User has canceled authentication !";
            }
            elseif($openid->validate())
            {
                $data = $openid->getAttributes();
                $email = $data['contact/email'];
                $first = $data['namePerson/first'];
                //          header("Location: http://speechwithmilo.com/speechtherapy/adminpanel/");
                echo "Identity : $openid->identity <br />";
                echo "Email : $email <br />";
                echo "First name : $first";
                echo "<pre>"; print_r($data); echo "</pre>";

//              echo "<meta http-equiv = 'refresh' content = '0; url=http://speechwithmilo.com/speechtherapy/adminpanel/'>";
            }
            else
            {
                echo "The user has not logged in";
            }
        }
        else
        {
            echo "Go to the login page to logged in";
        }
    }
}