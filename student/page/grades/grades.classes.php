<?php
require_once "../../dbConnection/db.php";
class DisplayGrades extends Dbh
{
    protected function getCourses()
    {
        $sql = 'SELECT COURSE_CODE FROM listing ORDER BY DESCRIPTIVE_TITLE DESC ';
        $stmt = $this->connect()->query($sql);

        if (!$stmt) {
            echo "Error";
            exit;
        }

        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        
        return $courses;
    }

    protected function getData($schoolId)
{
    $stmt = $this->connect()->prepare('SELECT * FROM grade WHERE SCHOOL_ID = ? AND SUBMITTED= 1 ORDER BY SEMESTER');
        
    if (!$stmt->execute([$schoolId])) {
        echo "Error";
        exit;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
        
    return $result;
}


    protected function getSearchData($schoolId, $semester, $sy)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM grade WHERE SCHOOL_ID = ? AND SEMESTER LIKE ? AND sy LIKE ?");
        $semester = '%' . $semester . '%';
        $sy = '%' . $sy . '%';

        if (!$stmt->execute([$schoolId, $semester, $sy])) {
            echo "Error";
            exit;
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $result;
    }
}

class DisplayGradesContr extends DisplayGrades
{
    private $schoolId;

    public function __construct($schoolId)
    {
        $this->schoolId = $schoolId;
    }

    public function fetchCourses()
    {
        return $this->getCourses();
    }

    public function fetchData()
    {
        return $this->getData($this->schoolId);
    }

    public function fetchSearchData($semester, $sy)
    {
        return $this->getSearchData($this->schoolId, $semester, $sy);
    }
}

// $display = new DisplayGradesContr($schoolId);
// $courses = $display->fetchCourses();
// $result = $display->fetchData();
