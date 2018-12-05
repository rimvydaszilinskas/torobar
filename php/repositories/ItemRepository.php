<?php
    // requires Item, connection to be included
    class ItemRepository{
        public static function get($id){
            //returns an object of type Item
            // if(gettype($id) == "integer"){
                // get the global item
                global $database;
                
                $query = sprintf("SELECT * FROM items WHERE id='%d'", $id);
    
                $result = mysqli_query($database, $query);
                if(!$result){
                    return null;
                }
                
                $assoc = mysqli_fetch_assoc($result);
                return new Item(array('id' => $assoc['id'], 'name' => $assoc['name'],'price' => $assoc['price'], 'description' => $assoc['description']));
                return new Item(array('id' => $assoc['id'], 'nameDk' => $assoc['nameDk'],'price' => $assoc['price'], 'description' => $assoc['description']));

            
            // }
            return null;
        }
        public static function getAll(){
            // returns an array of items, empty if error or none are existent
            global $database;
            // empty array to be returned at the end
            $items = array();
            $query = sprintf("SELECT * FROM items");
            $result = mysqli_query($database, $query);
            if(!$result){
                exit("Cannot connect to the database.");
            }
            while($assoc = mysqli_fetch_assoc($result)){
                array_push($items, new Item(array('id' => $assoc['id'], 'name' => $assoc['name'],'price' => $assoc['price'], 'description' => $assoc['description'])));
                array_push($items, new Item(array('id' => $assoc['id'], 'nameDk' => $assoc['nameDk'],'price' => $assoc['price'], 'description' => $assoc['description'])));

            }
            return $items;
        }
        public static function insert($item){
            // Returns false if connection failed and/or query was not successful
            if(get_class($item) == "Item"){
                global $database;
                $query = sprintf("INSERT INTO items (name, price, description) VALUES (%s, %d, %s)", $item->getName(), $item->getPrice(), $item->getDescription());
                $query = sprintf("INSERT INTO items (nameDk, price, descriptionDk) VALUES (%s, %d, %s)", $item->getNameDk(), $item->getPrice(), $item->getDescriptionDk());

                
                if( mysqli_query($database, $query)){
                    return true;
                }
                return false;
            }
        }
        public static function update($item){
            // Returns false if connection failed and/or query was not successful
            if(get_class($item) == "Item"){
                global $database;
                $query = sprintf("UPDATE items SET name=%s, price=%d, description=%s WHERE id=%d", $item->getName(), $item->getPrice(), $item->getDescription(), $item->getId());
                $query = sprintf("UPDATE items SET nameDk=%s, price=%d, descriptionDk=%s WHERE id=%d", $item->getNameDk(), $item->getPrice(), $item->getDescriptionDk(), $item->getId());

                if(mysqli_query($database, $query)){
                    return true;
                }
                return false;
            }
        }
        public static function delete($obj){
            if($obj != null){
                if(gettype($obj) == "integer"){
                    global $database;
                    $query = sprintf("DELETE FROM items WHERE id=%d", $obj);
                    if(mysqli_query($database, $query)){
                        return true;
                    }
                    return false;
                } else if(gettype($obj) == "object"){
                    if(get_class($obj) == "Item"){
                        global $database;
                        $query = sprintg("DELETE FROM items WHERE id=%d", $obj->getId());
                        if(mysqli_query($database, $query)){
                            return true;
                        }
                        
                        return false;
                    }
                }
            }
            
        }
        public static function getCategoryItems($categoryId){
            if(gettype($categoryId) == "integer"){
                global $database;
                $arr = array();
                $query = printf("SELECT * FROM items WHERE category=%d", $categoryId);
                $result = mysqli_query($database, $query);
                if(!$result){
                    return null;
                }
                
                while($assoc = mysqli_fetch_assoc($result)){
                    array_push($arr, new Item(array('id' => $assoc['id'], 'name' => $assoc['name'],'price' => $assoc['price'])));
                    array_push($arr, new Item(array('id' => $assoc['id'], 'nameDk' => $assoc['nameDk'],'price' => $assoc['price'])));

                }
                return $arr;
            } else {
                return null;
            }
        }
    }




