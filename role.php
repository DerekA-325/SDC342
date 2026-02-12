<?php
class Role {
    private $roleNo;
    private $roleName;

    public function __construct($roleNo, $roleName) {
        $this->roleNo = $roleNo;
        $this->roleName = $roleName;
    }

    public function getRoleNo() {
        return $this->roleNo;
    }

    public function setRoleNo($value) {
        $this->roleNo = $value;
    }

    public function getRoleName() {
        return $this->roleName;
    }

    public function setRoleName($value) {
        $this->roleName = $value;
    }
}