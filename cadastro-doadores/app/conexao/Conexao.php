<?php

class Conexao
{
    private static $pdo; // Mantendo como private para garantir encapsulamento

    private function __construct()
    {
        // Impede a criação de instâncias dessa classe
    }

    public static function getConexao()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=172.18.0.2;dbname=cadastro_doador',
                    'root',
                    'password',
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
                    ]
                );
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}