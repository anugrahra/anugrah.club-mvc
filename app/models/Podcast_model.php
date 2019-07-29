<?php

class Podcast_model {
    private $table = 'episode';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllEpisode()
    {
        $this->db->query('SELECT * FROM ' . $this->table. ' ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getRecentEpisode()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');
        return $this->db->resultSet();
    }

    public function getEpisodeBySlug($slug)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE slug=:slug');
        $this->db->bind('slug', $slug);
        return $this->db->single();
    }

    public function getAllEpisodeLimited($perPage)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT 0, ' . $perPage);
        return $this->db->resultSet();
    }

    public function getAllEpisodeLimitedFrom2($start, $perPage)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT ' . $start . ', ' . $perPage);
        return $this->db->resultSet();
    }
}