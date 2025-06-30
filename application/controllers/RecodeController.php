<?php

class RecodeController extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('ReocdeService');
        

        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('post/index');
        }
    }
    
    
    

    function stockTablenew() {


        $newSrock = new ReocdeService();

//             ## Read value
        $draw = $this->input->post('draw');
        $row = $this->input->post('start');
        $rowperpage = $this->input->post('length');

        $group_id = $this->input->post('group_id');
        $con_name = $this->input->post('contact_id');
         $serach_id = $this->input->post('serach_id');
        
       $user_id= $this->session->userdata('user_id');

//        $total_roll = 0;
//        $item_net_weight = 0;
        $totalRecords = $newSrock->count_catdeatils($user_id);
        
       
        $totalRecordwithFilter = $newSrock->count_catdeatilsfind($group_id, $con_name,$serach_id, $user_id);
        $empRecords = $newSrock->db_catdeatils($group_id, $con_name,$serach_id, $user_id, $rowperpage, $row);

        

        $i=0;
        if (empty($empRecords)) {
            $data[] = array(
               
                "contacts_group_id" => "",
                 "name" => "",
                "phone" => "",
                "group_name" => "",
               
            );
        } else {

            foreach ($empRecords as $empRecord) {
        
$i++;
                $data[] = array(
                    "contacts_group_id" => $i ,
                      "name" => $empRecord->name,
                    "phone" => $empRecord->phone,
                    "group_name" => $empRecord->group_name,
                    
                  
                );

              //  $item_net_weight = $item_net_weight + floatval($empRecord->item_net_weight);
            }
        }
## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data,
            "total_roll" => 0,
            "total_weight" => 0,
        );

        echo json_encode($response);
        exit();
    }
}
