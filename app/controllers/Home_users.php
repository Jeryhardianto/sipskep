  <?php 
class Home_users extends Controller{
    public function __construct()
    {
       
        if ($_SESSION['level']  != '5' || $_SESSION['status'] != 'logged') {
            header('Location:'.BASEURL.'auth/errorpage');
            exit;
        }
        date_default_timezone_set("Asia/Jakarta");
    }

     public function index(){
         
        $data['judul']      = 'Dashboard | SIPSKEP';
   
       $this->view('users/template/header', $data);
       $this->view('users/index', $data);
       $this->view('users/template/footer');
    }
    
  
}
  
  
 