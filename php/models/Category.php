<?php
    class Category{
        public $id;
        public $name;
        public $description;
        public $items;

        public function Category($obj = null){
            if(isset($obj)){
                if(gettype($obj) == "array"){
                    if(array_key_exists("id", $obj))
                        $this->id = $obj['id'];
                    if(array_key_exists("name", $obj))
                        $this->name = $obj['name'];
                    if(array_key_exists("description", $obj))
                        $this->description = $obj['description'];
                    if(array_key_exists("items", $obj))
                        $this->items = $obj['items'];
                }
            }
        }

    }
    