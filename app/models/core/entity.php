<?php

namespace Models\Core;

use Models\Core\Database;

abstract class Entity {

    static public $db_table;
      
    abstract protected function _fields();


    protected function _metas_fields() {
        return [];
    }

    public function fill($data = []) {
        $fields = array_merge($this->_fields(), $this->_metas_fields()) ;
        foreach($fields as $name) {
            $this->$name = isset($data[$name]) ? $data[$name] : $this->$name;
        }
    }

    public function save() {
        return empty($this->id) ? $this->create() : $this->update();
    }
   

    public function create() {
        
        $data = [];

        foreach($this->_fields() as $field) {
            $data[$field] = $this->$field;
        }
        $this->id = Database::query()->insert ( static::$db_table, $data);

        $_metas_fields = $this->_metas_fields();
        if( !empty($this->id) && !empty($_metas_fields) ) {
            foreach($_metas_fields as $field) {
                $data = [
                    static::$db_table."_id" => $this->id,
                    "name" => $field,
                    "value" => serialize($this->$field)
                ];
                Database::query()->insert (static::$db_table.'_metas', $data);
            }
        }

        return !empty($this->id);
    }

    public function update() {
        
        $data = [];
        foreach($this->_fields() as $field) {
            $data[$field] = $this->$field;
        }

        $db = Database::query();
        $db->where('id', $this->id);
        $db->update (static::$db_table, $data);         


        $_metas_fields = $this->_metas_fields();
        if( !empty($_metas_fields) ) {
            // HOW TO UPDATE METAS (NEW / EXISTING)
            // DELETE ALL OLD METAS AND RECREATE THEM WITH NEW ONES
            Database::query()
            ->where(static::$db_table.'_id', $this->id)
            ->delete(static::$db_table.'_metas');


            foreach($_metas_fields as $field) {
                $data = [
                    static::$db_table."_id" => $this->id,
                    "name" => $field,
                    "value" => serialize($this->$field)
                ];
                
                Database::query()->insert (static::$db_table.'_metas', $data);
            }
        }

        return !empty($this->id);

    }

    static public function get_all() {
        $output = [];
        
        $items = Database::query()->get (static::$db_table);

        if( !empty($items) ) {
            foreach($items as $item) {
                $entity = new static();

                foreach( $item as $key => $value ) {
                    $entity->$key = $value;
                }

                // si aucun metas, on assigne et skip au prochain
                $_metas_fields = $entity->_metas_fields();
                if( empty($_metas_fields) ) {
                    $output[] = $entity;
                    continue;
                }

                $metas = Database::query()
                    ->where(static::$db_table.'_id', $entity->id)
                    ->get (static::$db_table.'_metas');

                if( !empty($metas) ) {
                    foreach( $metas as $meta ) {

                        $name = $meta['name'];
                        $value = unserialize($meta['value']);

                        if( !empty($entity->$name) && !is_array($entity->$name) ) {
                            $entity->$name = [$entity->$name, $value];
                        }
                        elseif(is_array($entity->$name)) {
                            $entity->$name []= $value;
                        }
                        else {
                            $entity->$name = $value;
                        }                        
                    }
                }
          
                $output[] = $entity;
            }
        }

        return $output;
    }

    static public function get_by($field, $val) {
        Database::query()->where($field, $val);
        $output = static::get_all();
        return $output;
    }


    public function delete() {
        
        if( empty($this->id) ) return false;

        Database::query()
            ->where('id', $this->id)
            ->delete(static::$db_table);       

        $_metas_fields = $this->_metas_fields();
        if( !empty($_metas_fields) ) {
            Database::query()
                ->where(static::$db_table.'_id', $this->id)
                ->delete(static::$db_table.'_metas');
        }
        return true;
    }
    

    static public function build_from_row($item) {
        $output = new static();

        foreach( $item as $key => $value ) {
            $output->$key = $value;
        }


        $_metas_fields = static::_metas_fields();
        if( !empty($_metas_fields ) ) {
            $metas = Database::query()
                ->where(static::$db_table.'_id', $output->id)
                ->get (static::$db_table.'_metas');

            if( !empty($metas) ) {
                foreach( $metas as $meta ) {

                    $name = $meta['name'];
                    $value = unserialize($meta['value']);

                    if( !empty($output->$name) && !is_array($output->$name) ) {
                        $output->$name = [$output->$name, $value];
                    }
                    elseif(is_array($output->$name)) {
                        $output->$name []= $value;
                    }
                    else {
                        $output->$name = $value;
                    }                        
                }
            }
        }
        
    
        return $output;
    }
}