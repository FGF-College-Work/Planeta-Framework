<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'planeta\\autenticacao\\armazenamento\\interfacearmazenamento' => '/Planeta/Autenticacao/Armazenamento/InterfaceArmazenamento.php',
                'planeta\\autenticacao\\armazenamento\\naopersistente' => '/Planeta/Autenticacao/Armazenamento/NaoPersistente.php',
                'planeta\\autenticacao\\armazenamento\\sessao' => '/Planeta/Autenticacao/Armazenamento/Sessao.php',
                'planeta\\autenticacao\\autenticacao' => '/Planeta/Autenticacao/Autenticacao.php',
                'planeta\\banco\\banco' => '/Planeta/Banco/Banco.php',
                'planeta\\banco\\tabela' => '/Planeta/Banco/Tabela.php',
                'planeta\\mvc\\controlador' => '/Planeta/Mvc/Controlador.php',
                'planeta\\mvc\\excecao\\acaonaoexiste' => '/Planeta/Mvc/Excecao/AcaoNaoExiste.php',
                'planeta\\mvc\\excecao\\controladornaoexiste' => '/Planeta/Mvc/Excecao/ControladorNaoExiste.php',
                'planeta\\mvc\\excecao\\visaonaoexiste' => '/Planeta/Mvc/Excecao/VisaoNaoExiste.php',
                'planeta\\mvc\\mvc' => '/Planeta/Mvc/Mvc.php',
                'planeta\\mvc\\visao' => '/Planeta/Mvc/Visao.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    }
);
// @codeCoverageIgnoreEnd