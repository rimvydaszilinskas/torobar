<?php
    class EventRepository{
        public static function get($id){
            if(gettype($id) == "integer"){
                global $database;

                $query = sprintf("SELECT * FROM events WHERE id=%d", $id);

                $result = mysqli_query($database, $query);

                if(!result){
                    return null;
                }

                $assoc = mysqli_fetch_assoc($result);

                return new Event(array('id' => $assoc['id'], 'title' => $assoc['title'], 'date' => $assoc['date'], 'time' => $assoc['time'], 'description' => $assoc['description'], 'imageURL' => $assoc['image']));
            }
        }

        public static function getAll(){
            global $database;

            $events = array();

            $query = sprintf("SELECT * FROM events");

            $result = mysqli_query($database, $query);

            if(!$result){
                return null;
            }

            while($item = mysqli_fetch_assoc($result)){
                array_push($events, new Event(array('id' => $assoc['id'], 'title' => $assoc['title'], 'date' => $assoc['date'], 'time' => $assoc['time'], 'description' => $assoc['description'], 'imageURL' => $assoc['image'])));
            }
        }

        public static function update($obj){
            if(gettype($obj) == "object"){
                if(get_class($obj) == "Event"){
                    global $database;

                    $query = sprintf("UPDATE events SET title=%s, date=%s, time=%s, description=%s, image=%s WHERE id=%d", $obj->getTitle(), $obj->getDate(), $obj->getTime(), $obj->getDescription(), $obj->getImageURL(), $obj->getId());

                    if(mysqli_query($database, $query)){
                        return true;
                    }
                }
            }
            return false;
        }

        public static function insert($obj){
            if(gettype($obj) == "object"){
                if(get_class($obj) == "Event"){
                    global $database;

                    $query = sprintf("INSERT INTO events (title, date, time, description, image) VALUES (%s, %s, %s, %s, %s)", $obj->getTitle(), $obj->getDate(), $obj->getTime(), $obj->getDescription(), $obj->getImageURL());

                    if(mysqli_query($database, $query)){
                        return true;
                    }
                }
            }
            return false;
        }

        public static function delete($obj){
            if(gettype($obj) == "integer"){
                global $database;

                $query = sprintf("DELETE FROM events WHERE id=%d", $obj);

                if(mysqli_query($database, $query)){
                    return true;
                }
            } else if(gettype($obj) == "object"){
                if(get_class($obj) == "Event"){
                    global $database;

                    $query = sprintf("DELETE FROM events WHERE id=%d", $obj->getId());

                    if(mysqli_query($database, $query)){
                        return true;
                    }
                }
            }
        }
    }