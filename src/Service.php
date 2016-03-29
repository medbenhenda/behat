<?php
/**
 * Created by PhpStorm.
 * User: m.benhenda(benhenda.med@gmail.com)
 * Date: 28/03/2016
 * Time: 23:48
 */

namespace App;


class Service {

    private $user;

    private $aUsers = [];

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findAllContacts()
    {
        $user1 = new User('med@gmail.com');
        $user2 = new User('med@yahoo.com');

        $this->aUsers = array($user1, $user2);
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getAUsers()
    {
        return $this->aUsers;
    }
}