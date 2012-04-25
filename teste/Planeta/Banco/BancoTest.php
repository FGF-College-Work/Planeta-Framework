<?php
namespace Planeta\Banco;

/**
 * Test class for Banco.
 * Generated by PHPUnit on 2012-04-23 at 15:31:39.
 */
class BancoTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Banco
     */
    protected $banco;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->banco = new Banco;
    }

    public function testeConstrucaoComParametros() {
        $options = array("driver" => "mysql",
                         "dbname" => "blog",
                         "host" => "127.0.0.1",
                         "username" => "root",
                         "password" => "123456");
        $banco = new Banco($options);
        
        $this->assertInstanceOf("PDO", $banco->pegarConexao());
        $this->assertEquals("mysql", $banco->pegarConexao()->getAttribute(\PDO::ATTR_DRIVER_NAME));
    }
    
    /**
     * @expectedException InvalidArgumentException 
     */
    public function testeConstrucaoComParametrosInvalidos() {
        $options = array("driver" => "mysql",
                         "username" => "root",
                         "password" => "123456");
        $banco = new Banco($options);
    }
    
    /**
     * @covers Planeta\Banco\Banco::definirConexao
     * @covers Planeta\Banco\Banco::pegarConexao
     */
    public function testDefinirConexao() {
        $pdo = new \PDO("sqlite::memory:");
        $this->banco->definirConexao($pdo);
        
        $this->assertInstanceOf("PDO", $this->banco->pegarConexao());
        $this->assertEquals("sqlite", $this->banco->pegarConexao()->getAttribute(\PDO::ATTR_DRIVER_NAME));
    }
}

?>
