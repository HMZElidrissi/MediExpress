<?php

namespace App\Controllers;
use App\Models\Patients;
 class PatientController extends Controller
 
 {

    public function aficher()
    {
        $Patients = new Patients();
        $results = $Patients->getAllPatients();
        $data = ['results' => $results];
        // print_r($Patients->getAllPatients());
        // die();
        $this->render('patient', $data);
    }
    // insert patient
    public function addPatient()
    {
        if(isset($_POST['submit']))
        {
            extract($_POST);
            // appell model 

            $insert = new Patients;
           $result = $insert->insertPatient($username,$email,$password,$user_type);
           if($result)
           {
            header('Location:patient');

           }
        
        }


    }
    // function upadte 
    public function upadatePatient()
    {
        if(isset($_POST['submit']))
        {
            extract($_POST);
            // print_r($_POST);
            $update = new Patients;
             $result = $update->updatePatient($id,$username,$email,$user_type);
             if($result)
             {
              header('Location:patient');
  
             }

        }

    }
    public function deletePatient()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // instantiate the Patients model
            $delete = new Patients;

            // call the deletePatient method
            $result = $delete->deletePatient($id);

            if ($result) {
                header('Location: patient');
            }
        }
    }


}


 
?>
