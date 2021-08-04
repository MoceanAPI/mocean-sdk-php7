<?php


namespace Mocean\Command\Contact;


class WaContact extends AbstractContact
{

    public static function create()
    {
        return new WaContact();
    }

    public function setFistName($fname)
    {
        $this->requestData["first_name"] = $fname;
        return $this;
    }

    public function setLastName($lname)
    {
        $this->requestData["last_name"] = $lname;
        return $this;
    }

    public function setFullName($fullName)
    {
        $this->requestData["full_name"] = $fullName;
        return $this;
    }

    public function setPhoneNum($phoneNum)
    {
        $this->requestData["phone_num"] = $phoneNum;
        return $this;
    }

    protected function requiredKey()
    {
        return ["first_name", "last_name", "full_name", "phone_num"];
    }

}