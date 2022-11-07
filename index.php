<?php

require_once 'vendor/autoload.php';

$produto = new \App\Model\Produto();
$produto->setId(9);
$produto->setNome('Janela');
$produto->setDescricao('Vidro');

$produtoDao = new \App\Model\ProdutoDao();
//$produtoDao->create($produto);
$produtoDao->update($produto);
//$produtoDao->delete(3);
$produtoDao->read();


foreach($produtoDao->read() as $produto):
    echo $produto['nome']."<br>".$produto['descricao']."<hr>";
endforeach;