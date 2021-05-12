<?php


function is_logged_in()
{

    $ci = get_instance();
    if (!$ci->session->userdata('Username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('Role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('admin_menu', ['menu' => $menu])->row_array();


        $menu_id = $queryMenu['id'];


        $adminAccess = $ci->db->get_where('admin_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($adminAccess->num_rows() < 1) {
            redirect("auth/blocked");
        }
    }
}
