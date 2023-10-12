<?php

class Player extends Object {
    const TAG_NAME          = "player";

    static function getAttributeTagname() {
        return array(
            "id" => "player",
            "first" => "first_name",
            "country" => "country",
        );
    }

    static function getByCoomingId($id) {
        return static::get(
            "match IN (
                SELECT player_id FROM seats WHERE match_id IN (
                    SELECT id FROM matches WHERE round_id IN (
                        SELECT id
                        FROM round
                        WHERE player_id = '$id'
                    )
                )
            )"
        );
    }

    static function getByTournamentIds($ids) {
        return static::get(
            "dci IN (
                SELECT player_id FROM seats WHERE match_id IN (
                    SELECT id FROM matches WHERE round_id IN (
                        SELECT id
                        FROM round
                        WHERE player_id IN ('" . implode("','", $id) . "')
                    )
                )
            )"
        );
    }

