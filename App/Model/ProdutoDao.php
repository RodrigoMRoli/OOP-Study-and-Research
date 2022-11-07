<?php

namespace App\Model;

class ProdutoDao {

    public function create(Produto $p){ 

        $sql = 'INSERT INTO pedidos (nome, descricao) VALUES (?,?)';

        $stmt = Conexao::getConn()->prepare($sql); //stmt = statement
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getDescricao());
        $stmt->execute();
    }

    public function read() {

        $sql = 'SELECT * FROM pedidos';
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        else:
            return [];
        endif;
    }

    public function update(Produto $p) {

        $sql = "UPDATE pedidos SET nome = ?, descricao = ? WHERE id = ?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getDescricao());
        $stmt->bindValue(3, $p->getId());

        $stmt->execute();

    }

    public function delete($id) {

        $sql = 'DELETE FROM pedidos WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }
}