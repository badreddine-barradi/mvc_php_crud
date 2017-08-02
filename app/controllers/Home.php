<?php

/**
 * Created by PhpStorm.
 * User: pc
 * Date: 11/07/2017
 * Time: 12:54
 */
//use app\models\User;


class Home extends Controller
{

    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index',[ 'name' => $user->name]);

    }

    public function add()
    {
        $this->view('home/add');
    }

    public function insert()
    {
        if (isset($_POST['submit']))
            User::create([
                'username' => $_POST['username'] ,
                'email' => $_POST['email']
            ]);
        header('location:lister');
    }

    public function lister()
    {
        $users = User::all()->sortByDesc('id');
        $this->view('home/lister',[ 'users' => $users]);
    }

    public function edit($id)
    {
        $edit_user = User::find($id);
        //echo $edit_user->username;
        $this->view('home/edit',[ 'edit_user' => $edit_user]);
    }

    public function update()
    {
        $id = $_POST['id'];
        User::where( 'id' , $id)
            ->update([
                'username' => $_POST['username'],
                'email' => $_POST['email']
            ]);
        echo "<script>alert('Updated successfully')</script>";
        header('location:lister');
    }


    public function create($username = '' , $email = '')
    {
        User::create([
            'username' => $username,
            'email' => $email
        ]);
    }

    public function delete($id)
    {
        ?>

<?php

    }

    public function destroy($id)
    {
        User::destroy($id);
        echo "<script>alert('deleted successfully')</script>";
        header('location:../lister');
    }
}