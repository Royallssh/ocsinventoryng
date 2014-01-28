<?php

/**
* Test class for ocsdbclient.
* Generated by PHPUnit.
*/
class ocsdbclientTest extends PHPUnit_Framework_TestCase {

    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main(){
    	require_once 'PHPUnit/TextUI/TestRunner.php';

    	$suite  = new PHPUnit_Framework_TestSuite('ocssoapclientTest');
    	$result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp(){
    	global $DB, $CFG_GLPI;
        $_SERVER['REQUEST_URI'] = '/plugins';
        require_once(__DIR__.'/../../../inc/includes.php');
        $this->client = new PluginOcsinventoryngOcsDbClient(1,'ocstest','ocsuser','ocspass','ocsweb');
        
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown(){
        unset($this->client);
        unset($this->Falseclient);
    }


    public function testConnection(){
        $this->assertTrue($this->client->checkConnection());
    }


    public function testFalseConnection(){
        $this->Falseclient = new PluginOcsinventoryngOcsDbClient(1,'ocstest','foo','bar','ocsweb');
        var_dump($this->Falseclient->checkConnection());
        $this->assertFalse($this->Falseclient->checkConnection());

    }


    /**
    * @depends  testConnection
    */
    public function testGetComputers($conditions=array(),$sort=NULL){
        $res = $this->client->getComputers(array(array("ID"=>$GLOBALS['idexist']),null));
        $expected = array(
            "ID"  => $GLOBALS['idexist'],
            "NAME"  => $GLOBALS['name'],
            "OSNAME"  => $GLOBALS['osname'],
            "PROCESSORT"  => $GLOBALS['processort'],
            "MEMORY"  => $GLOBALS['memory'],
            "DEVICEID"  => $GLOBALS['deviceid'],
            "NAME"  => $GLOBALS['name'],
            "WORKGROUP"  => $GLOBALS['workgroup'],
            "USERDOMAIN"  => $GLOBALS['userdomain'],
            "OSNAME"  => $GLOBALS['osname'],
            "OSVERSION"  => $GLOBALS['osversion'],
            "OSCOMMENTS"  => $GLOBALS['oscomments'],
            "PROCESSORT"  => $GLOBALS['processort'],
            "PROCESSORS"  => $GLOBALS['processors'],
            "PROCESSORN"  => $GLOBALS['processorn'],
            "MEMORY"  => $GLOBALS['memory'],
            "SWAP"  => $GLOBALS['swap'],
            "IPADDR"  => $GLOBALS['ipaddr'],
            "DNS"  => $GLOBALS['dns'],
            "DEFAULTGATEWAY"  => $GLOBALS['defaultgateway'],
            "ETIME"  => $GLOBALS['etime'],
            "LASTDATE"  => $GLOBALS['lastdate'],
            "LASTCOME"  => $GLOBALS['lastcome'],
            "QUALITY"  => $GLOBALS['quality'],
            "FIDELITY"  => $GLOBALS['fidelity'],
            "USERID"  => $GLOBALS['userid'],
            "TYPE"  => $GLOBALS['type'],
            "DESCRIPTION"  => $GLOBALS['description'],
            "WINCOMPANY"  => $GLOBALS['wincompany'],
            "WINOWNER"  => $GLOBALS['winowner'],
            "WINPRODID"  => $GLOBALS['winprodid'],
            "WINPRODKEY"  => $GLOBALS['winprodkey'],
            "USERAGENT"  => $GLOBALS['useragent'],
            "CHECKSUM"  => $GLOBALS['checksum'],
            "SSTATE"  => $GLOBALS['sstate'],
            "IPSRC"  => $GLOBALS['ipsrc'],
            "UUID"  => $GLOBALS['uuid'],
            "ARCH"  => $GLOBALS['arch'],

            );
$this->assertEquals($expected,$res);
}


    /**
    * @depends  testConnection
    */
    public function testGetAccountInfo($id){
        $res = $this->client->getAccountInfo($GLOBALS['idexist']);
        $expected = array ( "HARDWARE_ID" => $GLOBALS['idexist'], "TAG" => $GLOBALS['tag'] ); 
        $this->assertEquals($expected,$res);

    }


    /**
    * @depends  testConnection
    */
    public function testGetConfig($key){
        $result = $this->client->getConfig("LOG_DIR");
        $expected=array("IVALUE"=>$GLOBALS['logdiri'], "TVALUE"=>$GLOBALS['logdirt']);
        $this->assertEquals($expected,$result);

    }



    /**
    * @depends  testConnection
    */
    public function testGetCategorie($table, $condition=1, $sort){
        $res = $this->client->GetCategorie("videos",1,"HARDWARE_ID");
        $expected = array(
            "HARDWARE_ID" => $GLOBALS['idexist'],
            "ID" => $GLOBALS['videoid'],
            "NAME" => $GLOBALS['name'],
            "CHIPSET" => $GLOBALS['chipset'],
            "MEMORY" => $GLOBALS['videomemory'],
            "RESOLUTION" => $GLOBALS['resolution'],
            );
        $this->assertEquals($expected,$res[$GLOBALS['videorank']]);
    }       


    /**
    * @depends  testConnection
    */
    public function testGetUnique($columns, $table, $conditions, $sort){
    #TODO testGetUnique

    }


    /**
    * @depends  testConnection
    */
    public function testSetChecksum($checksum, $id){
        $this->client->setChecksum(56,$GLOBALS['idexist']);
        $res = $this->client->getDB()->affected_rows();
        $this->assertEquals(1,$res);
        $this->client->setChecksum($GLOBALS['checksum'],$GLOBALS['idexist']);
    }


    /**
    * @depends testConnection
    */
    public function testDelEquiv($deleted, $equivclean = null){
    #TODO testDelEquiv


    }


    /**
    * @depends  testConnection
    */
    public function testGetAccountInfoColumns(){
        $expected = array ( "HARDWARE_ID","TAG" ) ;
        $res = $this->client->GetAccountInfoColumns();
        $this->assertEquals($expected,$res);
    }

    /**
    * @depends testGetComputers
    */
    public function testFalseGetComputers($conditions=array(),$sort=NULL){
        $res = $this->client->getComputers(array(array("ID"=>$GLOBALS['idexistnoaccountinfo']),null));
        $expected = array(
            "ID"  => $GLOBALS['idexist'],
            "NAME"  => $GLOBALS['name'],
            "OSNAME"  => $GLOBALS['osname'],
            "PROCESSORT"  => $GLOBALS['processort'],
            "MEMORY"  => $GLOBALS['memory'],
            "DEVICEID"  => $GLOBALS['deviceid'],
            "NAME"  => $GLOBALS['name'],
            "WORKGROUP"  => $GLOBALS['workgroup'],
            "USERDOMAIN"  => $GLOBALS['userdomain'],
            "OSNAME"  => $GLOBALS['osname'],
            "OSVERSION"  => $GLOBALS['osversion'],
            "OSCOMMENTS"  => $GLOBALS['oscomments'],
            "PROCESSORT"  => $GLOBALS['processort'],
            "PROCESSORS"  => $GLOBALS['processors'],
            "PROCESSORN"  => $GLOBALS['processorn'],
            "MEMORY"  => $GLOBALS['memory'],
            "SWAP"  => $GLOBALS['swap'],
            "IPADDR"  => $GLOBALS['ipaddr'],
            "DNS"  => $GLOBALS['dns'],
            "DEFAULTGATEWAY"  => $GLOBALS['defaultgateway'],
            "ETIME"  => $GLOBALS['etime'],
            "LASTDATE"  => $GLOBALS['lastdate'],
            "LASTCOME"  => $GLOBALS['lastcome'],
            "QUALITY"  => $GLOBALS['quality'],
            "FIDELITY"  => $GLOBALS['fidelity'],
            "USERID"  => $GLOBALS['userid'],
            "TYPE"  => $GLOBALS['type'],
            "DESCRIPTION"  => $GLOBALS['description'],
            "WINCOMPANY"  => $GLOBALS['wincompany'],
            "WINOWNER"  => $GLOBALS['winowner'],
            "WINPRODID"  => $GLOBALS['winprodid'],
            "WINPRODKEY"  => $GLOBALS['winprodkey'],
            "USERAGENT"  => $GLOBALS['useragent'],
            "CHECKSUM"  => $GLOBALS['checksum'],
            "SSTATE"  => $GLOBALS['sstate'],
            "IPSRC"  => $GLOBALS['ipsrc'],
            "UUID"  => $GLOBALS['uuid'],
            "ARCH"  => $GLOBALS['arch'],

            );
$this->assertNotEquals($expected,$res);

}


    /**
    * @depends testGetAccountInfo
    */
    public function testFalseGetAccountInfo($id){
        $res = $this->client->getAccountInfo($GLOBALS['idexistnoaccountinfo']);
        $this->assertNull($res);

    }


    /**
    * @depends testGetConfig
    */
    public function testFalseGetConfig($key){
        $result = $this->client->getConfig("LOG_DIR");
        $expected=array("IVALUE"=>"foo", "TVALUE"=>"bar");
        $this->assertNotEquals($expected,$result);
    }

    /**
    * @depends testGetCategorie
    */
    public function testFalseGetCategorie($table, $condition=1, $sort){
    #TODO testFalseGetCategorie


    }

    /**
    * @depends testGetUnique
    */
    public function testFalseGetUnique($columns, $table, $conditions, $sort){
    #TODO testFalseGetUnique

    }


    /**
    * @depends testSetChecksum
    */
    public function testFalseSetChecksum($checksum, $id){
        $this->client->setChecksum(0,$GLOBALS['idnotexist']);
        $res = $this->client->getDB()->affected_rows();
        $this->assertEquals(0,$res);
    }


    /**
    * @depends testDelEquiv
    */
    public function testFalseDelEquiv($deleted, $equivclean = null){
    #TODO testFalseDelEquiv

    }
}








































































