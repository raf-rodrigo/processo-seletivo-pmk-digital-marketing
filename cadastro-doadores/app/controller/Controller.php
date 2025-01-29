<?php

require_once __DIR__ . '/../conexao/Conexao.php';
class Controller
{
    public static function index()
    {
        try {
            $sql = "SELECT * FROM doadores";
            $stmt = Conexao::getConexao()->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar doadores: " . $e->getMessage();
            return [];
        }

    }
}