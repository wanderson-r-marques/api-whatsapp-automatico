<?php 
class Token{
    private $id;
    private $descricao;
    private $numero_telefone;
    private $token;

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     */
    public function setToken($token) : self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of numero_telefone
     */
    public function getNumeroTelefone()
    {
        return $this->numero_telefone;
    }

    /**
     * Set the value of numero_telefone
     */
    public function setNumeroTelefone($numero_telefone) : self
    {
        $this->numero_telefone = $numero_telefone;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao($descricao) : self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id) : self
    {
        $this->id = $id;

        return $this;
    }
}