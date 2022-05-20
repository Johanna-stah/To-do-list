<?php

class Activity {
    private $name;
    private $description;
    private $todolist;

    //constructor
    function __construct() {
        // read json file
        if(file_exists("todolist.json")){
            $this->todolist = json_decode(file_get_contents("todolist.json"));
        } else {
            $this->todolist = [];
        }
    }

    //save new
    public function saveActivity() : bool {
        if(isset($this->name) && isset($this->description)) {
            //get data
            $data['name'] = $this ->name;
            $data['description'] = $this ->description;
            $data['timestamp'] = date("y-m-d H:i");

            //add to array
            array_push($this->todolist, $data);

            //convert to json
            $jsonData = json_encode($this->todolist, JSON_PRETTY_PRINT);

            //save file
            if(file_put_contents("todolist.json", $jsonData)){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //get array
    public function getActivity() : array {
        return $this->todolist;
    }

    //delete array
    public function deleteActivity(int $index) : bool {
        unset($this->todolist[$index]);

        //convert to json
        $jsonData = json_encode($this->todolist, JSON_PRETTY_PRINT);

        //save file
        if(file_put_contents("todolist.json", $jsonData)){
            return true;
        } else {
            return false;
        }
    }

    //set name
    public function setName(string $name) : bool {
        if(strlen($name) > 4){
            $this->name = $name;
            return true;
        } else {
            return false;
        }
    }

    //set description
    public function setDescription(string $description) : bool {
        if ($this->description = $description) {
            return true;
        } else {
            return false;
        }
    }

    //get name
    public function getName() : string {
        return $this->name;
    }

    //get descrpibtion
    public function getDescription() : string {
        return $this->description;
    }


}
    

