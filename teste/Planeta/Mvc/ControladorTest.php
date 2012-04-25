<?php
namespace Planeta\Mvc;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-04-23 at 08:29:18.
 */
class ControladorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Controlador
     */
    protected $controlador;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->controlador = new Controlador;
    }

    /**
     * @covers Planeta\Mvc\Controlador::comVisaoAutomatica
     */
    public function testComVisaoAutomatica()
    {
        $this->controlador->definirVisaoAutomatica(true);
        $this->assertTrue($this->controlador->comVisaoAutomatica());
        
        $this->controlador->definirVisaoAutomatica(1);
        $this->assertTrue($this->controlador->comVisaoAutomatica());
    }

    /**
     * @covers Planeta\Mvc\Controlador::definirVisaoAutomatica
     */
    public function testDefinirVisaoAutomatica()
    {
        $this->controlador->definirVisaoAutomatica(false);
        $this->assertFalse($this->controlador->pegarVisaoAutomatica());
        
        $this->controlador->definirVisaoAutomatica(0);
        $this->assertFalse($this->controlador->pegarVisaoAutomatica());
    }

    /**
     * @covers Planeta\Mvc\Controlador::pegarVisaoAutomatica
     */
    public function testPegarVisaoAutomatica()
    {
        $this->assertInternalType("boolean", $this->controlador->pegarVisaoAutomatica());
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testDefinirVisaoComTipoErrado()
    {
        $visao = new \stdClass();
        $this->controlador->definirVisao($visao);
    }

    /**
     * @covers Planeta\Mvc\Controlador::definirVisao
     */
    public function testDefinirVisao()
    {
        $visao = $this->getMock("Planeta\Mvc\Visao");
        $this->controlador->definirVisao($visao);
        
        $this->assertInstanceOf("Planeta\Mvc\Visao", $this->controlador->pegarVisao());
        
        return $visao;
    }
    
    /**
     * @covers Planeta\Mvc\Controlador::pegarVisao
     * @depends testDefinirVisao
     */
    public function testPegarVisao(Visao $visao)
    {
        $this->controlador->definirVisao($visao);
        
        $this->assertEquals($visao, $this->controlador->pegarVisao());
    }

    /**
     * @covers Planeta\Mvc\Controlador::renderizar
     */
    public function testRenderizarComLayout()
    {
        $visao = $this->getMock("Planeta\Mvc\Visao");
        
        $visao->expects($this->at(0))
              ->method("renderizar")
              ->with($this->equalTo("inicial"),
                     $this->equalTo("inicial.php"));
        
        $visao->expects($this->at(1))
              ->method("renderizar")
              ->with($this->equalTo("layout"),
                     $this->equalTo("layout.php"));
        
        $this->controlador->definirVisao($visao);
        $this->controlador->renderizar("inicial", "inicial");
    }
    
    /**
     * @covers Planeta\Mvc\Controlador::renderizar
     */
    public function testRenderizarSeConteudoEstaSendoDefinido()
    {
        $visao = $this->getMock("Planeta\Mvc\Visao");
        $html  = "<div></div>";
        
        $visao->expects($this->any())
              ->method("renderizar")
              ->will($this->returnValue($html));
        
        $this->controlador->definirVisao($visao);
        $this->controlador->renderizar("inicial", "inicial");
        
        $this->assertEquals($html, $this->controlador->pegarVisao()->conteudo);
    }
}