<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class visitor  extends config implements operations
{
    private $id;
    private $visit_date;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Get the value of visit_date
     */
    public function getVisit_date()
    {
        return $this->visit_date;
    }

    /**
     * Set the value of visit_date
     *
     * @return  self
     */
    public function setVisit_date($visit_date)
    {
        $this->visit_date = $visit_date;

        return $this;
    }

    //================================ Functions Here =====================================================
    public  function create()
    {
        $sql = "INSERT INTO visits (visit_date) VALUES (NOW())";
        return $this->runDML( $sql);
    }
    public function update() {}
    public function read() {
        $sql = "SELECT COUNT(*) AS visit_count FROM visits WHERE MONTH(visit_date) = MONTH(CURRENT_DATE()) AND YEAR(visit_date) = YEAR(CURRENT_DATE())";
        return $this->runDQL( $sql);

    }
    public function delete() {}
}
