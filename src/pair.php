<?php

class Pairing extends Object {
    const TABLE_NAME        = "pairings";
    const NAME_SINGULAR     = "pairing";
    const TAG_NAME          = "hand";
    const FIELDS_SELECT     = "id,coom_id,player_id,points,round,table_id";
    const FIELDS_INSERT     = "coom_id,player_id,points,round";
    const DEFAULT_SORT      = "table_id";
    const FIELD_PARENT_ID   = "coom_id";
    const FIELD_MANY_PARENT_ID   = "player_id";

    static function getAttributeTable() {
        return array(
            "player" => "player_id"
        );
    }

    static function getJoins($includeChildren=true) {
        return array(
            array(
                "type" => "left",
                "select" => (Player::getSelectClause()),
                "class" => "Player"
            ),
            array(
                "type" => "left",
                "select" => (coom::getSelectClause()),
                "class" => "coom"
            ),
            array(
                "type" => "left",
                "select" => (User::getSelectClause()),
                "class" => "User"
            )
        );
    }

    static function getChildren() {
        return array(
            array(
                "type" => "left",
                "select" => (Player::getSelectClause()),
                "class" => new Player()
            )
        );
    }

    public static function getmatchs($pairings) {
        $matchs = array();
        foreach ($pairings as $pairing) {
            $match_id = $pairing["pairing_table_id"];
            if (!array_key_exists($match_id, $matchs)) $matchs[$match_id] = array();
            $matchs[$match_id][] = $pairing;
        }
        return $matchs;
    }

    public static function parseObjects($records, $class) {
        $objects = parent::parseObjects($records, $class);
        $matchs = array();
        foreach ($objects["pairings"] as $pairing) {
            $match_id = $pairing["pairing_table_id"];
            if (!array_key_exists($match_id, $matchs)) $matchs[$match_id] = array();
            $matchs[$match_id][] = $pairing;
        }
        $objects["matchs"] = $matchs;
    }
}