<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;

class Calendario extends Model
{
    private $table = 'calendario';

    public function findAll()
    {
        $sql = sprintf("SELECT id,title,start,end,is_completed from %s", $this->table);

        $query = $this->PDO()->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function findOne($calendarioId)
    {
        $sql = "SELECT title,start,end,is_completed from" . $this->table;
        $sql .= "where id = :id";

        $query = $this->PDO()->prepare($sql);
        $query->execute([':id' => $calendarioId]);

        return $query->fetch();
    }

    public function store($params)
    {
        $sql = sprintf("INSERT INTO %s (title,start,end,is_completed) VALUES (:title,:start,:end,:is_completed)", $this->table);

        $query = $this->PDO()->prepare($sql);
        $query->bindParam(":title", $params['title']);
        $query->bindParam(":start", $params['start']);
        $query->bindParam(":end", $params['end']);
        $query->bindParam(":is_completed", $params['is_completed']);

        return $query->execute();
    }

    public function update($params)
    {
        $query = sprintf("UPDATE %s SET title = :title, is_completed = :is_completed WHERE id = :id", $this->table);
        $query = $this->PDO()->prepare($query);

        $query->bindParam(':title', $params['title']);
        $query->bindParam(':is_completed', $params['is_completed']);
        $query->bindParam(':id', $params['id']);

        return $query->execute();
    }

    public function destroy($calendarioId)
    {
        $query = sprintf("DELETE FROM %s WHERE id = :id", $this->table);
        $query = $this->PDO()->prepare($query);

        $query->bindParam(':id', $calendarioId);
        return $query->execute();
    }
}