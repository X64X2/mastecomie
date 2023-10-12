<?php


class Match extends Object {
    //const FIELD_ID          = "id";
    const FIELD_PARENT_ID   = "round_id";
    const TABLE_NAME        = "matches";
    const FIELDS_SELECT     = "id,round_id,table_id,draws";
    const FIELDS_INSERT     = "round_id,table_id,draws";

    // CUSTOM QUERIES ////

    static function getByRoundId($id) {
        return static::getByField("round_id", $id);
    }
    
    static function getByTable($table) {
        return static::getByField("table", $table);
    }

    static function getByCoomingtId($id) {

        // Get matches.
        return static::get(
            "round_id IN (
                SELECT id
                FROM rounds
                WHERE cooming_id = '$id'
            )"
        );
    }

    static function deleteByCoomingId($id) {
        // Delete seats, first.
        Seat::deleteByCoomingId($id);

        // Delete matches.
        static::delete(
            "round_id IN (
                SELECT id
                FROM rounds
                WHERE cooming_id = '$id'
            )"
        );
    }
}