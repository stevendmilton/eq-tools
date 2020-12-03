<?php
include_once __DIR__ .
'/../includes/DatabaseConnection.php';

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    //echo '<script>alert("'.$sql.'")</script>';
    return $query;
}

function countRecords($pdo,$table) {
    $query = query($pdo, 'SELECT COUNT(*) FROM `' . $table . '`');
    $row = $query->fetch();
    return $row[0];
}

function countMembers($pdo,$name) {
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $query = query($pdo, 'SELECT COUNT(*) FROM committee c1 inner join committees c2 on c1.committee = c2.id WHERE `name` = :name',$parameters);
    $row = $query->fetch();
    return $row[0];
}

function countTeamMembers($pdo,$name) {
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $query = query($pdo, 'SELECT COUNT(*) FROM maint_members mm inner join maint_team mt on mm.teamid = mt.id WHERE `name` = :name',$parameters);
    $row = $query->fetch();
    return $row[0];
}

function countActiveClasses($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM temple_class WHERE `showmenu` = 1');
    $row = $query->fetch();
    return $row[0];
}

function countClassMembers($pdo,$id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT COUNT(*) FROM temple_prep a inner join temple_class b on a.class_id = b.id WHERE `class_id` = :id',$parameters);
    $row = $query->fetch();
    return $row[0];
}

function countActiveTrips($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM temple_trip WHERE `showmenu` = 1');
    $row = $query->fetch();
    return $row[0];
}

function countTripMembers($pdo,$id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT COUNT(*) FROM trip_members a inner join temple_trip b on a.trip_id = b.id WHERE `trip_id` = :id',$parameters);
    $row = $query->fetch();
    return $row[0];
}

function insertData($pdo, $fields, $table) {
    $query = 'INSERT INTO `' . $table . '` (';
    
    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '`,';
    }
    $query = rtrim($query, ',');
    $query .= ') VALUES (';
    foreach ($fields as $key => $value) {
        $query .= '\'' . $value . '\',';
    }
    $query = rtrim($query, ',');
    $query .= ')';
    query($pdo, $query);
}


function updateData($pdo, $fields, $table) {
    $query = ' UPDATE ' . $table . ' SET ';
    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '` = :' . $key . ',';
    }
    $query = rtrim($query, ',');
    $query .= ' WHERE `id` = :primaryKey';

    $fields = processDates($fields);

    // Set the :primaryKey variable
    $fields['primaryKey'] = $fields['id'];
    query($pdo, $query, $fields);
}

function updateDistrict($pdo, $fields) {
    $query = ' UPDATE `districts` SET ';
    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '` = :' . $key . ',';
    }
    $query = rtrim($query, ',');
    $query .= ' WHERE `id` = :primaryKey';
    
    $fields = processDates($fields);

    // Set the :primaryKey variable
    $fields['primaryKey'] = $fields['id'];
    
    query($pdo, $query, $fields);
}

function deleteData($pdo, $id, $table) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM `' . $table . '` 
    WHERE `id` = :id', $parameters);
}

function deleteCommittee($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM `committee` 
    WHERE `committee` = :id', $parameters);
    query($pdo, 'DELETE FROM `committees` 
    WHERE `id` = :id', $parameters);
}

function deleteClass($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM `temple_prep` 
    WHERE `class_id` = :id', $parameters);
    query($pdo, 'DELETE FROM `temple_class` 
    WHERE `id` = :id', $parameters);
}

function deleteTrip($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM `trip_members` 
    WHERE `trip_id` = :id', $parameters);
    query($pdo, 'DELETE FROM `temple_trip` 
    WHERE `id` = :id', $parameters);
}

function allElders($pdo) {
    $elders =  query($pdo, 'SELECT `id`, `first_name`, `last_name`, `date_added` FROM `elders`');
    return $elders->fetchAll();
}

function allCompanions($pdo) {
    $companions = query($pdo,'select c.id,d.id districtid,d.district,companion1,companion2,e1.first_name f1name,e1.last_name l1name,e2.first_name f2name,e2.last_name l2name,c.date_added,last_interview from companionships c inner join elders e1 on c.companion1 = e1.id inner join elders e2 on companion2 = e2.id inner join districts d on d.id=c.district');
    return $companions->fetchAll();
}

function allHouseholds($pdo) {
    $households =  query($pdo, 'SELECT a.*, b.district districtname,companion1,companion2,e1.first_name f1name,e1.last_name l1name,e2.first_name f2name,e2.last_name l2name FROM `households` a inner join districts b on a.district = b.id left outer join companionships c on a.companionship_id = c.id left outer join elders e1 on c.companion1 = e1.id left outer join elders e2 on c.companion2 = e2.id order by surname');
    return $households->fetchAll();
}

function allConsultants($pdo) {
    $consultants =  query($pdo, 'SELECT * FROM `consultants` order by last_name');
    return $consultants->fetchAll();
}

function allMissionaries($pdo) {
    $missionary =  query($pdo, 'SELECT * FROM `missionaries` order by last_name');
    return $missionary->fetchAll();
}

function allMissionPrep($pdo) {
    $student =  query($pdo, 'SELECT * FROM `mission_prep` order by last_name');
    return $student->fetchAll();
}

function allCommittees($pdo) {
    $committees =  query($pdo, 'SELECT * FROM `committees` order by name');
    return $committees->fetchAll();
}

function allCommitteeMembers($pdo,$name) {
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $members =  query($pdo, 'SELECT c1.id,committee,name,member,first_name,last_name,leader,c1.date_added FROM `committee` c1 inner join elders e on c1.member=e.id inner join committees c2 on c1.committee = c2.id   WHERE `name` = :name',$parameters);
    return $members->fetchAll();
}

function allTeams($pdo) {
    $teams =  query($pdo, 'SELECT * FROM `maint_team` order by name');
    return $teams->fetchAll();
}

function allTeamMembers($pdo,$name) {
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $members =  query($pdo, 'SELECT mm.id,teamid,name,memberid,first_name,last_name,leader,mm.date_added FROM `maint_members` mm inner join elders e on mm.memberid=e.id inner join maint_team mt on mt.id = mm.teamid   WHERE `name` = :name',$parameters);
    return $members->fetchAll();
}

function allDistricts($pdo) {
    $districts =  query($pdo, 'SELECT `districts`.`id`,`district`,`leader`,`first_name`, `last_name`, `districts`.`date_added`, `date_updated` FROM `districts` 
    left outer join `elders` on `districts`.`leader` = `elders`.`id`');
    return $districts->fetchAll();
}

function allRoles($pdo) {
    $roles =  query($pdo, 'SELECT * FROM `ward_mission` order by role');
    return $roles->fetchAll();
}

function allBOMMembers($pdo) {
    $members =  query($pdo, 'SELECT * FROM `bom_class` order by member');
    return $members->fetchAll();
}

function allClasses($pdo) {
    $classes =  query($pdo, 'SELECT * FROM `temple_class` order by class_date');
    return $classes->fetchAll();
}

function allClassMembers($pdo,$id) {
    $parameters = [':id' => $id];
    $members =  query($pdo, 'SELECT b.id,class_date,first_name,last_name,b.date_added FROM temple_class a inner join temple_prep b on a.id=b.class_id where class_id = :id order by class_date,last_name,first_name', $parameters);
    return $members->fetchAll();
}

function allTrips($pdo) {
    $trips =  query($pdo, 'SELECT * FROM `temple_trip` order by trip_date');
    return $trips->fetchAll();
}

function allTripMembers($pdo,$id) {
    $parameters = [':id' => $id];
    $members =  query($pdo, 'SELECT b.id,trip_date,first_name,last_name,b.date_added FROM temple_trip a inner join trip_members b on a.id=b.trip_id where trip_id = :id order by trip_date,last_name,first_name', $parameters);
    return $members->fetchAll();
}

function getLeader($pdo, $id) {
    $parameters = [':id' => $id];
    $leader = query($pdo, 'SELECT leader  FROM `districts` WHERE `id` = :id', $parameters);
    return $leader->fetch();
}

function getElder($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT * FROM `elders` 
    WHERE `id` = :id', $parameters);
    return $query->fetchAll();
}

function getHousehold($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT a.*, b.district districtname FROM `households` a inner join districts b on a.district = b.id
    WHERE a.id = :id', $parameters);
    return $query->fetch();
}

function getMissionary($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT * FROM `missionaries` WHERE id = :id', $parameters);
    return $query->fetch();
}

function getClass($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT * FROM `temple_class` WHERE id = :id', $parameters);
    return $query->fetch();
}

function getTrip($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT * FROM `temple_trip` WHERE id = :id', $parameters);
    return $query->fetch();
}

function getConsultant($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT * FROM `consultants` WHERE id = :id', $parameters);
    return $query->fetch();
}

function getDistrict($pdo, $id) {
    $parameters = [':id' => $id];
    $districtname = query($pdo, 'SELECT `district` FROM `districts` WHERE `id` = :id', $parameters);
    $row =  $districtname->fetch();
    return $row[0];
}

function getCommittee($pdo, $name) {
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $committeeid = query($pdo, 'SELECT `id` FROM `committees` WHERE `name` = :name', $parameters);
    $row =  $committeeid->fetch();
    return $row[0];
}

function getCommitteeMember($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT `a`.`id`,`name`,`first_name`,`last_name`,`leader` FROM `committee` a inner join `committees` b on a.committee = b.id inner join elders c on a.member = c.id  WHERE `a`.`id` = :id', $parameters);
    return $query->fetch();;
}

function getTeam($pdo, $name) {
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $teamid = query($pdo, 'SELECT `id` FROM `maint_team` WHERE `name` = :name', $parameters);
    $row =  $teamid->fetch();
    return $row[0];
}

function getTeamMember($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT `a`.`id`,`name`,`first_name`,`last_name`,`leader` FROM `maint_members` a inner join `maint_team` b on a.teamid = b.id inner join elders c on a.memberid = c.id  WHERE `a`.`id` = :id', $parameters);
    return $query->fetch();;
}

function getMissionRole($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT * FROM `ward_mission` WHERE id = :id', $parameters);
    return $query->fetch();
}

function getBOMMember($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    // call the query function and provide the $parameters array
    $query = query($pdo, 'SELECT * FROM `ward_missionbom_class` WHERE id = :id', $parameters);
    return $query->fetch();
}

function districtDropdown($id=1) {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    $districts =  query($pdo, 'SELECT `id`, `district` FROM `districts` order by `district`');
    echo "<label for 'district-select'>Select District:</label>";
    echo "<select name='districtid' id='district-select'>";
    foreach ($districts as $district) {
        $selected = "<option value = '" . $district['id'] . "'";
        if ($id == $district['id']) {
            $selected .= ' selected';
        }    
        $selected .= ">" . $district['district']  . "</option>";
        echo $selected;
    }
    echo "</select>";
}

function companionDropdown($id=1) {
    include __DIR__ . '/../includes/DatabaseConnection.php';

    $companions =  query($pdo, 'select c.id,d.id districtid,d.district,companion1,companion2,e1.first_name f1name,e1.last_name l1name,e2.first_name f2name,e2.last_name l2name,c.date_added from companionships c inner join elders e1 on c.companion1 = e1.id inner join elders e2 on companion2 = e2.id inner join districts d on d.id=c.district');
    echo "<label for 'companion-select'>Select Companionship:</label>";
    echo "<select name='companionid' id='companion-select'>";
    foreach ($companions as $companion) {
        $selected = "<option value = " . 
            $companion['id'];
        if ($id == $companion['id']) {
            $selected .= ' selected';
        }    
        $selected .= ">"  . $companion['f1name'] . " " . $companion['l1name'] . "/" . $companion['f2name'] . " " . $companion['l2name'] . "</option>";
        echo $selected;
    }
    echo "</select>";
}

function eldersDropdown($id,$title,$seq='1') {
    include __DIR__ . '/../includes/DatabaseConnection.php';

    $elders =  query($pdo, 'SELECT `id`, `first_name`, `last_name` FROM `elders` order by `last_name`, `first_name`');
    echo "<label for 'elder-select'>Select " . $title . ":</label>";
    echo "<select name='elderid" . $seq . "' id='elder-select'>";
    foreach ($elders as $elder) {
        $selected = "<option value = '" . $elder['id'] . "'";
        if ($id == $elder['id']) {
            $selected .= ' selected';
        }    
        $selected .= ">" . $elder['first_name'] . " " . $elder['last_name'] . "</option>";
        echo $selected;
    }
    echo "</select>";
}

function committeeMemberDropdown($name) {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $elders =  query($pdo, 'SELECT `id`, `first_name`, `last_name` FROM `elders` WHERE `id` NOT IN (SELECT member FROM committee WHERE committee in (select id from committees where name = :name)) order by `last_name`, `first_name`',$parameters);
    echo "<label for 'elder-select'>Select Committee Member:</label>";
    echo "<select name='elderid1' id='elder-select'>";
    foreach ($elders as $elder) {
        $selected = "<option value = '" . $elder['id'] . "'";   
        $selected .= ">" . $elder['first_name'] . " " . $elder['last_name'] . "</option>";
        echo $selected;
    }
    echo "</select>";
}

function teamMemberDropdown($name) {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    $name = str_replace('%20',' ',$name);
    $parameters = [':name' => $name];
    $elders =  query($pdo, 'SELECT `id`, `first_name`, `last_name` FROM `elders` WHERE `id` NOT IN (SELECT memberid FROM maint_members WHERE teamid in (select id from maint_team where name = :name)) order by `last_name`, `first_name`',$parameters);
    echo "<label for 'elder-select'>Select Team Member:</label>";
    echo "<select name='elderid1' id='elder-select'>";
    foreach ($elders as $elder) {
        $selected = "<option value = '" . $elder['id'] . "'";   
        $selected .= ">" . $elder['first_name'] . " " . $elder['last_name'] . "</option>";
        echo $selected;
    }
    echo "</select>";
}

function committeeMenu() {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    
    $committees = query($pdo,'SELECT `id`,`name` FROM committees ORDER BY `name`');
    foreach($committees as $committee) {
        $cname = str_replace('%20',' ',$committee['name']);
        echo '<li><a href="committeemembers.php?committee=' . $cname . '">' . $cname . '</a></l>';
    }
}

function maintenanceMenu() {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    
    $teams = query($pdo,'SELECT `id`,`name` FROM maint_team ORDER BY `name`');
    foreach($teams as $team) {
        $tname = str_replace('%20',' ',$team['name']);
        echo '<li><a href="teammembers.php?team=' . $tname . '">' . $tname . '</a></l>';
    }
}

function prepMenu() {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    
    $classes = query($pdo,'SELECT id, class_date FROM temple_class where showmenu = 1 order by class_date');
    foreach($classes as $class) {
        $fields = ['class_date' => $class['class_date']];
        $date = processDates($fields);
        echo '<li><a href="templeclass.php?class=' . $class['id'] . '">' . $date['class_date'] . '</a></l>';
    }
}

function tripMenu() {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    
    $trips = query($pdo,'SELECT id, trip_date FROM temple_trip where showmenu = 1 order by trip_date');
    foreach($trips as $trip) {
        $fields = ['trip_date' => $trip['trip_date']];
        $date = processDates($fields);
        echo '<li><a href="templetrip.php?trip=' . $trip['id'] . '">' . $date['trip_date'] . '</a></l>';
    }
}

function processDates($fields) {
    foreach ($fields as $key => $value) {
        if ($value instanceof DateTime) {
            $fields[$key] = $value->format('Y-m-d');
        }
    }
    return $fields;
}
