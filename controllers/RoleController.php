<?php

require_once "bdd/DAO.php";

class RoleController
{

    public function listRole()
    {
        $dao = new DAO;
        $sql = "SELECT * FROM role";
        $role = $dao->executerRequete($sql);
        require_once "views/listRole.php";
    }
}
