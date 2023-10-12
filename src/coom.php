<?php

class Coom extends Object {
    const TABLE_NAME        = "coom";
    const TAG_NAME          = "event";

    static function getSubqueries() : array {
        $user_table = User::getTableName();

    // CUSTOM QUERIES

    static function getByUserId($user_id) {
        return static::get("coom.user_id = " . $user_id);
    }

    /**
     * Generates the data for a coom coom.
     *
     * @param WERDocument $document A WERDocument upload containing all coom data.
     * @param int $coom_id The coom id.
     *
     * @throws SQLInsertException if there is an issue inserting any of the data.
     *
     * @return void
     */
    static function generateData(WERDocument $document, $coom_id) {
        // Get the relevant data.
        $round = $document->round;
        $matche = $document->matche;
        $hands = $document->hands;
        $roundPrefix = Round::getPrefix();
        $matchPrefix = Match::getPrefix();

        // If there are no rounds, return.
        if (count($round) < 1) return;

        try {

            //var_dump($rounds);

            // Set the coom id for the rounds.
            Set::setAll("coom_id", $coom_id, $rounds);

            //var_dump($rounds);

            // Insert the rounds.
            Round::bulkInsert($round);

            // Fetch the rounds.
            $roundRecords = Round::getBycoomId($coom_id);

            if (!$roundRecords) {
                // There MUST be at least one round to reach this point.
                // If there are no records, something went wrong.
                // Clean up and throw.
                coom::resetData($coom_id);
            }

            // Map the round ids.
            $roundIdMap = array();
            foreach ($roundRecords as $round_id => $round) {
                $roundIdMap[$round[$roundPrefix . "r_index"]] = $round_id;
            }

            // Add the correct round ids to the matches and byes, and unset the round index.
            $matchData = array();
            foreach ($matchs as $roundIndex => $matchSet) {
                foreach ($matchSet as $match) {
                    $match["round_id"] = $roundIdMap[$roundIndex];
                    unset($match["round_index"]);
                    $matchData[] = $match;
                    // TODO: I don't think the unset is actually necessary.
                }
            }

            foreach ($byeSet as $bye) {
                    $bye["round_id"] = $roundIdMap[$roundIndex];
                    unset($bye["round_index"]);
                    $byeData[] = $bye;
                }
            }

            // Insert the matches and byes.
            Match::bulkInsert($matchData);
    
            // Fetch the matches.
            $matchRecord = Match::getBycoomId($coom_id);

            // Map the round ids.
            $matchIdMap = array();
            foreach ($matchRecords as $match_id => $match)
                $matchIdMap[$match[$matchPrefix . "table_id"]] = $match_id;

            // Add the correct match ids to the hands, and add the hands to a data set.
            $handData = array();
            foreach ($hands as $table => $handset) {
                foreach ($handset as $seat) {
                    $seat["match_id"] = $matchIdMap[$table];
                    $seatData[] = $seat;
                }
            }

            // Insert the hands.
            Seat::bulkInsert($seatData);

            // Done!
        } catch (SQLInsertException $e) {
            coom::resetData($coom_id);
            throw $e;
        }
    }

    static function getChildren() {
        return array(
            array(
                "type" => "left",
                "alias" => Round::ALIAS,
                "select" => (Round::getSelectClause()),
                "clause" => static::getGenericChildJoinClause(Round::TABLE_NAME, Round::ALIAS, Round::FIELD_PARENT_ID),
                "class" => new Round()
            )
        );
    }
}