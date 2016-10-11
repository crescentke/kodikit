<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller {

    function user_group_id() {
        $session_data = $this->session->userdata('user_ses');
        $user_id = $session_data['user_id'];

        $user_group_id_array = $this->Crudmod->s_where_one('user', 'user_id', $user_id);
        foreach ($user_group_id_array as $row) {
            $user_group_id = $row->user_group_id;
        }

        return $user_group_id;
    }

    function user_agency() {
        $session_data = $this->session->userdata('user_ses');
        $user_id = $session_data['user_id'];

        $user_group_id_array = $this->Crudmod->s_where_one('user', 'user_id', $user_id);
        foreach ($user_group_id_array as $row) {
            $user_agency = $row->code;
        }

        return $user_agency;
    }

    function index() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            //users
            if ($this->user_group_id() == 1) {
                $users = $this->Crudmod->s_tbl('user');
                $user_groups = $this->Crudmod->s_tbl('user_group');
            } else {
                $users = $this->Crudmod->s_where_one('user', 'code', $this->user_agency());
                $user_groups = $this->Crudmod->s_where_not('user_group', 'user_group_id', 1);
            }

            
            //properties
            if ($this->user_group_id() == 1) {
                $properties = $this->Crudmod->s_tbl('property');
            } elseif ($this->user_group_id() == 3) {
                $properties = $this->Crudmod->s_where_one('property', 'landlord', $user_id);
            } else {
                $properties = $this->Crudmod->s_where_one('property', 'agency', $this->user_agency());
            }
            
            //payment
            $due_amount = 0;
            $paydue = $this->Crudmod->s_where_two('payment', 'tenant_id', $user_id, 'payment_status', 0);
            foreach ($paydue as $paydue_row){
                $due_amount = number_format($paydue_row->amount_due);
            }
            
            //leases
            if ($this->user_group_id() == 1) {
                $leases = $this->Crudmod->s_tbl('lease');
            } elseif ($this->user_group_id() == 3) {
                $leases = $this->Crudmod->s_where_one('lease', 'landlord_id', $user_id);
            } elseif ($this->user_group_id() == 4) {
                $leases = $this->Crudmod->s_where_one('lease', 'tenant_id', $user_id);
            } else {
                $leases = $this->Crudmod->s_where_one('lease', 'agency', $this->user_agency());
            }
            
            if ($this->user_group_id() == 1) {
                $tenants = $this->Crudmod->s_where_one('user', 'user_group_id', 4);
                $houses = $this->Crudmod->s_where_one('house', 'house_status', 'Vacant');
            } else {
                $tenants = $this->Crudmod->s_where_two('user', 'user_group_id', 4, 'code', $this->user_agency());
                $houses = $this->Crudmod->s_where_two('house', 'house_status', 'Vacant', 'agency', $this->user_agency());
            }

            $data = array(
                'user_group_id' => $this->user_group_id(),
                'total_members' => count($users),
                'total_property' => count($properties),
                'total_lease' => count($leases),
                'users' => $users,
                'properties' => $properties,
                'leases' => $leases,
                'tenants' => $tenants,
                'paydue' => $due_amount
            );
            $this->load->view('dashboard', $data);
        } else {
            $this->logout();
        }
    }

    function logout() {
        $this->session->unsetuserdata['user_ses'];
        $this->session->sess_destroy();

        redirect(base_url());
    }

    function usergroup() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];
            if ($this->user_group_id() == 1) {
                $user_groups = $this->Crudmod->s_tbl('user_group');
            } else {
                $user_groups = $this->Crudmod->s_where_not('user_group', 'user_group_id', 1);
            }

            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'user_privilage' => $this->Crudmod->s_tbl('user_privilage'),
                'user_groups' => $user_groups
            );
            $this->load->view('user_group', $data);
        } else {
            $this->logout();
        }
    }

    function create_usergroup() {
        $added_by = $_POST['uid'];
        $name = $_POST['ugname'];
        $privilage_tag = $_POST['ugpriv'];
        $details = $_POST['uginfo'];


        $data = array(
            'added_by' => $added_by,
            'name' => $name,
            'details' => $details
        );

        $new_group = $this->Crudmod->add_data_last("user_group", $data);
        if ($new_group) {
            foreach ($privilage_tag as $selected_privilage_tag) {
                $data = array(
                    'user_group_id' => $new_group,
                    'added_by' => $added_by,
                    'privilage_tag' => $selected_privilage_tag
                );
                $added_priv = $this->Crudmod->add_data("user_role", $data);
            }

            if ($added_priv) {
                $this->session->set_flashdata('success', ' Success: You have modified user groups!');
                redirect(base_url() . 'home/usergroup');
            } else {
                $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
                redirect(base_url() . 'home/usergroup');
            }
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/usergroup');
        }
    }

    function updateusergroup($id) {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];


            $user_groups = $this->Crudmod->s_where_one('user_group', 'user_group_id', urldecode(base64_decode($id)));


            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'user_privilage' => $this->Crudmod->s_tbl('user_privilage'),
                'user_groups' => $user_groups
            );
            $this->load->view('crud_user_group', $data);
        } else {
            $this->logout();
        }
    }

    function dropuserprivilage() {
        $privilage_tag = $_POST['priv_tag'];
        $user_group_id = $_POST['group_id'];

        $url_param = urlencode(base64_encode($user_group_id));

        $this->db->where('privilage_tag', $privilage_tag);
        $this->db->where('user_group_id', $user_group_id);

        $drop_true = $this->db->delete('user_role');
        if ($drop_true) {
            $this->session->set_flashdata('success', ' Success: You have modified user groups!');
            redirect(base_url() . 'home/updateusergroup/' . $url_param);
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/updateusergroup' . $url_param);
        }
    }

    function update_usergroup() {
        $added_by = $_POST['uid'];
        $user_group_id = $_POST['gid'];
        $name = $_POST['ugname'];
        $privilage_tag = $_POST['ugpriv'];
        $details = $_POST['uginfo'];

        $url_param = urlencode(base64_encode($user_group_id));

        $data = array(
            'name' => $name,
            'details' => $details
        );

        $new_group = $this->Crudmod->update_data("user_group", $data, 'user_group_id', $user_group_id);
        if ($new_group) {
            foreach ($privilage_tag as $selected_privilage_tag) {
                $data = array(
                    'user_group_id' => $user_group_id,
                    'added_by' => $added_by,
                    'privilage_tag' => $selected_privilage_tag
                );
                $added_priv = $this->Crudmod->add_data("user_role", $data);
            }

            if ($added_priv) {
                $this->session->set_flashdata('success', ' Success: You have modified user groups!');
                redirect(base_url() . 'home/updateusergroup/' . $url_param);
            } else {
                $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
                redirect(base_url() . 'home/updateusergroup/' . $url_param);
            }
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/updateusergroup/' . $url_param);
        }
    }

    function user() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];
            if ($this->user_group_id() == 1) {
                $users = $this->Crudmod->s_tbl('user');
                $user_groups = $this->Crudmod->s_tbl('user_group');
            } else {
                $users = $this->Crudmod->s_where_one('user', 'code', $this->user_agency());
                $user_groups = $this->Crudmod->s_where_not('user_group', 'user_group_id', 1);
            }

            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'user_groups' => $user_groups,
                'users' => $users
            );
            $this->load->view('user', $data);
        } else {
            $this->logout();
        }
    }

    function create_user() {
        $added_by = $_POST['uid'];
        $ufname = $_POST['ufname'];
        $ulname = $_POST['ulname'];
        $usname = $_POST['usname'];
        $usgroup = $_POST['usgroup'];
        $uemail = $_POST['uemail'];

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $upass = implode($pass);

        $agency = $this->Crudmod->s_where_one("user", "user_id", $added_by);
        foreach ($agency as $agency_value) {
            $agencyName = $agency_value->code;
        }

        if ($agencyName == 1) {
            $ucode = do_hash($usname);
        } else {
            $ucode = $agencyName;
        }

        $this->form_validation->set_rules('usname', 'Username', "required|trim|is_unique[user.username]");
        $this->form_validation->set_rules('uemail', 'Email', "required|trim|is_unique[user.email]");

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', ' Error:' . validation_errors());
            redirect(base_url() . 'home/user');
        } else {

            $data = array(
                'code' => $ucode,
                'username' => $usname,
                'firstname' => $ufname,
                'lastname' => $ulname,
                'email' => $uemail,
                'password' => do_hash($upass),
                'user_group_id' => $usgroup,
                'status' => 1
            );

            $new_user = $this->Crudmod->add_data("user", $data);
            if ($new_user) {
                $this->session->set_flashdata('success', ' Success: You have modified users!');
                redirect(base_url() . 'home/user');
            } else {
                $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
                redirect(base_url() . 'home/user');
            }
        }
    }

    function updateuser($id) {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            $user = $this->Crudmod->s_where_one('user', 'user_id', urldecode(base64_decode($id)));


            $data = array(
                'url_seg' => $id,
                'user_id' => $user_id,
                'viewed_id' => urldecode(base64_decode($id)),
                'user_group_id' => $this->user_group_id(),
                'user_privilage' => $this->Crudmod->s_tbl('user_privilage'),
                'user' => $user
            );
            $this->load->view('crud_user', $data);
        } else {
            $this->logout();
        }
    }

    function update_user() {
        $ur = $_POST['ur'];
        $vid = $_POST['vid'];
        $ufname = $_POST['ufname'];
        $ulname = $_POST['ulname'];
        $usname = $_POST['usname'];
        $usgroup = $_POST['usgroup'];
        $uemail = $_POST['uemail'];
        $ustatus = $_POST['ustatus'];

        $this->form_validation->set_rules('usname', 'Username', "required|trim|callback_check_username");
        $this->form_validation->set_rules('uemail', 'Email', "required|trim|callback_check_email");

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', ' Error:' . validation_errors());
            redirect(base_url() . 'home/updateuser/' . $ur);
        } else {

            $data = array(
                'username' => $usname,
                'firstname' => $ufname,
                'lastname' => $ulname,
                'email' => $uemail,
                'user_group_id' => $usgroup,
                'status' => $ustatus
            );

            $update_user = $this->Crudmod->update_data("user", $data, "user_id", $vid);
            if ($update_user) {
                $this->session->set_flashdata('success', ' Success: You have modified users!');
                redirect(base_url() . 'home/updateuser/' . $ur);
            } else {
                $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
                redirect(base_url() . 'home/updateuser/' . $ur);
            }
        }
    }

    function check_email($serial_no) {
        $item = $this->Crudmod->s_where_one('user', 'email', $serial_no);
        if (count($item) > 0) {
            foreach ($item as $item_row) {
                $cur_email = $item_row->email;
            }
        } else {
            return true;
        }
        if ($_POST['vmail'] != $cur_email) {
            $this->form_validation->set_message('check_email', ' Email is not available!');
            return false;
        } else {
            return true;
        }
    }

    function check_username($serial_no) {
        $item = $this->Crudmod->s_where_one('user', 'username', $serial_no);
        if (count($item) > 0) {
            foreach ($item as $item_row) {
                $cur_username = $item_row->username;
            }
        } else {
            return true;
        }
        if ($_POST['vusername'] != $cur_username) {
            $this->form_validation->set_message('check_username', ' Username is not available!');
            return false;
        } else {
            return true;
        }
    }

    function category() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'property_groups' => $this->Crudmod->s_tbl('property_group')
            );
            $this->load->view('category', $data);
        } else {
            $this->logout();
        }
    }

    function create_propertygroup() {
        $uid = $_POST['uid'];
        $pname = $_POST['pname'];

        $this->form_validation->set_rules('pname', 'Group name', "required|trim|is_unique[property_group.name]");

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', ' Error:' . validation_errors());
            redirect(base_url() . 'home/category');
        } else {

            $data = array(
                'name' => $pname,
                'added_by' => $uid
            );

            $new_property_group = $this->Crudmod->add_data("property_group", $data);
            if ($new_property_group) {
                $this->session->set_flashdata('success', ' Success: You have modified properties!');
                redirect(base_url() . 'home/category');
            } else {
                $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
                redirect(base_url() . 'home/category');
            }
        }
    }

    function droppropertygroup() {
        $property_group_id = $_POST['property_group_id'];


        $this->db->where('property_group_id', $property_group_id);

        $drop_true = $this->db->delete('property_group');
        if ($drop_true) {
            $this->session->set_flashdata('success', ' Success: You have modified properties!');
            redirect(base_url() . 'home/category');
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/category');
        }
    }

    function property() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            $landlord_group = $this->Crudmod->s_where_one('user_group', 'name', "Landlord");
            if (count($landlord_group) > 0) {
                foreach ($landlord_group as $landlord_group_row) {
                    $landlord_group_id = $landlord_group_row->user_group_id;
                }
            } else {
                $landlord_group_id = NULL;
            }

            $landlords = $this->Crudmod->s_where_two('user', 'code', $this->user_agency(), 'user_group_id', $landlord_group_id);

            if ($this->user_group_id() == 1) {
                $properties = $this->Crudmod->s_tbl('property');
            } elseif ($this->user_group_id() == 3) {
                $properties = $this->Crudmod->s_where_one('property', 'landlord', $user_id);
            } else {
                $properties = $this->Crudmod->s_where_one('property', 'agency', $this->user_agency());
            }

            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'property_group' => $this->Crudmod->s_tbl('property_group'),
                'properties' => $properties,
                'landlords' => $landlords
            );
            $this->load->view('property', $data);
        } else {
            $this->logout();
        }
    }

    function create_property() {
        $uid = $_POST['uid'];
        $pname = $_POST['pname'];
        $pcategory = $_POST['pcategory'];
        $plandlord = $_POST['plandlord'];
        $paddress = $_POST['paddress'];

        $this->form_validation->set_rules('pname', 'Property name', "required|trim|is_unique[property.name]");

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', ' Error:' . validation_errors());
            redirect(base_url() . 'home/property');
        } else {

            $data = array(
                'name' => $pname,
                'added_by' => $uid,
                'category' => $pcategory,
                'landlord' => $plandlord,
                'agency' => $this->user_agency(),
                'address' => $paddress
            );

            $new_property = $this->Crudmod->add_data("property", $data);
            if ($new_property) {
                $this->session->set_flashdata('success', ' Success: You have modified properties!');
                redirect(base_url() . 'home/property');
            } else {
                $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
                redirect(base_url() . 'home/property');
            }
        }
    }

    function updateproperty($id) {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            $property = $this->Crudmod->s_where_one('property', 'property_id', urldecode(base64_decode($id)));

            $landlord_group = $this->Crudmod->s_where_one('user_group', 'name', "Landlord");
            if (count($landlord_group) > 0) {
                foreach ($landlord_group as $landlord_group_row) {
                    $landlord_group_id = $landlord_group_row->user_group_id;
                }
            } else {
                $landlord_group_id = NULL;
            }

            $landlords = $this->Crudmod->s_where_two('user', 'code', $this->user_agency(), 'user_group_id', $landlord_group_id);

            $buildings = $this->Crudmod->s_where_one('building', 'property_id', urldecode(base64_decode($id)));

            $data = array(
                'url_seg' => $id,
                'user_id' => $user_id,
                'viewed_id' => urldecode(base64_decode($id)),
                'user_group_id' => $this->user_group_id(),
                'property_group' => $this->Crudmod->s_tbl('property_group'),
                'property' => $property,
                'landlords' => $landlords,
                'buildings' => $buildings
            );
            $this->load->view('crud_property', $data);
        } else {
            $this->logout();
        }
    }

    function update_property() {
        $uid = $_POST['uid'];
        $pname = $_POST['pname'];
        $pcategory = $_POST['pcategory'];
        $plandlord = $_POST['plandlord_id'];
        $paddress = $_POST['paddress'];
        $pid = $_POST['vid'];

        $data = array(
            'name' => $pname,
            'added_by' => $uid,
            'category' => $pcategory,
            'landlord' => $plandlord,
            'agency' => $this->user_agency(),
            'address' => $paddress
        );

        $new_property = $this->Crudmod->update_data("property", $data, "property_id", urldecode(base64_decode($pid)));
        if ($new_property) {
            $this->session->set_flashdata('success', ' Success: You have modified properties!');
            redirect(base_url() . 'home/updateproperty/' . $pid);
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/updateproperty/' . $pid);
        }
    }

    function create_building() {
        $propid = $_POST['propid'];
        $bname = $_POST['bname'];
        $bhouses = $_POST['bhouses'];
        $url_propid = urlencode(base64_encode($propid));

        $this->form_validation->set_rules('bhouses', 'Number of houses', "required|trim|greater_than[1]");

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', ' Error:' . validation_errors());
            redirect(base_url() . 'home/updateproperty/' . $url_propid);
        } else {

            $data = array(
                'name' => $bname,
                'property_id' => $propid,
                'number_of_houses' => $bhouses
            );

            $new_building = $this->Crudmod->add_data("building", $data);
            if ($new_building) {
                $this->session->set_flashdata('success', ' Success: You have modified a property!');
                redirect(base_url() . 'home/updateproperty/' . $url_propid);
            } else {
                $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
                redirect(base_url() . 'home/updateproperty/' . $url_propid);
            }
        }
    }

    function updatebuilding($id) {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            $landlord_group = $this->Crudmod->s_where_one('user_group', 'name', "Landlord");
            if (count($landlord_group) > 0) {
                foreach ($landlord_group as $landlord_group_row) {
                    $landlord_group_id = $landlord_group_row->user_group_id;
                }
            } else {
                $landlord_group_id = NULL;
            }

            $building = $this->Crudmod->s_where_one('building', 'building_id', urldecode(base64_decode($id)));

            $houses = $this->Crudmod->s_where_one('house', 'building_id', urldecode(base64_decode($id)));


            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'houses' => $houses,
                'building' => $building
            );
            $this->load->view('crud_building', $data);
        } else {
            $this->logout();
        }
    }

    function create_house() {
        $bid = $_POST['bid'];
        $hname = $_POST['hname'];
        $hrent = $_POST['hrent'];
        $hdeposit = $_POST['hdeposit'];
        $hdetails = $_POST['hdetails'];
        $hstatus = $_POST['hstatus'];
        $url_bid = urlencode(base64_encode($bid));

        $property_id = $this->Crudmod->s_where_one('building', 'building_id', $bid);
        foreach ($property_id as $property_id_row) {
            $prop_id = $property_id_row->property_id;
        }
        $agency_key = $this->Crudmod->s_where_one('property', 'property_id', $prop_id);
        foreach ($agency_key as $agency_key_row) {
            $agency = $agency_key_row->agency;
        }

        $data = array(
            'name' => $hname,
            'building_id' => $bid,
            'rent' => $hrent,
            'deposit' => $hdeposit,
            'details' => $hdetails,
            'house_status' => $hstatus,
            'agency' => $agency
        );

        $new_house = $this->Crudmod->add_data("house", $data);
        if ($new_house) {
            $this->session->set_flashdata('success', ' Success: You have modified houses!');
            redirect(base_url() . 'home/updatebuilding/' . $url_bid);
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/updatebuilding/' . $url_bid);
        }
    }

    function update_house() {
        $bid = $_POST['bid'];
        $hname = $_POST['hname'];
        $hrent = $_POST['hrent'];
        $hdeposit = $_POST['hdeposit'];
        $hdetails = $_POST['hdetails'];
        $hstatus = $_POST['hstatus'];
        $url_bid = urlencode(base64_encode($bid));

        $data = array(
            'name' => $hname,
            'building_id' => $bid,
            'rent' => $hrent,
            'deposit' => $hdeposit,
            'details' => $hdetails,
            'house_status' => $hstatus
        );


        $new_house = $this->Crudmod->update_data("house", $data, 'house_id', $_POST['hid']);
        if ($new_house) {
            $this->session->set_flashdata('success', ' Success: You have modified houses!');
            redirect(base_url() . 'home/updatebuilding/' . $url_bid);
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/updatebuilding/' . $url_bid);
        }
    }

    function lease() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];
            if ($this->user_group_id() == 1) {
                $leases = $this->Crudmod->s_tbl('lease');
            } elseif ($this->user_group_id() == 3) {
                $leases = $this->Crudmod->s_where_one('lease', 'landlord_id', $user_id);
            } elseif ($this->user_group_id() == 4) {
                $leases = $this->Crudmod->s_where_one('lease', 'tenant_id', $user_id);
            } else {
                $leases = $this->Crudmod->s_where_one('lease', 'agency', $this->user_agency());
            }

            if ($this->user_group_id() == 1) {
                $tenants = $this->Crudmod->s_where_one('user', 'user_group_id', 4);
                $houses = $this->Crudmod->s_where_one('house', 'house_status', 'Vacant');
            } else {
                $tenants = $this->Crudmod->s_where_two('user', 'user_group_id', 4, 'code', $this->user_agency());
                $houses = $this->Crudmod->s_where_two('house', 'house_status', 'Vacant', 'agency', $this->user_agency());
            }


            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'tenants' => $tenants,
                'houses' => $houses,
                'leases' => $leases
            );
            $this->load->view('lease', $data);
        } else {
            $this->logout();
        }
    }

    function create_lease() {
        $ltenant = $_POST['ltenant'];
        $lhouse = $_POST['lhouse'];
        $lstart = $_POST['lstart'];
        $lend = $_POST['lend'];
        $lrent = $_POST['lrent'];
        $ldeposit = $_POST['ldeposit'];
        $lstatus = $_POST['lstatus'];
        $ldetails = $_POST['ldetails'];

        $house_id = $this->Crudmod->s_where_one('house', 'house_id', $lhouse);
        foreach ($house_id as $house_id_row) {
            $build_id = $house_id_row->building_id;
        }

        $property_id = $this->Crudmod->s_where_one('building', 'building_id', $build_id);
        foreach ($property_id as $property_id_row) {
            $prop_id = $property_id_row->property_id;
        }

        $agency_info = $this->Crudmod->s_where_one('property', 'property_id', $prop_id);
        foreach ($agency_info as $agency_info_row) {
            $agency = $agency_info_row->agency;
            $landlord = $agency_info_row->landlord;
        }


        $data = array(
            'tenant_id' => $ltenant,
            'landlord_id' => $landlord,
            'agency' => $agency,
            'lease_start' => $lstart,
            'lease_end' => $lend,
            'lease_status' => $lstatus,
            'rent' => $lrent,
            'deposit' => $ldeposit,
            'details' => $ldetails
        );



        $new_lease = $this->Crudmod->add_data_last("lease", $data);
        if ($new_lease) {

            $payament_data = array(
                'lease_id' => $new_lease,
                'tenant_id' => $ltenant,
                'landlord_id' => $landlord,
                'amount_due' => $lrent + $ldeposit,
                'payment_status' => 0,
                'agency' => $agency
            );
            $this->Crudmod->add_data("payment", $payament_data);

            $update_house = array(
                'house_status' => "Occupied"
            );
            $this->Crudmod->update_data('house', $update_house, 'house_id', $lhouse);

            $this->session->set_flashdata('success', ' Success: You have modified leases!');
            redirect(base_url() . 'home/lease');
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/lease');
        }
    }

    function update_lease() {
        $lid = $_POST['lid'];
        $lstart = $_POST['lstart'];
        $lend = $_POST['lend'];
        $lrent = $_POST['lrent'];
        $ldeposit = $_POST['ldeposit'];
        $lstatus = $_POST['lstatus'];

        $data = array(
            'lease_start' => $lstart,
            'lease_end' => $lend,
            'lease_status' => $lstatus,
            'rent' => $lrent,
            'deposit' => $ldeposit
        );

        $update_lease = $this->Crudmod->update_data("lease", $data, 'lease_id', $lid);
        if ($update_lease) {
            $this->session->set_flashdata('success', ' Success: You have modified leases!');
            redirect(base_url() . 'home/lease');
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/lease');
        }
    }

    function profile() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'user_details' => $this->Crudmod->s_where_one('user', 'user_id', $user_id),
                'payment_details' => $this->Crudmod->s_where_two('payment', 'tenant_id', $user_id, 'landlord_id', $user_id)
            );
            $this->load->view('profile', $data);
        } else {
            $this->logout();
        }
    }

    function edit_user() {
        $uid = $_POST['uid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname
        );

        $update_lease = $this->Crudmod->update_data("user", $data, 'user_id', $uid);
        if ($update_lease) {
            $this->session->set_flashdata('success', ' Success: You have modified your profile!');
            redirect(base_url() . 'home/profile');
        } else {
            $this->session->set_flashdata('error', ' Error: Something went wrong. Try again!');
            redirect(base_url() . 'home/profile');
        }
    }

}
