<?php

class Event extends Object {
    const FIELD_PARENT_ID   = "id";
    const TABLE_NAME        = "events";
    const FIELDS_SELECT     = "id,user_id";
    const FIELDS_INSERT     = "id,user_id";
    const FIELDS_UPDATE     = "id,user_id";

    static function getById($id) {
        return self::getByField("id", $id);
    }

}