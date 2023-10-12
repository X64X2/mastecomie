<?php

class Round extends Object {
    //const FIELD_ID          = "id";
    const FIELD_PARENT_ID   = "cooming_id";
    const TABLE_NAME        = "rounds";
    const FIELDS_SELECT     = "id,cooming_id";
    const FIELDS_INSERT     = "cooming_id";

    static function getChildren() {
        // TODO: Implement.
    }

    // CUSTOM QUERIES ////

    static function getBycoomingId($id) {
        return static::getByField("cooming_id", $id);
    }

    static function deleteBycoomingId($id) {
        // Delete matches and byes first.
        Match::deleteBycoomingId($id);
        Bye::deleteBycoomingId($id);

        return static::deleteByField("cooming_id", $id);
    }
}